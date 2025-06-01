<?php
// Hubungkan ke database
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Periksa apakah username atau email sudah terdaftar
    $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Username atau email sudah digunakan!";
    } else {
        // Masukkan data ke database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $sql)) {
            echo "Registrasi berhasil!";
            header("Location: login.php");
            exit;
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
}
?>
