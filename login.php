<?php
        require_once 'includes/header.php';

        require_once 'classes/Users.php';
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = new Users();
            $login->login($username, $password);
        }
    ?>

    <div class="form">
        <h3>Login</h3>
        <form id="loginForm" method='post'>
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password">
            <span id="setError" class="error"></span>
            <br>
            <button type="submit" name='submit'>Login</button>
        </form>
    </div>

<?php
    require_once 'includes/footer.php';
?>