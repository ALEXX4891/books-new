<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost'; // имя хоста
$database = 'bookstore'; // 
$user = 'bookstore'; //
$pswd = 'gtZfo*L7'; //пароль

$db = mysqli_connect($host, $user, $pswd, $database) or die("Ошибка БД localhost #1");


// include $_SERVER["DOCUMENT_ROOT"] . 'db.php';
