<?php

if (!$_GET['id']) {
    header("Location: http://testdomen.com");
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
include "db.php";
$mysql = $mysql->query("SELECT * FROM shop_table WHERE id='$id'");
$product = $mysql->fetch_assoc();
echo "Название товара: $product[title]" . "<br>";
echo "Описание товара: $product[description]" . "<br>";
$mysql->close();
echo "<form method='POST' action='http://testdomen.com/product/delete'><input type='hidden' value='DELETE' name='method'><input type='hidden' value='$id' name='id'><button type='submit'>Удалить товар</button> </form>";
