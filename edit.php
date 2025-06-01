<?php
include 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$judul = '';
$penulis = '';
$status = 'Tersedia';

if ($id) {
    // Ambil data buku untuk edit
    $sql = "SELECT * FROM buku WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $judul = $row['judul'];
        $penulis = $row['penulis'];
        $status = $row['status'];
    } else {
        // Jika tidak ada buku dengan ID tersebut, redirect ke index
        header("Location: katalog.php");
        exit();
    }
} else {
    // Jika ID tidak ada, redirect ke index
    header("Location: katalog.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* style2.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #ffe6e6; /* Warna latar belakang lembut merah muda */
    color: #333;
}

header {
    background-color: #cc0000; /* Warna merah dominan */
    color: #fff;
    padding: 20px;
    text-align: center;
}

h1 {
    color: #ffe6e6;
    margin: 0;
    font-size: 2em;
}

main {
    padding: 20px;
    max-width: 600px;
    margin: 30px auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

label {
    font-weight: bold;
    color: #cc0000;
}

input, select, button {
    padding: 10px;
    border: 2px solid #cc0000;
    border-radius: 5px;
    font-size: 1em;
}

input:focus, select:focus {
    outline: none;
    border-color: #ff4d4d; /* Warna merah terang saat fokus */
    box-shadow: 0 0 5px #ff4d4d;
}

button {
    background-color: #cc0000;
    color: #fff;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #ff4d4d;
}

a {
    text-decoration: none;
    color: #cc0000;
    font-weight: bold;
    text-align: center;
}

a:hover {
    color: #ff4d4d;
}

@media (max-width: 600px) {
    main {
        padding: 15px;
    }

    h1 {
        font-size: 1.5em;
    }
}

    </style>
</head>

<body>
    <header>
        <h1>Edit Buku</h1>
    </header>

    <main>
        <form action="save.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="judul">Judul Buku:</label>
            <input type="text" name="judul" id="judul" value="<?php echo htmlspecialchars($judul); ?>" required>

            <label for="penulis">Penulis:</label>
            <input type="text" name="penulis" id="penulis" value="<?php echo htmlspecialchars($penulis); ?>" required>

            <label for="status">Status Buku:</label>
            <select name="status" id="status">
                <option value="Tersedia" <?php echo $status == 'Tersedia' ? 'selected' : ''; ?>>Tersedia</option>
                <option value="Dipinjam" <?php echo $status == 'Dipinjam' ? 'selected' : ''; ?>>Dipinjam</option>
            </select>

            <button type="submit">Simpan</button>
            <a href="katalog.php">Batal</a>
        </form>
    </main>
</body>

</html>