<?php
require 'functions.php';

// Ambil parameter 'no' dari URL
$no = $_GET["no"];

// Ambil data siswa berdasarkan 'no'
$sws = query("SELECT * FROM siswa WHERE no = $no")[0];

// Proses form jika tombol submit ditekan
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {  // Memanggil fungsi ubah
        echo "
        <script>
        alert('Update Berhasil!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Update Gagal!');
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
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Menyertakan data no siswa untuk update -->
        <input type="hidden" name="no" value="<?= $sws["no"]; ?>"> 
        <!-- Menyertakan gambar lama -->
        <input type="hidden" name="gambarLama" value="<?= $sws["gambar"]; ?>">

        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $sws["nama"]; ?>">
            </li>
            <li>
                <label for="nis">NIS : </label>
                <input type="text" name="nis" id="nis" required value="<?= $sws["nis"]; ?>">
            </li>
            <li>
                <label for="jk">Jenis Kelamin: </label>
                <input type="text" name="jk" id="jk" required value="<?= $sws["jk"]; ?>">
            </li>
            <li>
                <label for="kelas">Kelas: </label>
                <input type="text" name="kelas" id="kelas" required value="<?= $sws["kelas"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $sws["jurusan"]; ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $sws["email"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar" accept="image/*">
                <br>
                <small>Gambar saat ini:</small><br>
                <!-- Menampilkan gambar lama jika ada -->
                <img src="img/<?= $sws['gambar']; ?>" width="100" alt="Gambar">
            </li>
            <li>
                <a href="index.php" class="btn-back">Kembali</a>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
    <br>
    <hr>
    <p align="center">© Raafi</p>
</body>
</html>