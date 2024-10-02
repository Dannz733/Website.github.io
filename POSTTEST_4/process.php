<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $pekerjaan = htmlspecialchars(trim($_POST['pekerjaan']));
    $komentar = htmlspecialchars(trim($_POST['Komentar']));
    
    if (isset($_POST['hobi']) && is_array($_POST['hobi'])) {
        $hobi = array_map('htmlspecialchars', $_POST['hobi']);
        $hobi_list = implode(", ", $hobi);
    } else {
        $hobi_list = "Tidak ada hobi yang dipilih.";
    }

    $errors = [];

    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong.";
    }

    if (empty($komentar)) {
        $errors[] = "Komentar tidak boleh kosong.";
    }

    if (!empty($errors)) {
        echo "<h2>Terjadi Kesalahan:</h2><ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul><a href='javascript:history.back()'>Kembali</a>";
    } else {
        echo "<h2>Data yang Dikirim:</h2>";
        echo "<p><strong>Nama:</strong> " . $nama . "</p>";
        echo "<p><strong>Pekerjaan:</strong> " . $pekerjaan . "</p>";
        echo "<p><strong>Hobi:</strong> " . $hobi_list . "</p>";
        echo "<p><strong>Komentar:</strong> " . nl2br($komentar) . "</p>";
        echo "<a href='index.html'>Kembali ke Halaman Utama</a>";
    }
} else {
    header("Location: index.html");
    exit();
}
?>
