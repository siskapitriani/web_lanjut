<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP dan MySQL</title>
</head>
<body>

<h2>CRUD DATA BARANG</h2>
<br/>
<a href="TugasCrud.php">KEMBALI</a>
<br/>
<br/>
<h3>TAMBAH DATA MAHASISWA</h3>
<form method="post" action="tambah_aksi.php">
    <table>
        <tr>
            <td>Kode Barang</td>
            <td><input type="text" name="kode barang"></td>
        </tr>
        <tr>
            <td>Merk</td>
            <td><input type="text" name="merk"></td>
        </tr>
        <tr>
            <td>No Seri Parbrik</td>
            <td><input type="text" name="no seri pabrik"></td>
        </tr>
        <tr>
            <td>Spesifikasi</td>
            <td><input type="text" name="spesifikasi"></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="number" name="jumlah"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="SIMPAN"></td>
        </tr>
    </table>
</form>
</body>
</html>