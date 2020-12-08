<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>
<body>

	<h2 class="text-center">Tambah Produk</h2>

	<?php
	if (isset($_POST['save'])){
		$nama = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, '../foto_produk/'.$nama);
		$koneksi->query("INSERT INTO produk(nama_produk,harga_produk,berat_produk,stok_produk,foto_produk,deskripsi) 
			VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[stok]','$nama','$_POST[deskripsi]')");

		echo "<br><div class='alert alert-success text-center'> Data berhasil disimpan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
	}
	?>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="Nama"> Nama </label>
			<input type="text" name="nama" class="form-control">
		</div>
		<div class="form-group">
			<label for="Harga"> Harga (Rp) </label>
			<input type="number" name="harga" class="form-control">
		</div>
		<div class="form-group">
			<label for="Berat"> Berat (gram) </label>
			<input type="number" name="berat" class="form-control">
		</div>
		<div class="form-group">
			<label for="Berat"> Stok (buah) </label>
			<input type="number" name="stok" class="form-control">
		</div>
		<div class="form-group">
			<label for="Deskripsi"> Deskripsi </label>
			<textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"></textarea> 
			<script>
				CKEDITOR.replace( 'deskripsi' );
			</script>
		</div>
		<div class="form-group">
			<label for="Foto"> Foto </label>
			<input type="file" name="foto" class="form-control">
		</div>
		<button class="btn btn-primary" name="save"> Simpan </button>
		<a href="index.php?halaman=produk" class="btn btn-warning"> Kembali </a>
	</form>
</body>
</html>