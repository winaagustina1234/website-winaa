<?php
// Hubungkan ke database
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        /* Gaya CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Latar belakang lembut */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .register-container {
            background-color: #ffffff; /* Warna putih untuk form */
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #cc0000; /* Warna judul merah */
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-size: 0.9em;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        input:focus {
            outline: none;
            border-color: #cc0000; /* Fokus warna merah */
            box-shadow: 0 0 5px #ff4d4d;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #cc0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff4d4d;
        }

        .login-link {
            margin-top: 15px;
            font-size: 0.9em;
            color: #555;
        }

        .login-link a {
            color: #cc0000;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Responsif untuk perangkat kecil */
        @media (max-width: 600px) {
            .register-container {
                padding: 15px;
            }

            h2 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Registrasi</h2>
        <form action="proses_registrasi.php" method="POST"> <!-- Menghubungkan ke file proses registrasi -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Daftar</button>
        </form>
        <p class="login-link">
            Sudah memiliki akun? <a href="login.php">Login di sini</a>
        </p>
    </div>
</body>
</html>
