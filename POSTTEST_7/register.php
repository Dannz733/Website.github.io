<?php
include 'db_connect.php';

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Cek apakah email sudah terdaftar
    $check_email = "SELECT * FROM users_login WHERE email='$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        echo "Email sudah terdaftar!";
    } else {
        // Simpan data ke database
        $sql = "INSERT INTO users_login (email, password) VALUES ('$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Pendaftaran berhasil!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form action="register.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" name="register" value="Daftar">
    </form>
</body>
</html>
