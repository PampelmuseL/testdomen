<?php

function createGet(): void
{
    include "html/create.php";
}

function createPost(): void
{
    if (!(array_key_exists('title', $_POST)) || !(array_key_exists('description', $_POST))) {
        createGet();
        exit();
    }
    include "db.php";
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $date = date('Y-m-d');
    $mysql->query("INSERT INTO shop_table VALUES (NULL, '$title', '$description', '$date')");
    $mysql->close();
    header("Location: http://testdomen.com/");
}
