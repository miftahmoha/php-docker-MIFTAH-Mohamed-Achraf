<?php
  $styling = "css/login.css";
  include "./stc/header.php"
?>
<main>
  <form action="./includes/signup.inc.php" class="contact" method="POST">
    <p class="form-text">Create an account!</p>
    <div class="form-background">
      <h3>SIGNUP</h3>
      <input class="input" name="username" id="name" placeholder="Username" type="text" />
      <input class="input" name="email" id="email" placeholder="Email" type="email" />
      <input class="input" name="password" id="password" placeholder="Password" type="password" />
      <input class="input" name="password-r" id="r-password" placeholder="Repeat password" type="password" />
      <button type="submit" name="submit" class="button">Signup</button>
      <?php 
      if (isset($_GET["error"])) {
        switch($_GET["error"]) {
          case "emptyInput":
            echo "<p class='error'>Fill in all the fields!</p>";
            break;
          case "passwordMatch":
            echo "<p class='error'>The passwords don't match!</p>";
            break;
          case "invalidUsername":
            echo "<p class='error'>Don't use special characters in your username!</p>";
            break;
          case "userExists":
            echo "<p class='error'>This username is already taken!</p>";
            break;
        }
     }
    ?>
    </div>  
  </form>
</main>
<?php include "./stc/footer.php"?>
