<?php
session_start();
include 'koneksi.php';
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
	echo "<script>alert('Keranjang kosong, Ayo belanja');</script>";
	echo "<script>location='menu.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>IT SPORT | Keranjang</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<section class="content">
		<div class="container">
			<h1>Keranjang Belanja</h1>
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Produk</th>
						<th class="text-center">Harga</th>
						<th class="text-center">Jumlah</th>
						<th class="text-center">Subharga</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
						<?php 
						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
						$data = $ambil->fetch_assoc();
						$subharga = $data['harga_produk'] * $jumlah;
						?>
						<tr>
							<td> <?php echo $nomor; ?> </td>
							<td> <?php echo $data['nama_produk']; ?> </td>
							<td> Rp. <?php echo number_format($data['harga_produk']); ?> </td>
							<td> <?php echo $jumlah; ?> </td>
							<td> Rp. <?php echo $subharga; ?></td>
							<td>
								<a href="hapus_keranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-xs"
									onclick="return confirm('Menghapus produk dari keranjang?')">Hapus</a>
								</td>
							</tr>
							<?php $nomor++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="menu.php" class="btn btn-default">Lanjut Belanja</a>
				<a href="checkout.php" class="btn btn-success">Checkout</a>
			</div>
		</section>
	</body>
	</html>