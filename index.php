<?php

require_once "router.php";

$routes = ['GET' => [], 'POST' => [], 'DELETE' => []];

$routes['GET'] += route('/', function (): void {
    include 'pages/home.php';
});

$routes['GET'] += route('/product', function (): void {
    include 'pages/product.php';
});

$routes['DELETE'] += route('/product/delete', function (): void {
    include 'pages/delete.php';
});


$routes['GET'] += route('/create', function (): void {
    include "pages/create.php";
    createGet();
});

$routes['POST'] += route('/create', function (): void {
    include "pages/create.php";
    createPost();
});

$routes['GET'] += route('/registration', function (): void {
    include "pages/registration.php";
    registration('GET');
});

$routes['POST'] += route('/registration', function (): void {
    include "pages/registration.php";
    registration('POST');
});


$url = $_SERVER['REQUEST_URI'];
$method = isset($_POST['method']) ? $_POST['method'] : $_SERVER['REQUEST_METHOD'];
dispatch($method, $url, $routes);
