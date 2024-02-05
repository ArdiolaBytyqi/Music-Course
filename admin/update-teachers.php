<?php
    require_once 'includes/header.php';

    require_once '../classes/Users.php';

    if(isset($_POST['submit'])){

        $id = $_GET['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone_nr = $_POST['phone_nr'];
        $category_id = $_POST['category'];

        if(empty($username) || empty($email) || empty($name) || empty($surname) || empty($phone_nr) || empty($category_id)){
            echo '<script> alert("Please fill all inputs!")</script>';
            echo '<script>window.location.href = "update-teachers.php?id='.$id.'";</script>';
        } else{
            $data = new Users();

            $updateImage = isset($_FILES['update_image']) ? $_FILES['update_image'] : null;
            $updateResult = $data->updateUsers($id, $username, $email, $name, $surname, $phone_nr, $category_id, $updateImage);

            if ($updateResult) {
                echo '<script>window.location.href = "teachers.php";</script>';
                exit();
            } else {
                echo "Update failed!";
            }
        }

    }


    $id = $_GET['id'];
    $data = new Users();
    $teachers  = $data->getTeachersById($id);

    if ($teachers) {
        foreach ($teachers as $teacher) {
?>

<form method='post' enctype="multipart/form-data">
    <img src="../<?php echo $teacher['image'];?>" alt="" width='350px' style='object-fit:cover; border-radius:20px; margin: 10px;'>

    <input type="file" name="update_image" id="">

    <br>
    
    <div class="input_container">
        <input type="text" name="username" id="" value='<?php echo $teacher['username'];?>'>
        <input type="text" name="email" id="" value='<?php echo $teacher['email'];?>'>
        <input type="text" name="name" id="" value='<?php echo $teacher['name'];?>'>
        <input type="text" name="surname" id="" value='<?php echo $teacher['surname'];?>'>
        <input type="text" name="phone_nr" id="" value='<?php echo $teacher['phone_number'];?>'>

        <select name="category" id="">
            <option value="">Select One...</option>
            <?php
                require_once '../classes/Produktet.php';
                $data = new Produktet();
                $categories  = $data->getCategories();

                if ($categories) {
                    foreach ($categories as $category) {
            ?>

            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php
                }
            } else{
                echo "Error fetching data.";   
            }
            ?>
        </select>
    </div>

    <button type="submit" name='submit' class='btn_submit'>Update</button>
    </form>
<?php
        }
    } else{
        echo "Error fetching data.";   
    }
    require_once 'includes/footer.php';
?>