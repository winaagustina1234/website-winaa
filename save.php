<?php
include 'db.php';

$id = isset($_POST['id']) ? $_POST['id'] : null;
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$status = $_POST['status'];

if ($id) {
    // Update buku
    $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', status='$status' WHERE id=$id";
} else {
    // Tambah buku baru
    $sql = "INSERT INTO buku (judul, penulis, status) VALUES ('$judul', '$penulis', '$status')";
}

if ($conn->query($sql) === TRUE) {
    header("Location: katalog.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
