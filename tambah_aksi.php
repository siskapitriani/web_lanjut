<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$kode_barang = $_POST['kode_barang'];
$merk = $_POST['merk'];
$seri = $_POST['no_seri_pabrik'];
$spek = $_POST['spesifikasi'];
$jumlah = $_POST['jumlah'];

// menginput data ke database
mysqli_query($koneksi,
    "INSERT INTO barang (kode_barang, merk, no_seri_pabrik, spesifikasi, jumlah) VALUES ('$kode_barang', '$merk', '$seri', '$spek', '$jumlah')");

echo "Data Berhasil Tersimpan";

// mengalihkan halaman kembali ke index.php
header("location:TugasCrud.php");

?>