<?php
require_once '../classes/Users.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $data = new Users();
    $deleteResult = $data->deleteUser($id);

    if ($deleteResult) {
        echo '<script>window.location.href = "teachers.php";</script>';
    } else {
        echo "User deletion failed!";
    }
} else {
    echo "Invalid category ID.";
}
?>
