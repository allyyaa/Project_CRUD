<?php
require 'connection.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $result = mysqli_query($conn, "SELECT * FROM mhs2 WHERE nim = '$nim'");
    $mhs = mysqli_fetch_assoc($result);

    if (!$mhs) {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "NIM tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mhs2 SET nama = '$nama', jk = '$jk', prodi = '$prodi', alamat = '$alamat' WHERE nim = '$nim'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        echo '<script>alert("Data berhasil diupdate!")</script>';
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Halaman Update Data</h2>
    <h3>Update Data Mahasiswa</h3>
    <div class="kotak">
        <form action="updateData.php?nim=<?= $mhs['nim'] ?>" method="POST">
            <table>
                <tr>
                    <td><label for="nim">Nim</label></td>
                    <td><input type="number" id="nim" name="nim" value="<?= $mhs['nim'] ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" id="nama" name="nama" value="<?= $mhs['nama'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="jk">Jenis Kelamin</label></td>
                    <td><input type="text" id="jk" name="jk" value="<?= $mhs['jk'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="prodi">Prodi</label></td>
                    <td><input type="text" id="prodi" name="prodi" value="<?= $mhs['prodi'] ?>" required></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><textarea id="alamat" name="alamat" required><?= $mhs['alamat'] ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
