<?php
// update.php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $id = intval($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : '';
    $komentar = htmlspecialchars($_POST['Komentar']);

    // Menyiapkan dan menjalankan query update
    $stmt = $conn->prepare("UPDATE users SET nama = ?, pekerjaan = ?, hobi = ?, komentar = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nama, $pekerjaan, $hobi, $komentar, $id);

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
