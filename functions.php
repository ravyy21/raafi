<?php

$conn = mysqli_connect("localhost", "root", "", "datasiswa3");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $jk = htmlspecialchars($data["jk"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);

    // Handle upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Query untuk menambahkan data
    $query = "INSERT INTO siswa (nama, nis, jk, kelas, jurusan, email, gambar)
              VALUES ('$nama', '$nis', '$jk', '$kelas', '$jurusan', '$email', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFiles = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFiles);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    // Buat nama file unik
    $namaFilesBaru = uniqid() . '.' . $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFilesBaru);

    return $namaFilesBaru;
}

function hapus($no) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE no = $no");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    // Pastikan 'no' ada di dalam data
    $no = $data["no"];
    if (empty($no)) {
        return false;  // Jika 'no' kosong, tidak lanjutkan
    }

    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $jk = htmlspecialchars($data["jk"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);

    // Cek apakah user mengupload gambar baru
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = htmlspecialchars($data["gambarLama"]);
    } else {
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }

    // Query untuk mengubah data
    $query = "UPDATE siswa SET
              nama = '$nama', 
              nis = '$nis', 
              jk = '$jk', 
              kelas = '$kelas', 
              jurusan = '$jurusan', 
              email = '$email', 
              gambar = '$gambar'
              WHERE no = $no";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>