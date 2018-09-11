<?php
require "includes/db.php";
$fields = ['first_name', 'middle_name', 'last_name', 'phone', 'email', 'comments', 'tags', 'city'];
$errors = [];
foreach ($fields as $kye => $value) {
    if (!empty($_POST[$value])) {
        $params[$value] = htmlspecialchars(trim($_POST[$value]));
    } else {
        $errors[] = ['error' => 'Поле ' . $fields[$kye] . ' пустое'];
    }
}
if (!empty($errors)) {
    echo json_encode(['errors' => $errors, 'result' => 'Fail'], JSON_UNESCAPED_UNICODE);
    http_response_code(400);
} else {
    $query = $pdo->prepare("INSERT INTO requests SET first_name=:first_name,middle_name =:middle_name,last_name=:last_name,phone=:phone,email=:email,comments=:comments,tags=:tags,city=:city ");
    $query->execute($params);
    echo json_encode(['result' => 'ok'], JSON_UNESCAPED_UNICODE);
    http_response_code(200);
}



