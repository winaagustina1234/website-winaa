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
    <link rel="stylesheet" href="style.css"> <!-- Tambahkan CSS jika perlu -->
    <script src="script.js"></script> <!-- Tambahkan JS jika perlu -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #cc0000;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 1em;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #ff4d4d;
        }

        main {
            padding: 20px;
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .box {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .box h2 {
            color: #cc0000;
            margin-bottom: 15px;
        }

        .box a {
            text-decoration: none;
            color: white;
            background-color: #cc0000;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .box a:hover {
            background-color: #ff4d4d;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #cc0000;
            color: white;
        }

        footer a {
            color: #ffcccc;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            color: white;
        }

        /* Tambahan untuk pencarian dan tabel */
        .search-section {
            width: 100%;
            text-align: center;
            margin-top: 40px;
        }

        .search-section input {
            padding: 10px;
            width: 300px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        thead {
            background-color: #cc0000;
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">Perpustakaan</div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="katalog.php">Katalog Buku</a></li>
                <li><a href="#">Peminjaman</a></li>
                <li><a href="#">Pengaturan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="box">
            <h2>Katalog Buku</h2>
            <p>Lihat koleksi buku perpustakaan kami dan temukan buku favorit Anda.</p>
            <a href="katalog.php">Lihat Katalog</a>
        </div>

        <div class="box">
            <h2>Peminjaman</h2>
            <p>Cek status peminjaman buku Anda atau ajukan peminjaman baru.</p>
            <a href="#">Kelola Peminjaman</a>
        </div>

        <div class="box">
            <h2>Pengaturan</h2>
            <p>Atur profil Anda, kelola preferensi, dan lainnya.</p>
            <a href="#">Buka Pengaturan</a>
        </div>

        <!-- Pencarian -->
        <div class="search-section">
            <form method="GET" action="">
                <input type="text" name="keyword" placeholder="Cari judul atau penulis..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
                <button type="submit">Cari</button>
            </form>
        </div>

        <!-- Tabel Buku -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
                    $keyword = $conn->real_escape_string($_GET['keyword']);
                    $sql = "SELECT * FROM buku WHERE judul LIKE '%$keyword%' OR penulis LIKE '%$keyword%'";
                } else {
                    $sql = "SELECT * FROM buku";
                }

                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $status = isset($row['status']) ? htmlspecialchars($row['status']) : '-';

                        echo "<tr>
                                <td>{$no}</td>
                                <td>" . htmlspecialchars($row['judul']) . "</td>
                                <td>" . htmlspecialchars($row['penulis']) . "</td>
                                <td>{$status}</td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> Perpustakaan. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>