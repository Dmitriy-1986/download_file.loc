<?php
$localhost = 'localhost';
$login = 'root';
$password = '';
$dbname = 'download_file';

$conn = mysqli_connect($localhost, $login, $password, $dbname);

if(!$conn) {
    die('Ошибка: ' . mysqli_connect_error());
}