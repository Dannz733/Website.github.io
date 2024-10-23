<?php
// process.php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : '';
    $komentar = htmlspecialchars($_POST['Komentar']);

    // Menyiapkan dan menjalankan query
    $stmt = $conn->prepare("INSERT INTO users (nama, pekerjaan, hobi, komentar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $pekerjaan, $hobi, $komentar);

    if ($stmt->execute()) {
        // Redirect ke halaman read.php setelah sukses
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
