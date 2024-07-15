<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

$query = "SELECT * FROM admin";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px black;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 20px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            text-align: center;
        }

        .btn:hover {
            background-color: #4cae4c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: green;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions a {
            color: #333;
            text-decoration: none;
            margin-right: 10px;
            transition: color 0.3s;
        }

        .actions a:hover {
            color: #5cb85c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Admin</h2>
        <a href="add_admin.php" class="btn">Tambah Admin</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama Lengkap</th>
                <th>Aksi</th>
            </tr>
            <?php
             $counter = 1;
            while ($admin = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $counter++; ?></td>
                <td><?php echo $admin['username']; ?></td>
                <td><?php echo $admin['email']; ?></td>
                <td><?php echo $admin['nama_lengkap']; ?></td>
                <td class="actions">
                    <a href="edit_admin.php?id=<?php echo $admin['id']; ?>">Edit</a> 
                    <a href="delete_admin.php?id=<?php echo $admin['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus admin ini?');">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="dashboard.php" class="btn">Kembali ke Dashboard</a>
    </div>
</body>
</html>
