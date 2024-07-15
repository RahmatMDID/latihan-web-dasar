<?php
include '../config.php';

$sql = "SELECT * FROM blog";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .button-container {
            margin: 20px 0;
            text-align: center;
        }

        .button-container a {
            text-decoration: none;
            color: white;
            background-color: green;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .button-container a:hover {
            background-color: #4cae4c;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 0 10px black;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
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

        img {
            border-radius: 4px;
        }

        .actions a {
            text-decoration: none;
            color: black;
            margin-right: 10px;
            transition: color 0.3s;
        }

        .actions a:hover {
            color: #4cae4c;
        }
    </style>
</head>
<body>
    <h2>Daftar Artikel</h2>
    <div class="button-container">
        <a href="add_blog.php">Tambah Artikel</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Thumbnail</th>
            <th>Konten</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $counter = 1;
        while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $counter++; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><img src="../uploads/<?php echo $row['thumbnail']; ?>" width="100"></td>
            <td><?php echo substr($row['contect'], 0, 100); ?>...</td>
            <td class="actions">
                <a href="edit_blog.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="del_blog.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus artikel ini?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <div class="button-container">
        <a href="dashboard.php">Kembali ke Dashboard</a>
    </div>
</body>
</html>
