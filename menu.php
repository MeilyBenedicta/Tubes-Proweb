<?php
session_start();
include 'koneksi.php';
?>

<?php 
if (!isset($_SESSION['pelanggan'])){
	echo "<script>location='index.php';</script>";
	header('location:index.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>IT SPORT | Beranda</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body style="background-image: url(back3.jpg)">

	<?php include 'nav.php'; ?>
	<section class="content">
		<div class="container">
			<h1><b><i>Produk Terbaru</b></i></h1><hr><br>
			<?php
			if (isset($_GET['halaman']) && $_GET['halaman']!="") {
				$halaman = $_GET['halaman'];
			}else{
				$halaman = 1;
			}

			$limit=6;

			if ($halaman>1) {
            //range data yang ditampilkan 
				$offset=($halaman*$limit)-$limit;
			}else $offset=0;

			$sebelumnya = $halaman-1;
			$selanjutnya=$halaman+1;

			$query = mysqli_query($koneksi,"SELECT * FROM produk");
			$jlh_data=mysqli_num_rows($query);

          //menghitung jumlah halaman
			$jlh_halaman=ceil($jlh_data/$limit);
			$hal_akhir = $jlh_halaman;

			$query2="SELECT * FROM produk LIMIT $offset, $limit";
			$hasil2= mysqli_query($koneksi, $query2); ?>
			
			<div class="row">
				<?php while ($data = $hasil2->fetch_assoc()) { ?>
					<div class="col-md-4">
						<div class="thumbnail">
							<img src="foto_produk/<?php echo $data['foto_produk']; ?>" class="img-responsive" height="300" width="300">
							<div class="caption text-center">
								<h4><?php echo $data['nama_produk']; ?></h4>
								<h5>Rp <?php echo number_format($data['harga_produk']);?></h5>
								<a href="beli.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-success"> Beli Sekarang </a>
								<a href="detail.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-primary"> Detail Produk </a>
							</div>
						</div>
					</div>
				<?php }  ?>

				<div class="">
					<center>
						<?php
						for($i=1;$i<=$jlh_halaman;$i++){?>
							<button type="submit" class="btn btn-warning"><?php echo"<a href=?halaman=".$i.">";
							echo $i;
							echo"</a>";
						}
						?></button>
					</center>

				</div>
			</section>
		</body>
		</html>