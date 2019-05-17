<?php

$user = 'root';
$pass = '1234';
$pdo = new PDO('mysql:host=127.0.0.1;port=3307;dbname=test', $user, $pass);
if ($pdo == false) {
    echo 'Не удалось подключиться к базе данных!<br>';
    exit();
}