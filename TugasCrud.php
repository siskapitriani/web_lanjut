<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQL</title>
</head>
<body>

	<h2>CRUD DATA BARANG LABOLATORIUM KOMPUTER</h2>
	<br/>
	<a href="tambah.php">+ TAMBAH BARANG</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>Kode Barang</th>
			<th>Merk</th>
			<th>No Seri Parbrik</th>
			<th>Spesifikasi</th>
            <th>Jumlah</th>
            <th>Action</th>
		</tr>
		<?php
		include 'Koneksi.php';
		$no = 1;
        $data = mysqli_query($koneksi,"SELECT kode_barang, merk, no_seri_pabrik, spesifikasi, jumlah from barang;");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['kode_barang']; ?></td>
				<td><?php echo $d['merk']; ?></td>
				<td><?php echo $d['no_seri_pabrik']; ?></td>
				<td><?php echo $d['spesifikasi']; ?></td>
                <td><?php echo $d['jumlah']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['kode_barang']; ?>">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['kode_barang']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</body>
</html>