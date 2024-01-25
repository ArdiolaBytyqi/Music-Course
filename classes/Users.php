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
}