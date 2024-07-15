<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: turquoise;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
  background-color: turquoise;
}
 
.sidebar a.active {
  background-color: black;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

.profile-photo{
    max-width:200px;
}
</style>
</head>
<body>

<div class="sidebar">
    <img src="../p/fredrinn1.jpg" alt="Photo" class="profile-photo">
  <a class="active" href="#dashboard">Dashboard</a>
  <a href="list_admin.php">Daftar Admin</a>
  <a href="add_admin.php">Tambah Admin</a>
  <a href="list_blog.php">Daftar Blog</a>
  <a href="add_blog.php">Tambah Blog</a>
  <a href="inbox.php">Inbox</a>
  <a href="logout.php">Logout</a>
</div>

<div class="content">
  <h2>Selamat Datang Di Dashboard Admin</h2>
</div>

</body>
</html>