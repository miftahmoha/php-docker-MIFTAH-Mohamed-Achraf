<?php
session_start();
?>

<!DOCTYPE html>
<html <?php echo "class=$product" ?> lang="en">
  <head>
    <link rel="stylesheet" href="product.css" ?>
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
        <a class="fas fa-paint-brush" href="../index.php"></a>
        <a class="category" href="../products.php">PRODUCTS</a>
        <a class='category' href='../cart.php'>CART</a>
        <?php 
        if (isset($_SESSION["username"])) {
          echo "<a class='category' href='../includes/logout.inc.php'>LOGOUT</a>";
        }
        else {
          echo "<a class='category' href='../login.php'>LOGIN</a>";
        }
        ?>
        <a class="category" href="../contact.php">CONTACT</a>
      </div>  
    </header>
    <main>
      <div class="product">
        <div class="paint">
          <img class="paint-img" <?php echo "src=$image" ?> alt="">
        </div>
        <div class="info">
          <description class="paint-text">
            <?php echo "$description" ?>
          </description>
          <description class="paint-text price">
            <?php echo "Price: $price" ?>
          </description>
          <div class="order">
            <form action="../includes/cart.inc.php" method="POST">
              <input name="reference" type= "hidden" <?php
                $reference=$_GET["reference"];
                echo "value=$reference";
              ?>>
              <input name="price" type= "hidden" <?php echo "value=$price" ?>>
              <input name="image" type= "hidden" <?php echo "value=$imageCart" ?>>
              <input name="quantity" class="paint-input" type="text">
              <button class="paint-set plus" type="button">+</button>
              <button class="paint-set minus" type="button">-</button>
              <button name="submit" id="updateAjax" class="paint-button cart" type="submit">Add to cart</button>
              <button class="paint-button stock" type="button">View stock</button>
            </form>
          </div>
        </div>
      </div>
    </main>
    <script src="../js/script.js"></script>
    <footer>
      <link rel="stylesheet" href="./css/footer.css" />
      <div class="footer">
        <div class="footer-background"></div>
        <div class="footer-slope"></div>
        <h3 class="footer-text">Paintee is curious, passionate and driven.</h3>
        <div class="footer-categories">
          <a class="footer-categories-text" href="../index.php">HOME</a>
          <a class="footer-categories-text" href="../products.php">PRODUCTS</a>
          <a class="footer-categories-text" href="../login.php">LOGIN</a>
          <a class="footer-categories-text" href="../contact.php">CONTACT</a>
        </div>
        <div class="footer-subtext">
          <h3>Contact:</h3>
          <h4>323-960-4326</h4>
          <h4>contact@paintee.us</h4>
          <h4>2761  Reppert Coal Road, Texas, US</h4>
    </footer>
  </body>
</html>