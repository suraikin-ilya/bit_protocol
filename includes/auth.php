<?php
require "db_connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);


//$db_connect = mysqli_connect("std-mysql", "std_1252_bit", "12345678", "std_1252_bit")
//or die("Ошибка " . mysqli_error($db_connect));
//mysqli_set_charset($db_connect, "utf8");

$username = $_POST['username'];

$password = $_POST['password'];

$check_user = mysqli_query($db_connect, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
$user = mysqli_fetch_assoc($check_user);
echo $user;
if (mysqli_num_rows($check_user)>0){
    setcookie('user', $user['username'], time() + 3600, "/");
    print_r($user);
}

else{

}



header('Location: .././index.php');

