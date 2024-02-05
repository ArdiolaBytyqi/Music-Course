<?php
require_once "Database.php";

class Users
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function login($username, $password)
    {
        if (empty($username) || empty($password)) {
            if (empty($username)) {
                echo '<script> alert("Username is empty!")</script>';
            }

            if (empty($password)) {
                echo '<script> alert("Password is empty!")</script>';
            }
        } else {
            $encrypted_password = md5($password); 
            $sql = "SELECT id, username, roles FROM users WHERE (username = '$username' OR email = '$username') AND password = '$encrypted_password'";
            $result = $this->conn->query($sql);

            if ($result) {
                if ($result->num_rows > 0) { 
                    $row = $result->fetch_assoc();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['roles'] = $row['roles'];

                    if($row['roles'] == 2){
                        echo '<script>window.location.href = "admin/";</script>';
                        exit();
                    } else {
                        echo '<script>window.location.href = "index.php";</script>';
                        exit();
                    }
                } else {
                    echo '<script> alert("Invalid username or password!")</script>';
                }
            } else {
                echo '<script> alert("Error while login, please try again!")</script>';
            }
        }
    }

    public function register($username, $email, $password)
    {
        if (empty($username) || empty($email) || empty($password)) {
            if (empty($username)) {
                echo '<script> alert("Username is empty!")</script>';
            }

            if (empty($password)) {
                echo '<script> alert("Password is empty!")</script>';
            }

            if (empty($email)) {
                echo '<script> alert("Email is empty!")</script>';
            }
        } else {
            if(strlen($password) < 7){
                echo '<script> alert("Password is shorter than 8 chars!")</script>';
            } else {

                $encrypted_password = md5($password);
                $sql = "INSERT INTO users (`username`, `email`, `password`, `roles`) VALUES ('$username', '$email', '$encrypted_password', '1')";
                $result = $this->conn->query($sql);
                if ($result) {
                    echo '<script>window.location.href = "login.php";</script>';
                    exit();
                } else {
                    echo '<script> alert("Error while registering, please try again!")</script>';
                }
            }
        }
    }

    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
        exit();
    }

    public function getTeachers(){
        $query = 'SELECT u.id, u.username, u.email, u.name, u.surname, u.image, u.phone_number, u.rating, u.category_id, c.name as cat_name FROM users u RIGHT JOIN categories c ON c.id = u.category_id WHERE u.roles = 3';
        $results = $this->conn->query($query);

        if($results){
            return $results->fetch_all(MYSQLI_ASSOC);
        } else{
            return false;
        }
    }

    public function getTeachersById($id){
        $query = 'SELECT u.id, u.username, u.email, u.name, u.surname, u.image, u.phone_number, u.rating, u.category_id, c.name as cat_name FROM users u RIGHT JOIN categories c ON c.id = u.category_id WHERE u.roles = 3 AND u.id ='. $id;
        $results = $this->conn->query($query);

        if($results){
            return $results->fetch_all(MYSQLI_ASSOC);
        } else{
            return false;
        }
    }

    public function updateUsers($id, $username, $email, $name, $surname, $phone_nr, $category_id, $image)
    {
        $username = $this->conn->real_escape_string($username);
        $email = $this->conn->real_escape_string($email);
        $name = $this->conn->real_escape_string($name);
        $surname = $this->conn->real_escape_string($surname);
        $phone_nr = $this->conn->real_escape_string($phone_nr);
        $category_id = $this->conn->real_escape_string($category_id);
        $updatedBy = $_SESSION['user_id'];
    
        if (!empty($image['name'])) {
            $target_dir = "../assets/images/users/";
            $target_file = $target_dir . basename($image['name']);
            $save_file = "assets/images/users/" . basename($image['name']);
            
            if ($this->moveUploadedFile($image['tmp_name'], $target_file)) {
                $query = "UPDATE users SET username='$username', email='$email', name='$name', surname='$surname', image='$save_file', phone_number='$phone_nr', category_id='$category_id', updated_by='$updatedBy' WHERE id=$id";
            } else {
                return false;
            }
        } else {
            $query = "UPDATE users SET username='$username', email='$email', name='$name', surname='$surname', phone_number='$phone_nr', category_id='$category_id', updated_by='$updatedBy' WHERE id=$id";
        }
    
        $result = $this->conn->query($query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function insertUsers($username, $email, $name, $surname, $phone_nr, $category_id, $image)
    {
        $username = $this->conn->real_escape_string($username);
        $email = $this->conn->real_escape_string($email);
        $name = $this->conn->real_escape_string($name);
        $surname = $this->conn->real_escape_string($surname);
        $phone_nr = $this->conn->real_escape_string($phone_nr);
        $category_id = $this->conn->real_escape_string($category_id);
        $updatedBy = $_SESSION['user_id'];
    
        $checkQuery = "SELECT username FROM users WHERE username = '$username'";
        $checkResult = $this->conn->query($checkQuery);
    
        if ($checkResult->num_rows > 0) {
            return false;
        }
    
        $default_password = "25d55ad283aa400af464c76d713c07ad"; // 12345678
    
        if (!empty($image['name'])) {
            $target_dir = "../assets/images/users/";
            $target_file = $target_dir . basename($image['name']);
            $save_file = "assets/images/users/" . basename($image['name']);
    
            if ($this->moveUploadedFile($image['tmp_name'], $target_file)) {
                $query = "INSERT INTO users (username, email, password, name, surname, image, phone_number, rating, category_id, updated_by, roles) VALUES ('$username','$email','$default_password','$name','$surname','$save_file','$phone_nr','0','$category_id','$updatedBy','3')";
            } else {
                return false;
            }
        } else {
            $defaultImage = 'https://img.freepik.com/premium-vector/face-cute-girl-avatar-young-girl-portrait-vector-flat-illustration_192760-82.jpg?w=740';
            $query = "INSERT INTO users (username, email, password, name, surname, image, phone_number, rating, category_id, updated_by, roles) VALUES ('$username','$email','$default_password','$name','$surname','$defaultImage','$phone_nr','0','$category_id','$updatedBy','3')";
        }
    
        $result = $this->conn->query($query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    

    private function moveUploadedFile($tmpFilePath, $targetFilePath) {
        return move_uploaded_file($tmpFilePath, $targetFilePath);
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = $id";
        $result = $this->conn->query($query);

        return $result;
    }

    
}