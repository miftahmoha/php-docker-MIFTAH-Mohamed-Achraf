<?php
// database connexion
include_once "dbh.inc.php";

if (isset($_POST['submit'])) {
    // retrieving variables
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordrpt = $_POST['password-r'];

    // including functions
    include "functions.inc.php";

    // error handlers
    if (checkFieldsSignup($username, $email, $password, $passwordrpt)) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }
    if (checkPasswordSignup($password, $passwordrpt)) {
        header("location: ../signup.php?error=passwordMatch");
        exit();
    }
    if (invalidUsernameSignup($username)) {
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }
    if (userAlreadyExists($username, $conn)) {
        header("location: ../signup.php?error=userExists");
        exit();
    }

    // adding new users to the database
    $query = "INSERT INTO users (username, email, pwd) 
    VALUES ('$username', '$email', '$password');";
    mysqli_query($conn, $query);
    header("location: ../index.php?signup=success");
}
else {
    header("location: ../index.php?signup=failed");
}
