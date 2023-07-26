<?php

if (!$_POST['id']) {
    header("Location: http://testdomen.com");
}
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
include "db.php";
$mysql->query("DELETE FROM shop_table WHERE id='$id'");
$mysql->close();
header("Location: http://testdomen.com");
