<?php
include '../config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM blog WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['contect'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $target = "../uploads/".basename($thumbnail);

    if ($thumbnail) {
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target);
        $sql = "UPDATE blog SET title='$title', contect='$content', thumbnail='$thumbnail' WHERE id=$id";
    } else {
        $sql = "UPDATE blog SET title='$title', contect='$content' WHERE id=$id";
    }

    mysqli_query($conn, $sql);
    header('Location: list_blog.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <script src="../assets/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: 'textarea'
    });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 600px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
            height: 200px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            background-color: #5cb85c;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-button:hover {
            color: #5cb85c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Artikel</h2>
        <form method="post" action="edit_blog.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <label for="title">Judul:</label>
            <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required>
            
            <label for="contect">Konten:</label>
            <textarea id="contect" name="contect"><?php echo $row['contect']; ?></textarea>
            
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" id="thumbnail" name="thumbnail">
            
            <button type="submit">Update Artikel</button>
        </form>
        <a href="list_blog.php" class="back-button">Kembali ke Daftar Artikel</a>
    </div>
</body>
</html>
