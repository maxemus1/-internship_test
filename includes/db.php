<?php

$user = 'root';
$pass = '';
$pdo = new PDO('mysql:host=127.0.0.1;port=3310;dbname=test', $user, $pass);
$pdo->exec("SET NAMES UTF8");
if ($pdo == false) {
    echo 'Не удалось подключиться к базе данных!<br>';
    exit();
}