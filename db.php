<?php
$host = "localhost"; // Ganti dengan host database Anda
$user = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "perpustakaan"; // Ganti dengan nama database Anda

// Koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
