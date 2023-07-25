<?php

if (!$_POST['id']) {
    header("Location: http://testdomen.com");
}
$id = $_POST['id'];
include "db.php";
$mysql->query("DELETE FROM shop_table WHERE id='$id'");
$mysql->close();
header("Location: http://testdomen.com");
