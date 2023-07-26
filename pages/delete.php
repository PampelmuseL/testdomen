<?php

if (!$_POST['id']) {
    header("Location: http://testdomen.com");
}

if (!($id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT))) {
    http_response_code(404);
    echo "Ошибка 404! Страница не найдена!";
    exit();
}

include "db.php";
$mysql->query("DELETE FROM shop_table WHERE id='$id'");
$mysql->close();
header("Location: http://testdomen.com");
