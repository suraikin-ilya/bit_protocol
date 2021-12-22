<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//include  "db_connection.php";
//
//$db_connect = mysqli_connect("127.0.0.1", "root", "", "bit")
//or die("Ошибка " . mysqli_error($db_connect));
//mysqli_set_charset($db_connect, "utf8");
require "db_connection.php";
//
//$db_connect = mysqli_connect("std-mysql", "std_1252_bit", "12345678", "std_1252_bit")
//or die("Ошибка " . mysqli_error($db_connect));
//mysqli_set_charset($db_connect, "utf8");


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];



mysqli_query($db_connect, "INSERT INTO `users` (`user_id`, `username` , `email`, `password`) VALUES (NULL, '$username', '$email', '$password')");



header('Location: .././auth_login.php');