<?php
    require_once 'includes/header.php';

    require_once '../classes/Produktet.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $content = $_POST['content'];

        $data = new Produktet();

        $addImage = isset($_FILES['update_image']) ? $_FILES['update_image'] : null;
        $addResult = $data->insertCategory($name, $content, $addImage);

        if ($addResult) {
            echo '<script>window.location.href = "index.php";</script>';
            exit();
        } else {
            echo "Insert failed!";
        }

    }
?>

<form method='post' enctype="multipart/form-data">
    <img src="../assets/images/llogo1.png" alt="" width='350px' style='object-fit:cover; border-radius:20px; margin: 10px;'>

    <input type="file" name="update_image" id="">

    <br>
    
    <div class="input_container">
        <input type="text" name="name" id="">
        <textarea name="content" id="" cols="30" rows="10"></textarea>
    </div>

    <button type="submit" name='submit' class='btn_submit'>Add Category</button>
    </form>
<?php
    require_once 'includes/footer.php';
?>