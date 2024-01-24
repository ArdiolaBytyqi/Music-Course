<?php
require_once "Database.php";

class Produktet
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getCategories(){
        $query = 'SELECT * FROM categories';
        $results = $this->conn->query($query);

        if($results){
            return $results->fetch_all(MYSQLI_ASSOC);
        } else{
            return false;
        }
    }

    public function getCategoriesById($id){
        $query = 'SELECT * FROM categories WHERE id ='.$id;
        $results = $this->conn->query($query);

        if($results){
            return $results->fetch_all(MYSQLI_ASSOC);
        } else{
            return false;
        }
    }

    public function getTeachersByCategory($id){
        $query = 'SELECT * FROM users WHERE roles = 3 AND category_id =' . $id;
        $results = $this->conn->query($query);

        if($results){
            return $results->fetch_all(MYSQLI_ASSOC);
        } else{
            return false;
        }
    }
}