<?php
include 'db.php';

// Ambil data buku dari database
$sql = "SELECT * FROM buku";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku Perpustakaan</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
        }

        /* Header */
        header {
            background-color: #cc0000;
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 1em;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #ff4d4d;
        }

        /* Main Content */
        main {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #cc0000;
            margin-bottom: 20px;
        }

        .books-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .book-box {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .book-box h3 {
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #333;
        }

        .book-box p {
            margin-bottom: 10px;
            font-size: 0.9em;
            color: #666;
        }

        .btn-action {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            color: white;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-action.edit {
            background-color: #28a745;
        }

        .btn-action.edit:hover {
            background-color: #218838;
        }

        .btn-action.delete {
            background-color: #dc3545;
        }

        .btn-action.delete:hover {
            background-color: #c82333;
        }

        /* Tambah Buku Box */
        .add-book-box {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
            border: 2px dashed #cc0000;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .add-book-box:hover {
            background-color: #ffe6e6;
            transform: scale(1.05);
        }

        .add-book-link {
            text-decoration: none;
            color: #cc0000;
            font-weight: bold;
            font-size: 1.2em;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .book-box {
                font-size: 0.9em;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">Logo Perpustakaan</div>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="katalog.php">Katalog Buku</a></li>
                <li><a href="#">Peminjaman</a></li>
                <li><a href="#">Pengaturan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Katalog Buku Perpustakaan</h1>
        <div class="books-container">
            <!-- Kotak Tambah Buku -->
            <div class="book-box add-book-box">
                <a href="form.php" class="add-book-link">
                    <h3>+ Tambah Buku</h3>
                </a>
            </div>

            <!-- Daftar Buku -->
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="book-box">
                        <h3><?php echo $row['judul']; ?></h3>
                        <p><strong>Penulis:</strong> <?php echo $row['penulis']; ?></p>
                        <p><strong>Status:</strong> <?php echo $row['status']; ?></p>
                        <div>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-action edit">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-action delete">Hapus</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="grid-column: span 3; text-align: center;">Tidak ada data buku.</p>
            <?php endif; ?>
        </div>
    </main>

        <!-- <footer>
            <p>© library, 2025</p>
        </footer> -->
</body>

</html>
