<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];

    $query = "INSERT INTO admin (username, password, email, nama_lengkap) VALUES ('$username', '$password', '$email', '$nama_lengkap')";
    mysqli_query($conn, $query);

    header('Location: list_admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px black;
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            margin-top: 0;
            text-align: center;
            color: black;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: black;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid black;
            border-radius: 4px;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: green;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Admin</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
            <input type="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
