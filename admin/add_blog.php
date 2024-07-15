<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['contect'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $target = "../uploads/".basename($thumbnail); // Pastikan jalur target benar

    // Periksa apakah folder uploads ada dan bisa ditulisi
    if (!file_exists('../uploads')) {
        mkdir('../uploads', 0755, true);
    }

    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target)) {
        $sql = "INSERT INTO blog (title, contect, thumbnail) VALUES ('$title', '$content', '$thumbnail')";
        if (mysqli_query($conn, $sql)) {
            header('Location: list_blog.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload file.";
    }
}
?>

<script src="../assets/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: 'textarea'
});
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .form-container h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .form-container input[type="text"],
        .form-container input[type="file"],
        .form-container textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid black;
            border-radius: 4px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: green;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Artikel</h2>
        <form method="post" action="add_blog.php" enctype="multipart/form-data">
            <label for="title">Judul:</label>
            <input type="text" id="title" name="title" required>
            <label for="contect">Konten:</label>
            <textarea id="contect" name="contect" rows="10" required></textarea>
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" id="thumbnail" name="thumbnail" required>
            <button type="submit">Tambah Artikel</button>
        </form>
    </div>
</body>
</html>
