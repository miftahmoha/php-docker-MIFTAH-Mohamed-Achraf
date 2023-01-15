<?php
// database connexion
include_once "./includes/dbh.inc.php";
session_start();
?>

<?php
  $styling = "./css/cart.css";
  include "./stc/header.php"
?>

<?php
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

// importing cart items for users
if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];
  // fetch for username's foreign key
  $query = "SELECT * FROM users WHERE username='$username';";
  $result = mysqli_query($conn, $query);
  $dbResult = mysqli_fetch_assoc($result);
  $userId = $dbResult["userId"];
  // insert username's cart data into database
  $query = "SELECT * FROM carts WHERE userId='$userId';";
  $result = mysqli_query($conn, $query);
  $dbResult = mysqli_num_rows($result);
  if ($dbResult == 0) {
    echo "<div class='cart-background'>
      <h3 class='warning'> THE CART IS EMPTY! </h3>
    </div>";
  }
  while ($cart = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $cart = unserialize($cart["productRef"]);
    $reference = $cart->reference;
    $quantity = $cart->quantity;
    $price = $cart->price;
    $imageCart = $cart->imageCart;
    include "./stc/cartfrm.php";
 }
}
// importing cart items for visitors
else {
  // clearing temporary database
  if (!isset($_COOKIE["cartObject"])) {
    $fopen = fopen("./cookies.txt", 'w');
    fwrite($fopen, "");
    fclose($fopen);
  }
  $cartArray = file("./cookies.txt");
  if ($cartArray == null) {
    echo "<div class='cart-background'>
      <h3 class='warning'> THE CART IS EMPTY! </h3>
    </div>";
  }
  foreach($cartArray as $cart) {
    $cart = unserialize($cart);
    $reference = $cart->reference;
    $quantity = $cart->quantity;
    $price = $cart->price;
    $imageCart = $cart->imageCart;
    include "./stc/cartfrm.php";
  }
}
?>

<div class="adjust">
  <form action="./includes/clear.inc.php" method="POST">
    <button name="remove" type="submit" class="cart-button">Clear</button>
  </form>
</div>
<?php include "./stc/footer.php"?>