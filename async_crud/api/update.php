<?php

include '../db_connect.php';

$updateData = file_get_contents('php://input');

$updateData = json_decode($updateData);

$id = $updateData->up_id;
$name = $updateData->up_name;
$category = $updateData->up_category;
$qty = $updateData->up_qty;
$price = $updateData->up_price;


$sql = "UPDATE `products` SET `name`='$name',`qty`='$qty',`category`='$category',`price`='$price' WHERE id = $id";

if ($conn->query($sql)) {
    echo json_encode(['status' => 200, 'result' => 'product was updated successfully']);
} else {
    echo json_encode(['status' => 400, 'result' => 'There was an error updating the data.']);
}
