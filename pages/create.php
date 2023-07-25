<?php

function createGet(): void
{
    include "html/create.php";
}

function createPost(): void
{
    include "db.php";
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date('Y-m-d');
    $mysql->query("INSERT INTO shop_table VALUES (NULL, '$title', '$description', '$date')");
    $mysql->close();
    header("Location: http://testdomen.com/");
}
