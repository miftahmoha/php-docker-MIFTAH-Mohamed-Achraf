<?php
// database connexion
include_once "dbh.inc.php";
session_start();
if (isset($_POST["remove"])) {
    if (isset($_SESSION["username"])) {
      // fetch for username's foreign key
      $username = $_SESSION["username"];
      $query = "SELECT * FROM users WHERE username='$username';";
      $result = mysqli_query($conn, $query);
      $dbResult = mysqli_fetch_assoc($result);
      $userId = $dbResult["userId"];
      // insert username's cart data into database
      $query = "DELETE FROM carts WHERE userId='$userId';";
      $result = mysqli_query($conn, $query);
      header("location: ../cart.php");
    }
    else {
      $fopen = fopen("../cookies.txt", 'w');
      fwrite($fopen, "");
      fclose($fopen);
      header("location: ../cart.php");
    }
  }
