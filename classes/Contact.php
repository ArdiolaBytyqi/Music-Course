<?php
require_once "Database.php";

class Contact
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getComments(){
        $query = 'SELECT * FROM contact_us';
        $results = $this->conn->query($query);

        if($results){
            return $results->fetch_all(MYSQLI_ASSOC);
        } else{
            return false;
        }
    }

    public function getCommentsById($id){
        $query = 'SELECT u.id, u.username, u.email, u.name, u.surname, u.image, u.phone_number, u.rating, u.category_id, c.name as cat_name FROM users u RIGHT JOIN categories c ON c.id = u.category_id WHERE u.roles = 3 AND u.id ='. $id;
        $results = $this->conn->query($query);

        if($results){
            return $results->fetch_all(MYSQLI_ASSOC);
        } else{
            return false;
        }
    }

    public function setComments($name, $surname, $email, $description)
    {
        $name = $this->conn->real_escape_string($name);
        $surname = $this->conn->real_escape_string($surname);
        $email = $this->conn->real_escape_string($email);
        $description = $this->conn->real_escape_string($description);

        $query = "INSERT INTO contact_us (name, surname, email, description) VALUES ('$name', '$surname', '$email', '$description')";
        $result = $this->conn->query($query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    
}