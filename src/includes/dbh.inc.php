<?php

#getenv('MYSQL_DBHOST') ? $serverName=getenv('MYSQL_DBHOST') : $serverName = "localhost";
#getenv('MYSQL_DBPORT') ? $serverPort=getenv('MYSQL_DBPORT') : $serverPort = "3306";
#getenv('MYSQL_DBUSER') ? $dbUsername=getenv('MYSQL_DBUSER') : $dbUsername = "root";
#getenv('MYSQL_DBPASS') ? $dbPassword=getenv('MYSQL_DBPASS') : $dbPassword = "";
#getenv('MYSQL_DBNAME') ? $dbName=getenv('MYSQL_DBNAME') : $dbName = "";

$serverName = "mysql";
$dbUsername = "root";
$dbPassword = "secret";
$dbName = "dbusers";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}