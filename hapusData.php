<?php
require 'connection.php';
$nim = $_GET['nim'];
$sql = "DELETE FROM mhs2 WHERE nim ='$nim'";
if(mysqli_query($conn, $sql)){
    header("Location: index.php");
    echo'<script>alert("Data berhasil dihapus!")</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}