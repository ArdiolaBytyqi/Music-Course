<?php
        require_once 'includes/header.php';

        require_once 'classes/Contact.php';
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $description = $_POST['description'];

            if(empty($email) || empty($description)){
                echo '<script> alert("Email and Description are required")</script>';
                echo '<script>window.location.href = "contact-us.php";</script>';
            } else{
                $data = new Contact();
                $contact = $data->setComments($name, $surname, $email, $description);

                if($contact){
                    echo '<script>window.location.href = "index.php";</script>';
                    exit();
                } else {
                    echo 'Something went wrong!';
                }

            }
        }
    ?>


    <div class="contact_container">
        <div class="content">
            <h3>Contact Us</h3><br>
            <p>Ju inkurajojmë të na kontaktoni për çdo pyetje, koment, ose nevojë për ndihmë. Për të bërë këtë, mund të përdorni formularin e kontaktit më poshtë ose të na gjeni në adresën dhe numrin e telefonit të dhënë më poshtë. Jemi këtu për t'ju ndihmuar dhe do të përpilojmë përgjigje sa më shpejt të jetë e mundur.</p>
        </div>
        <div class="contact_form">
            <form action="" method="post">
                <div class="make_row">
                    <input type="text" name="name" id="" placeholder="Name">
                    <input type="text" name="surname" id="" placeholder="Last Name">
                </div>
                <input type="email" name="email" id="" placeholder="Email">
                <textarea name="description" id="" rows="4" placeholder="Description..."></textarea>
                <button type="submit" name='submit'>Submit</button>
            </form>
        </div>
    </div>


    <?php
    require_once 'includes/footer.php';
?>