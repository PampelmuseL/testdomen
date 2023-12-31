<?php

session_start();
function registration($method)
{
    if (array_key_exists('id', $_SESSION)) {
        header("Location: http://testdomen.com");
    }
    if ($method == 'GET') {
        include 'html/registration.php';
    }
    if ($method == 'POST') {
        if (!(array_key_exists('email', $_POST)) || !(array_key_exists('password', $_POST))) {
            registration('GET');
            exit();
        }
        include "db.php";
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $date = date('Y-m-d');
        if ($mysql->query("INSERT INTO users VALUES (NULL, '$email', '$password', '$date')")) {
            echo "Аккаунт успешно создан!";
            $_SESSION['id'] = $mysql->insert_id;
        }
        $mysql->close();
    }
}
