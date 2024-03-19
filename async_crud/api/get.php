<?php

include '../db_connect.php';

$id = file_get_contents('php://input');

$sql = "SELECT * FROM products WHERE id = $id";

$result = $conn->query($sql);

$data = json_encode($result->fetch_assoc());

echo json_encode(['status' => 200, 'result' => $data]);
