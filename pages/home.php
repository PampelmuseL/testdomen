<?php

include "db.php";
$mysql = $mysql->query("SELECT * FROM shop_table");
while ($product = $mysql->fetch_assoc()) {
    echo "ID: " . $product['id'] . "<br>";
    echo "Название: " . "<a href='/product?id=$product[id]'>$product[title]</a>" . "<br>";
}
$mysql->close();
