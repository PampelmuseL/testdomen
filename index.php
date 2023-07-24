<?php

require_once "router.php";

$routes = ['GET' => [], 'POST' => []];

$routes['GET'] += route('/', function (): void {
    include "db.php";
    $mysql = $mysql->query("SELECT * FROM shop_table");
    while ($product = $mysql->fetch_assoc()) {
        echo "ID: " . $product['id'] . "<br>";
        echo "Название: " . "<a href='/product?id=$product[id]'>$product[title]</a>" . "<br>";
    }
    $mysql->close();
});

$routes['GET'] += route('/product', function (): void {
    if (!$_GET['id']) {
        header("Location: http://testdomen.com");
    }
    $id = $_GET['id'];
    include "db.php";
    $mysql = $mysql->query("SELECT * FROM shop_table WHERE id='$id'");
    $product = $mysql->fetch_assoc();
    echo "Название товара: $product[title]" . "<br>";
    echo "Описание товара: $product[description]" . "<br>";
    $mysql->close();
    echo "<a href='http://testdomen.com/delete?id=$id'>Удалить товар</a>";
});
$routes['GET'] += route('/delete', function (): void {
    if (!$_GET['id']) {
        header("Location: http://testdomen.com");
    }
    $id = $_GET['id'];
    include "db.php";
    $mysql = $mysql->query("DELETE FROM shop_table WHERE id='$id'");
    $mysql->close();
    header("Location: http://testdomen.com");
});


$routes['GET'] += route('/create', function (): void {
    include "pages/create.php";
});

$routes['POST'] += route('/create', function (): void {
    include "db.php";
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date('Y-m-d');
    $mysql->query("INSERT INTO shop_table VALUES (NULL, '$title', '$description', '$date')");
    $mysql->close();
    header("Location: http://testdomen.com/");
});

$routes['GET'] += route('profile', function () {
    return "Profile page";
});

$url = $_SERVER['REQUEST_URI'];

dispatch($_SERVER['REQUEST_METHOD'], $url, $routes);
