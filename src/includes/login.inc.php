<?php
// database connexion
include_once "dbh.inc.php";

if (isset($_POST['submit'])) {
    // retrieving variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    // including functions
    include "functions.inc.php";

    // error handlers
    if (checkFieldsLogin($username, $password)) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }
    if (checkUsernameLogin($username, $conn)) {
        header("location: ../login.php?error=userExists");
        exit();
    }
    if (checkPasswordLogin($username, $password, $conn)) {
        header("location: ../login.php?error=wrongInput");
        exit();
    }

    session_start();
    $query = "SELECT * FROM users WHERE username='$username';";
    $result = mysqli_query($conn, $query);
    $dbResult = mysqli_fetch_assoc($result);
    $_SESSION["username"] = $dbResult["username"];
    $_SESSION["email"] = $dbResult["email"];
    header("location: ../index.php");
}
else {
    header("location: ../login.php");
}
