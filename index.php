<?php
require 'functions.php';

$ieu = query("SELECT * FROM siswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP Dasar</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<h1>Data Siswa</h1>
<hr>

<a href="tambahdata.php" class="btn">Tambah Data Siswa</a>
<br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $ieu as $row ) : ?>
        <tr>
            <td><?=$i ?></td>
            <td><?=$row["nama"]; ?></td>
            <td><?=$row["nis"]; ?></td>
            <td><?=$row["jk"]; ?></td>
            <td><?=$row["kelas"]; ?></td>
            <td><?=$row["jurusan"]; ?></td>
            <td><?=$row["email"]; ?></td>
            <td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
            <td>
                <a href="ubah.php?no=<?=$row["no"]; ?>">Ubah</a>
                /
                <a href="hapus.php?no=<?=$row["no"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
    <br><br>
    <br>
    <hr>
    <p align="center">© Raafi</p>
</body>
</html>