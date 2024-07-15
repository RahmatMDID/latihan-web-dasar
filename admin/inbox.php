<?php
include('../config.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

$query = "SELECT * FROM kontak";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px black;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid black;
        }

        table th {
            background-color: green;
            color: #333;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .actions a {
            color: black;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid black;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .actions a:hover {
            background-color: green;
            color: white;
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: green;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .button-container a:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <h1>Inbox</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Timestamp</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Aksi</th>
        </tr>
        <?php
         $counter = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $counter++; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['massage']; ?></td>
            <td class="actions">
                <a href="del_inbox.php?id=<?php echo $row['idpesan']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <div class="button-container">
        <a href="dashboard.php">Kembali ke Dashboard</a>
    </div>
</body>
</html>
