<?php
  $styling = "css/login.css";
  include "./stc/header.php"
?>
<main>
  <form action="./includes/login.inc.php" class="contact" method="POST">
    <p class="form-text">Login to your account!</p>
    <div class="form-background">
      <h3>LOGIN</h3>
      <input class="input" name="username" id="email" placeholder="Username" type="text" />
      <input class="input" name="password" id="password" placeholder="Password" type="password" />
      <button type="submit" name="submit" class="button">Login</button>
      <a class="form-password" href="#">forgot password?</a>
      <a class="form-signup" href="signup.php">don't have an account yet? sign up</a>
      <?php 
        if (isset($_GET["error"])) {
          switch($_GET["error"]) {
            case "emptyInput":
            echo "<p class='error'>Fill in all the fields!</p>";
            break;
            case "userExists":
            echo "<p class='error'>The username doesn't exist!";
            break;
            case "wrongInput":
            echo "<p class='error'>The username or password is incorrect!</p>";
            break;
         }
       }
    ?>
    </div>  
  </form>
</main>
<?php include "./stc/footer.php"?>