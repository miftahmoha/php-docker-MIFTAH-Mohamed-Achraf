<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" <?php echo "href=$styling" ?> />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Open+Sans&family=Roboto+Mono:wght@200&family=Poppins:wght@100;200;300&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/d3f5426220.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <div class="banner">
        <a class="fas fa-paint-brush" href="index.php"></a>
        <a class="category" href="products.php">PRODUCTS</a>
        <a class='category' href='cart.php'>CART</a>
        <?php 
        if (isset($_SESSION["username"])) {
          echo "<a class='category' href='./includes/logout.inc.php'>LOGOUT</a>";
        }
        else {
          echo "<a class='category' href='login.php'>LOGIN</a>";
          echo "<a class='category' href='signup.php'>SIGNUP</a>";
        }
        ?>
        <a class="category" href="contact.php">CONTACT</a>
      </div>  
      <?php
      if (isset($_GET["signup"])) {
        switch($_GET["signup"]) {
          case "success":
          echo "<p class='anc'>You have successfully signed up!</p>";
          break;
          case "failed":
          echo "<p class='anc'>An error occcured, repeat!</p>";
          break;
        }
      }
      ?>
    </header>