<?php

if (isset($_POST["submit"])) {
    // retrieving variables
    $email = $_POST["email"];
    $object = $_POST["object"];
    $message = $_POST["message"];

    // including functions
    include "functions.inc.php";

    // error handlers
    if (checkFieldsContact($email, $object, $message)) {
        header("location: ../contact.php?error=emptyInput");
        exit();
    }
}
else {
    header("location: ../contact.php");
}