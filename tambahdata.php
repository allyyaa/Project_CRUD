<?php
require 'connection.php';
if(isset($_POST['submit'])){
	$mhs1=mysqli_query($conn, ("INSERT INTO mhs2 VALUES 
	('".$_POST['nim']."',
	'".$_POST['nama']."',
	'".$_POST['jk']."',
	'".$_POST['prodi']."',
    '".$_POST['alamat']."')"));
	
	if($mhs1){
?>
		<script type="text/javascript">
			alert("Anda Berhasil Menambahkan data!");
			window.location.href="index.php";
		</script>
<?php
	}else{
		echo" Anda Gagal Mendaftar!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Halaman Input Data</h2>
    <h3>Input Data Mahasiswa</h3>
    <div class="kotak">
        <form action="tambahdata.php" method="POST">
            <table>
                <tr>
                    <td><label for="nim">Nim</label></td>
                    <td><input type="number" id="nim" name="nim" placeholder="Masukan Nim" required></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" id="nama" name="nama" placeholder="Masukan Nama" required></td>
                </tr>
                <tr>
                    <td><label for="jk">Jenis Kelamin</label></td>
                    <td><input type="text" id="jk" name="jk" placeholder="Masukan Jenis Kelamin" required></td>
                </tr>
                <tr>
                    <td><label for="prodi">Prodi</label></td>
                    <td><input type="text" id="prodi" name="prodi" placeholder="Masukan Prodi" required></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td><textarea id="alamat" name="alamat" placeholder="Masukan Alamat" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <button type="submit" name="submit">Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>