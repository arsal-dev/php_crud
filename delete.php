<?php
include './db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM form_data WHERE id = $id";

$conn->query($sql);

header('Location: index.php');
