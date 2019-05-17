<?php
//require "includes/db.php";

/**
$fields = ['first_name', 'middle_name', 'last_name', 'phone', 'email', 'comments', 'city'];
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
    $query = $pdo->prepare("INSERT INTO requests SET last_name=:last_name,first_name=:first_name,middle_name =:middle_name,phone=:phone,email=:email,city=:city,comments=:comments ");
    $query->execute($params);
    echo json_encode(['result' => 'ok'], JSON_UNESCAPED_UNICODE);
    http_response_code(200);
}
**/

//$text= json_decode($_POST['json'], true);
$text=implode($_POST);
// открываем файл, если файл не существует,
//делается попытка создать его
$fp = fopen("file.txt", "w");

// записываем в файл текст
fwrite($fp, $text);

// закрываем
fclose($fp);
