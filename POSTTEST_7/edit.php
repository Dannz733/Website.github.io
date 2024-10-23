<?php
// edit.php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Mengambil data berdasarkan ID
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        echo "Data tidak ditemukan.";
        exit();
    }

    $stmt->close();
} else {
    echo "ID tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; padding: 20px; }
        .form-container { max-width: 500px; margin: auto; }
        label { display: block; margin-top: 10px; }
        input[type="text"], select, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        input[type="submit"] { margin-top: 15px; padding: 10px 20px; }
        a { display: block; margin-top: 10px; text-decoration: none; color: #3498db; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data Pengguna</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($user['nama']); ?>" required>

            <label for="pekerjaan">Pekerjaan:</label>
            <select id="pekerjaan" name="pekerjaan">
                <option value="Pelajar" <?php if($user['pekerjaan'] == 'Pelajar') echo 'selected'; ?>>Pelajar</option>
                <option value="Pegawai" <?php if($user['pekerjaan'] == 'Pegawai') echo 'selected'; ?>>Pegawai</option>
                <option value="Wirausaha" <?php if($user['pekerjaan'] == 'Wirausaha') echo 'selected'; ?>>Wirausaha</option>
            </select>

            <label for="hobi">Hobi:</label>
            <div class="checkbox-group">
                <?php
                $hobi_user = explode(", ", $user['hobi']);
                $hobi_options = ["Membaca", "Olahraga", "Menulis"];
                foreach ($hobi_options as $hobi) {
                    $checked = in_array($hobi, $hobi_user) ? 'checked' : '';
                    echo '<label><input type="checkbox" name="hobi[]" value="'.$hobi.'" '.$checked.'> '.$hobi.'</label><br>';
                }
                ?>
            </div>

            <label for="Komentar">Komentar:</label>
            <textarea id="Komentar" name="Komentar" rows="4" required><?php echo htmlspecialchars($user['komentar']); ?></textarea>

            <input type="submit" value="Update">
        </form>
        <a href="read.php">Kembali ke Data</a>
    </div>
</body>
</html>
