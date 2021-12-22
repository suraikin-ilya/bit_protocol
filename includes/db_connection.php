<?php
$db_connect = mysqli_connect("localhost", "bitprotocol", "uMwFCjrAWMZdrU7d", "bitptest")
or die("Ошибка " . mysqli_error($db_connect));
mysqli_set_charset($db_connect, "utf8");
//$_SERVER['SERVER_NAME'] = 'phpexam.std-1252.ist.mospolytech.ru';

//

//$db_connect = mysqli_connect("localhost", "root", "", "bit")
//or die("Ошибка " . mysqli_error($db_connect));
//mysqli_set_charset($db_connect, "utf8");

$_SERVER['SERVER_NAME'] = 'https://bitback.upgradeweb.ru';