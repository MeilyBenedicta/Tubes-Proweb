<?php 
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>IT SPORT | Detail </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<section class="content">
		<div class="container">
			<h1>Detail Produk</h1>
			<hr>
			<?php 
			$id_produk = $_GET['id'];
			$ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
			$detail = $ambil->fetch_assoc();
			?>

			<div class="row">
				<div class="col-md-6">
					<img src="foto_produk/<?php echo $detail['foto_produk']; ?>" class="img-responsive">
				</div>
				<div class="col-md-6">
					<h2> <?php echo $detail['nama_produk']; ?> </h2>
					<h3> Rp. <?php echo number_format($detail['harga_produk']); ?> </h3>
					<h5>Stok Produk : <?php echo $detail['stok_produk'] ?></h5>

					<p><?php echo $detail['deskripsi'];?></p>
					<form method="POST">
						<div class="form-group">
							<div class="input-group">
								<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
								<div class="input-group-btn">
									<button class="btn btn-success" name="beli">Beli Sekarang</button>
								</div>
							</div>
						</div>
					</form>
					<?php
					if (isset($_POST['beli'])) {
						$jumlah = $_POST['jumlah'];
						$_SESSION['keranjang'][$id_produk] = $jumlah;

						echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
						echo "<script>location='keranjang.php';</script>";
					}
					?>
					<a href="menu.php" class="btn btn-warning"> Kembali </a>

					<!-- komentar -->
					<form method="POST">
						
						<textarea style="margin-top:20px;" class="form-control" id ="alamat" name="komentar" rows="4" cols="40" placeholder="Masukkan Komentar"></textarea>
						<button style="margin-top:20px;" type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
						<br>

						<br><u style="color:grey"><h3 style="font_size:30px;color:grey;">Ulasan</h3></u></br>
						<?php
						$query = "SELECT * FROM komentar WHERE id_produk='$id_produk'";
						$hasil = mysqli_query($koneksi,$query);
						foreach($hasil as $data){?>
							<b><?php echo $data['nama'].":".$data['komentar'];?></b>
							<?php echo "<br>";?>
						<?php } 
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>



<?php
if(isset($_POST['submit']) AND isset($_SESSION['pelanggan'])){
	$nama=$_SESSION["pelanggan"]["nama_pelanggan"];
	$komentar=$_POST['komentar'];
	$nama_produk=$detail["nama_produk"];
	echo "<script>alert('Komentar berhasil dimasukkan')</script>";
	echo "<script>location='index.php'</script>";
	$query="INSERT INTO komentar(id_komentar,komentar,nama,id_produk,nama_produk)VALUES('','$komentar','$nama','$id_produk','$nama_produk')";
	$hasil=mysqli_query($koneksi,$query);
}?>
</body>
</html>