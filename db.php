<?php
// Bu bilgileri InfinityFree "MySQL Databases" sayfasından kopyalayın
$servername = "sql311.infinityfree.com"; // MySQL Hostname yazan yer
$username = "if0_41888134";            // MySQL Username yazan yer
$password = "RO7MSQTZRFygB";    // InfinityFree hesap şifreniz
$dbname = "if0_41888134_portfolio"; // Oluşturduğunuz veritabanının TAM adı

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>