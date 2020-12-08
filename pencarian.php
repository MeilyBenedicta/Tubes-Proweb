<?php include "koneksi.php";?>

<?php
$keyword = $_GET["keyword"];
$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'");
while($data = $ambil->fetch_assoc())
{
	$semuadata[]=$data;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<h3>Hasil Pencarian : <?php echo $keyword ?></h3>
		<?php if (empty($semuadata)): ?>
			<div class="alert alert-danger">Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
		<?php endif ?> 
		<div class="row">
			<?php foreach ($semuadata as $key => $data): ?>
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $data['foto_produk'] ?>" alt="" class="img-responsive" height="300" width="300">
						<div class="caption text-center">
							<h4><?php echo $data['nama_produk'] ?></h4>
							<h5>Rp. <?php echo number_format($data['harga_produk']) ?></h5>
							<a href="beli.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-success"> Beli Sekarang </a>
							<a href="detail.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-primary"> Detail Produk </a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</body>
</html>


