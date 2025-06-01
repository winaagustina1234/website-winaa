<?php
include 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $sql = "DELETE FROM buku WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: katalog.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
