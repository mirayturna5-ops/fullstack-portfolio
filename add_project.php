<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$title = $_POST['title'];
$description = $_POST['description'];

$stmt = $conn->prepare("INSERT INTO projects(title, description) VALUES(?, ?)");
$stmt->bind_param("ss", $title, $description);

if ($stmt->execute()) {
    header("Location: admin.php");
} else {
    echo "Error!";
}

header("Cache-Control: no-cache, must-revalidate");

?>