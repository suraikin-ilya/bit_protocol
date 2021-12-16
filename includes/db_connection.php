<?php
$db_connect = mysqli_connect("std-mysql", "std_1252_bit", "12345678", "std_1252_bit")
or die("Ошибка " . mysqli_error($db_connect));
mysqli_set_charset($db_connect, "utf8");
//$_SERVER['SERVER_NAME'] = 'phpexam.std-1252.ist.mospolytech.ru';

//

$db_connect = mysqli_connect("localhost", "root", "", "bit")
or die("Ошибка " . mysqli_error($db_connect));
mysqli_set_charset($db_connect, "utf8");

$_SERVER['SERVER_NAME'] = 'localhost:63342/bit_protocol/';