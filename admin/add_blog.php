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

<form method="post" action="add_blog.php" enctype="multipart/form-data">
    Judul: <input type="text" name="title"><br>
    Konten: <textarea name="contect"></textarea><br>
    Thumbnail: <input type="file" name="thumbnail"><br>
    <button type="submit">Tambah Artikel</button>
</form>