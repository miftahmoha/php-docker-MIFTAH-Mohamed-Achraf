<?php
// signup errors
function checkFieldsSignup($username, $email, $password, $passwordrpt) {
    if (empty($username) || empty($email) || empty($password) || empty($passwordrpt)) {
        return true;
    }
    else {
        return false;
    }
}

function invalidUsernameSignup($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return true;
    }
    else {
        return false;
    }
}

function checkPasswordSignup($password, $passwordrpt) {
    if ($password !== $passwordrpt) {
        return true;
    }
    else {
        return false;
    }
}

function userAlreadyExists($username, $conn) {
    $query = "SELECT username FROM users WHERE username='$username';";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        return true;
    }
    else {
        return false;
    }
}

// login handlers
function checkFieldsLogin($username, $password) {
    if (empty($username) || empty($password)) {
        return true;
    }
    else {
        return false;
    }
}

function checkUsernameLogin($username, $conn) {
    if (!userAlreadyExists($username, $conn)) {
        return true;
    }
    else {
        return false;
    }
}

function checkPasswordLogin($username, $password, $conn) {
    if (!checkUsernameLogin($username, $conn)) {
        $query = "SELECT * FROM users WHERE username='$username';";
        $result = mysqli_query($conn, $query);
        $dbResult = mysqli_fetch_assoc($result);
        if ($password !== $dbResult["pwd"]) {
            return true;
        }
        else {
            return false;
        }
    }
}

// contact handlers
function checkFieldsContact($email, $object, $message) {
    if (empty($email) || empty($object) || empty($message)) {
        return true;
    }
    else {
        return false;
    }
}
