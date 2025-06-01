<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
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

        #error-message {
            color: #ff0000; /* Warna pesan kesalahan */
            font-size: 0.9em;
            margin-top: 10px;
        }

        /* Link ke registrasi */
        .register-link {
            margin-top: 15px;
            font-size: 0.9em;
            color: #555;
        }

        .register-link a {
            color: #cc0000; /* Warna merah */
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            color: #ff4d4d;
        }

        /* Responsif untuk perangkat kecil */
        @media (max-width: 600px) {
            .login-container {
                padding: 15px;
            }

            h2 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="proses_login.php" method="POST"> <!-- Menghubungkan ke file proses login -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <p id="error-message"></p>
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="registrasi.php">Registrasi di sini</a></p>
        </div>
    </div>
</body>
</html>
