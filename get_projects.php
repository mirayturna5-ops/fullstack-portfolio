<?php
include "db.php";

header('Content-Type: application/json; charset=utf-8');

$result = $conn->query("SELECT * FROM projects ORDER BY id DESC");

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>