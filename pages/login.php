<?php

session_start();
function login($method)
{
    if (array_key_exists('id', $_SESSION)) {
        header("Location: http://testdomen.com");
    }
    if ($method == 'GET') {
        include 'html/login.php';
    }
    if ($method == 'POST') {
        if (!(array_key_exists('email', $_POST)) || !(array_key_exists('password', $_POST))) {
            login('GET');
            exit();
        }
        include "db.php";
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($user = $mysql->query("SELECT id, password FROM users WHERE email='$email'")) {
            $user = $user->fetch_assoc();
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['id'] = $user['id'];
                echo "Успешная авторизация!";
            } else {
                echo "Неправильный пароль!";
            }
        }
        $mysql->close();
    }
}
