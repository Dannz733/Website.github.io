<?php
// connect.php

$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = "";     // Ganti dengan password database Anda
$dbname = "form_data";

// Membuat Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek Koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
