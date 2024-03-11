<?php
include './db_connect.php';

$id = $_GET['id'];
$img = $_GET['img'];

unlink("uploads/$img");

$sql = "DELETE FROM form_data WHERE id = $id";

$conn->query($sql);

header('Location: index.php');
