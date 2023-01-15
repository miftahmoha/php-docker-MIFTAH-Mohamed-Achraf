<?php
  $styling = "css/contact.css";
  include "./stc/header.php"
?>
<main>
  <form action="./includes/contact.inc.php" class="contact" method="POST">
    <p class="form-text">Encountering any problem? Contact us!</p>
    <div class="form-background">
      <h3>CONTACT</h3>
      <input class="input email" name="email" id="email" placeholder="Email" type="email" />
      <input
      class="input object"
      name="object"
      id="object"
      placeholder="Object"
      type="text"
      />
      <textarea
      class="input message"
      name="message"
      id="message"
      cols="30"
      rows="10"
      placeholder="Write your message here!"
      ></textarea>
      <button type="submit" class="button" name="submit">Send</button>
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
