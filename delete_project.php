<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: admin.php");
} else {
    echo "Delete failed!";
}
?>