<?php
    require_once 'includes/header.php';

    require_once '../classes/Users.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone_nr = $_POST['phone_nr'];
        $category_id = $_POST['category'];

        if(empty($username) || empty($email) || empty($name) || empty($surname) || empty($phone_nr) || empty($category_id)){
            echo '<script> alert("Please fill all inputs!")</script>';
            echo '<script>window.location.href = "add-users.php";</script>';
        } else{

            $data = new Users();

            $updateImage = isset($_FILES['update_image']) ? $_FILES['update_image'] : null;
            $addUser = $data->insertUsers($username, $email, $name, $surname, $phone_nr, $category_id, $updateImage);

            if ($addUser) {
                echo '<script>window.location.href = "teachers.php";</script>';
                exit();
            } else {
                echo "Username already exists";
            }
        }

    }
?>

<form method='post' enctype="multipart/form-data">
    <img src="https://img.freepik.com/premium-vector/face-cute-girl-avatar-young-girl-portrait-vector-flat-illustration_192760-82.jpg?w=740" alt="" width='350px' style='object-fit:cover; border-radius:20px; margin: 10px;'>

    <input type="file" name="update_image" id="">

    <br>
    
    <div class="input_container">
        Username
        <input type="text" name="username" id="">
        Email
        <input type="text" name="email" id="">
        Name
        <input type="text" name="name" id="">
        Surname
        <input type="text" name="surname" id="">
        Phone Nr
        <input type="text" name="phone_nr" id="">

        Category
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

    <button type="submit" name='submit' class='btn_submit'>Add User</button>
    </form>
<?php
    require_once 'includes/footer.php';
?>