<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</head>
<body>


	<h2 class="text-center">Tambah Produk</h2>

	<?php

	$data = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$_GET[id]'");
	$ubah = $data->fetch_assoc();

	?>



	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label> Nama Produk </label>
			<input type="text" name="nama" class="form-control" value="<?php echo $ubah['nama_produk']?>">
		</div>
		<div class="form-group">
			<label> Harga (Rp) </label>
			<input type="number" name="harga" class="form-control" value="<?php echo $ubah['harga_produk']?>">
		</div>
		<div class="form-group">
			<label> Berat (gram) </label>
			<input type="number" name="berat" class="form-control" value="<?php echo $ubah['berat_produk']?>">
		</div>
		<div class="form-group">
			<label> Stok (buah) </label>
			<input type="number" name="stok" class="form-control" value="<?php echo $ubah['stok_produk']?>">
		</div>
		<div class="form-group">
			<img src="../foto_produk/<?php echo $ubah['foto_produk']?>" width="200" height="150">
		</div>
		<div class="form-group">
			<label> Ganti Foto Produk </label>
			<input type="file" name="foto" class="form-control">
		</div>
		<div class="form-group">
			<label> Deskripsi </label>
			<textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"><?php echo $ubah['deskripsi']?></textarea> 
			<script>
				CKEDITOR.replace( 'deskripsi' );
			</script>
		</div>
		<button class="btn btn-primary" name="ubah"> Ubah </button>
		<a href="index.php?halaman=produk" class="btn btn-warning"> Kembali </a>
	</form>

	<?php 

	if (isset($_POST['ubah'])){
		$nama = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];

		if (!empty($lokasi)){
			move_uploaded_file($lokasi, "../foto_produk/".$nama);

			$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = '$_POST[harga]',
				berat_produk = '$_POST[berat]',stok_produk = '$_POST[stok]', foto_produk = '$nama' ,deskripsi = '$_POST[deskripsi]'
				WHERE id_produk = '$_GET[id]'"); 
		}

		else {
			$koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = '$_POST[harga]',
				berat_produk = '$_POST[berat]',stok_produk = '$_POST[stok]', foto_produk = '$_POST[foto]',deskripsi = '$_POST[deskripsi]'
				WHERE id_produk = '$_GET[id]'"); 

		}

		echo "<br><div class='alert alert-success text-center'> Data berhasil diubah </div>";
		echo "<script>location='index.php?halaman=produk';</script>";
	}
	?>

</body>
</html>