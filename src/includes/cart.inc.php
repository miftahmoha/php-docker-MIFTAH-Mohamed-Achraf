<?php
// database connexion
include_once "dbh.inc.php";

session_start();
class Cart {
    public $reference;
    public $quantity;
    public $price;
    public $imageCart;
    function __construct($reference, $quantity, $price, $imageCart) {
      $this->reference = $reference;
      $this->quantity = $quantity;
      $this->price = $price;
      $this->imageCart = $imageCart;
    }
    function getReference() {
      return $this->$reference;
    }
    function getQuantity() {
      return $this->$quantity;
    }
    function getPrice() {
      return $this->$price;
    }
    function getImageCart() {
      return $this->$imageCart;
    }   
  }

// cookies setup
$cartObject = new Cart($_POST["reference"], $_POST["quantity"], $_POST["price"], $_POST["image"]);
$cartObject = serialize($cartObject);
$username = $_SESSION["username"];

// user cart database
if (isset($_SESSION["username"])) {
  // fetch for username's foreign key
  $query = "SELECT * FROM users WHERE username='$username';";
  $result = mysqli_query($conn, $query);
  $dbResult = mysqli_fetch_assoc($result);
  $userId = $dbResult["userId"];
  // insert username's cart data into database
  $query = "INSERT INTO carts (userId, productRef) 
  VALUES ('$userId', '$cartObject');";
  mysqli_query($conn, $query);
  header("location: ../cart.php");
}
else {
  // visitor cart database
  setcookie("cartObject", $cartObject, time() + 120, "/");
  $fopen = fopen("../cookies.txt", 'a');
  fwrite($fopen, $cartObject);
  fwrite($fopen, "\n");
  fclose($fopen);
  header("location: ../cart.php");
}


  