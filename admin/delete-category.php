<?php
require_once '../classes/Produktet.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $data = new Produktet();
    $deleteResult = $data->deleteCategory($id);

    if ($deleteResult) {
        echo '<script>window.location.href = "index.php";</script>';
    } else {
        echo "Category deletion failed!";
    }
} else {
    echo "Invalid category ID.";
}
?>
