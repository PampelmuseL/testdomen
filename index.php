<?php

require_once "router.php";

$routes = ['GET' => [], 'POST' => []];

$routes['GET'] += route('/', function () {
    include "pages/home.php";
});

$routes['POST'] += route('/', function () {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    return $name . " " . $surname;
});

$routes['GET'] += route('profile', function () {
    return "Profile page";
});

$url = $_SERVER['REQUEST_URI'];

dispatch($_SERVER['REQUEST_METHOD'], $url, $routes);
