<?php

$dsn = 'mysql:host=127.0.0.1;port=3309;dbname=form';
$user = 'root';
$pass = '1234';
try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}
