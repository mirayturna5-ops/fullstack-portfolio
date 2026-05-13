<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if ($name == "" || $email == "" || $message == "") {
        die("Empty fields!");
    }

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        echo "DB Error!";
    }
}
?>