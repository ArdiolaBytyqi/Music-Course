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

    public function updateCategory($id, $name, $content, $image)
    {
        $name = $this->conn->real_escape_string($name);
        $content = $this->conn->real_escape_string($content);
    
        if (!empty($image['name'])) {
            $target_dir = "../assets/images/instrumentet/";
            $target_file = $target_dir . basename($image['name']);
            $save_file = "assets/images/instrumentet/" . basename($image['name']);
            
            if ($this->moveUploadedFile($image['tmp_name'], $target_file)) {
                $query = "UPDATE categories SET name='$name', content='$content', image='$save_file' WHERE id=$id";
            } else {
                return false;
            }
        } else {
            $query = "UPDATE categories SET name='$name', content='$content' WHERE id=$id";
        }
    
        $result = $this->conn->query($query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function insertCategory($name, $content, $image)
    {
        $name = $this->conn->real_escape_string($name);
        $content = $this->conn->real_escape_string($content);
    
        if (!empty($image['name'])) {
            $target_dir = "../assets/images/instrumentet/";
            $target_file = $target_dir . basename($image['name']);
            $save_file = "assets/images/instrumentet/" . basename($image['name']);
            
            if ($this->moveUploadedFile($image['tmp_name'], $target_file)) {
                $query = "INSERT INTO categories (image, name, content) VALUES ('$save_file', '$name', '$content');";
            } else {
                return false;
            }
        } else {
            $img = "assets/images/instrumentet/llogo1.png";
            $query = "INSERT INTO categories (image, name, content) VALUES ('$img', '$name', '$content');";
        }
    
        $result = $this->conn->query($query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategory($id)
    {
        $query = "DELETE FROM categories WHERE id = $id";
        $result = $this->conn->query($query);

        return $result;
    }

    
    private function moveUploadedFile($tmpFilePath, $targetFilePath) {
        // Move the uploaded file
        return move_uploaded_file($tmpFilePath, $targetFilePath);
    }
    

}