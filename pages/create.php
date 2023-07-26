<?php

function createGet(): void
{
    include "html/create.php";
}

function createPost(): void
{
    include "db.php";
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $date = date('Y-m-d');
    $mysql->query("INSERT INTO shop_table VALUES (NULL, '$title', '$description', '$date')");
    $mysql->close();
    header("Location: http://testdomen.com/");
}
