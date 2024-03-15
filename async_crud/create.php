<?php

include './db_connect.php';


$json_data = file_get_contents('php://input');

$data_obj = json_decode($json_data);

$name = $data_obj->name;
$qty = $data_obj->qty;
$category = $data_obj->category;
$price = $data_obj->price;

if (empty($name)) {
    echo json_encode(['status' => 400, 'result' => 'name is empty']);
}

$conn->query("INSERT INTO `products`(`name`, `qty`, `category`, `price`) VALUES ('$name','$qty','$category','$price')");

echo json_encode(['status' => 200, 'result' => 'data saved into the database']);
