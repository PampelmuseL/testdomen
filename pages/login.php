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
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($user = $mysql->query("SELECT id FROM users WHERE email='$email'")) {
            $user = $user->fetch_assoc();
            $_SESSION['id'] = $user['id'];
            echo "Успешная авторизация!";
        }
        $mysql->close();
    }
}
