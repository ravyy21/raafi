<?php
require 'functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <h1>Tambah Data Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nis">NIS: </label>
                <input type="text" name="nis" id="nis" required>
            </li>
            <li>
                <label for="jk">Jenis Kelamin: </label>
                <input type="text" name="jk" id="jk" required>
            </li>
            <li>
                <label for="kelas">Kelas: </label>
                <input type="text" name="kelas" id="kelas" required>
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar" accept="image/*" required>
            </li>
            <li>
                <a href="index.php" class="btn-back">Kembali</a>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
    <br>
    <hr>
    <p align="center">© Raafi</p>
</body>
</html>
