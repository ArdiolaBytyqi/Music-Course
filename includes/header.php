<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="icon" href="assets/images/llogo.png" type="image/x-icon">

    <!-- CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Music</title>
</head>

<body>
    <div class="navbar">
        <div class="logo"><a href="index.php"><img src="assets/images/llogo1.png" alt="" width="200px"></a></div>
        <div class="links main_link_1">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About</a></li>
            </ul>
        </div>
        <div class="search_bar"><input type="text" name="" id="" placeholder="Search"><button><i
                    class="fa-solid fa-magnifying-glass"></i></button></div>
        <div class="links main_link_2">
            <ul>
                <li><a href="contact-us.php">Contact</a></li>
            </ul>
        </div>

        <?php
            if(!isset($_SESSION['user_id'])){
        ?>
        <div class="links">
            <ul>
                <li><a href="register.php"><i class="fa-regular fa-user"></i></a></li>
                <li><a href="login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i></a></li>
            </ul>
        </div>
        <?php
            } else{
        ?>
        
        <div class="links">
            <ul>
                <li><a href="#"><i class="fa-regular fa-user"></i> <?php echo $_SESSION['username'];?></a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Log Out</a></li>
            </ul>
        </div>
        <?php
            }
        ?>

        <div class="links burger_menu">
            <a href="javascript:void(0);" onclick="toggleBurger()">
                <i class="fa-solid fa-bars"></i>
            </a>
        </div>
    </div>

    <div class="burger_content">
    <div class="burger_close_btn" onclick="toggleBurger()">
    <span>X</span>
  </div>
    <div class="burger_link">
      <ul>
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="about-us.php">About us</a>
        </li>
        <li>
          <a href="contact-us.php">Contact us</a>
        </li>
      </ul>
    </div>

    <?php
    if (isset($_SESSION['user_id'])) {

    ?>
      <div class="burger_login">
        <ul>
          <li>
            <a href="login.php"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['username']; ?></a>
          </li>
          <li>
            <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
          </li>
        </ul>
      </div>
    <?php
    } else {
    ?>

      <div class="burger_login">
        <ul>
          <li>
            <a href="login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
          </li>
          <li>
            <a href="register.php"><i class="fa-solid fa-user-plus"></i> Register</a>
          </li>
        </ul>
      </div>
    <?php
    }
    ?>

  </div>
  <script>
  function toggleBurger() {
    var burgerContent = document.querySelector('.burger_content');
    if (burgerContent.style.right === '0px') {
      burgerContent.style.right = '-300px';

      burgerContent.addEventListener('transitionend', function onTransitionEnd() {
        burgerContent.style.display = 'none';
        burgerContent.removeEventListener('transitionend', onTransitionEnd);
      });
    } else {
      burgerContent.style.display = 'block';
      burgerContent.style.right = '0px';
    }
  }

  document.addEventListener('click', function(event) {
    var burgerContent = document.querySelector('.burger_content');
    var burgerButton = document.querySelector('.burger');

    if (!burgerContent.contains(event.target) && !burgerButton.contains(event.target)) {
      if (burgerContent.style.right === '0px') {
        burgerContent.style.right = '-300px';

        burgerContent.addEventListener('transitionend', function onTransitionEnd() {
          burgerContent.style.display = 'none';
          burgerContent.removeEventListener('transitionend', onTransitionEnd);
        });
      }
    }
  });
</script>
