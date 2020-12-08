<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['pelanggan'])) {
	echo "<script>alert('Silahkan login dulu');</script>";
	echo "<script>location='login.php';</script>";
}
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
	echo "<script>alert('Keranjang kosong, Ayo belanja');</script>";
	echo "<script>location='menu.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>IT SPORT | Checkout</title>
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
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
					<?php $total_belanja = 0; ?>
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
						</tr>
						<?php $nomor++; ?>
						<?php $total_belanja += $subharga; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<th class="text-center"colspan="4">Total</th>
					<th class="text-center">Rp <?php echo number_format($total_belanja); ?> </th>
				</tfoot>
			</table>
			<form method="POST">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly class="form-control text-center" 
							value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly class="form-control text-center" 
							value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<select name="id_ongkir" class="form-control">
								<option value="">-- Tujuan Pengiriman --</option>
								<?php
								$ambil = $koneksi->query("SELECT * FROM ongkir");
								while ($perongkir = $ambil->fetch_assoc()) {
									?>
									<option value="<?php echo $perongkir['id_ongkir']; ?>">
										<?php echo $perongkir['kota']; ?> -
										Rp. <?php echo number_format($perongkir['tarif']); ?>
									</option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Alamat Pengiriman</label>
					<textarea name="alamat_pengiriman" rows="2" class="form-control" 
					style="resize: none;" placeholder="Masukkan Alamat"></textarea>
				</div>
				<div class="form-group">
					<label>Kode Pos</label>
					<textarea name="kode_pos" rows="2" class="form-control" 
					style="resize: none;" placeholder="Masukkan kode pos"></textarea>
				</div>
				<button class="btn btn-success" name="checkout">Checkout</button>
			</form>
			<?php 
			if (isset($_POST['checkout'])) {
				$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
				$id_ongkir = $_POST['id_ongkir'];
				$tanggal_pembelian = date("d",time());
				$alamat_pengiriman = $_POST['alamat_pengiriman'];
				$kode_pos = $_POST['kode_pos'];

				$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
				$ongkir = $ambil->fetch_assoc();
				$kota = $ongkir['kota'];
				$tarif = $ongkir['tarif'];

				$total_pembelian = $total_belanja + $tarif;

				$koneksi->query("INSERT INTO pembelian(id_pelanggan, id_ongkir, tanggal_pembelian,
					total_pembelian, kota, tarif, alamat_pengiriman, kode_pos) VALUES('$id_pelanggan', 
					'$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$kota', '$tarif',
					'$alamat_pengiriman', '$kode_pos')");

				$id_pembelian_barusan = $koneksi->insert_id;

				foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
					$perproduk = $ambil->fetch_assoc();

					$nama = $perproduk['nama_produk'];
					$harga = $perproduk['harga_produk'];
					$subharga = $perproduk['harga_produk'] * $jumlah;

					$koneksi->query("INSERT INTO pembelian_produk(id_pembelian, id_produk, jumlah, nama, 
						harga, subharga)VALUES('$id_pembelian_barusan', '$id_produk', '$jumlah', '$nama',
						'$harga', '$subharga')");	

					//update stok
					$koneksi->query("UPDATE produk SET stok_produk =stok_produk - $jumlah WHERE id_produk='$id_produk'");
				}

				unset($_SESSION['keranjang']);

				echo "<script>alert('Pembelian Sukses');</script>";
				echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
			}
			?>
			
		</div>
	</section>
</body>
</html>