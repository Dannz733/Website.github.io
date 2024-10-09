<?php
// delete.php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Menyiapkan dan menjalankan query delete
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $id);

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
