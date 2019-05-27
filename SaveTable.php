<?php
require "includes/db.php";

$fields = ['last_name', 'first_name', 'middle_name', 'phone', 'email', 'city', 'comments'];
$arrayJson = array_column((json_decode($_POST['json'])), 'value', 'name');
$errors = [];

foreach ($fields as $kye => $value) {
    if (!empty($arrayJson[$value])) {
        $params[$value] = htmlspecialchars(trim($arrayJson[$value]));
    } else {
        $errors[] = ['error' => 'Поле ' . $fields[$kye] . ' пустое'];
    }
}
if (!empty($errors)) {
    echo json_encode(['errors' => $errors, 'result' => 'Fail'], JSON_UNESCAPED_UNICODE);
    http_response_code(400);
} else {
    $query = $pdo->prepare("INSERT INTO requests SET last_name=:last_name,first_name=:first_name,middle_name =:middle_name,phone=:phone,email=:email,city=:city,comments=:comments ");
    $query->execute($params);
    echo json_encode(['result' => 'ok'], JSON_UNESCAPED_UNICODE);
    http_response_code(200);
}



