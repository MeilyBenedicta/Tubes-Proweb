<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>IT SPORT | Nota</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<section class="content">
		<div class="container">
			<h2>Nota Pembelian</h2>
			<?php 
			$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
				ON pembelian.id_pelanggan = pelanggan.id_pelanggan
				WHERE pembelian.id_pembelian = '$_GET[id]'");
			$detail = $ambil->fetch_assoc();
			?>

			<div class="row">
				<div class="col-md-4">
					<h3>Pembelian</h3>
					<table>
						<tr>
							<td>No. Pembelian</td>
							<td>  :  </td>
							<td><?php echo $detail['id_pembelian'];?></td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td>  :  </td>
							<td><?php echo $detail['tanggal_pembelian'];?></td>
						</tr>
						<tr>
							<td>Total</td>
							<td>  :  </td>
							<td><?php echo number_format($detail['total_pembelian']);?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-4">
					<h3>Pelanggan</h3>
					<table>
						<tr>
							<td>Nama</td>
							<td>  :  </td>
							<td><?php echo $detail['nama_pelanggan'];?></td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>  :  </td>
							<td><?php echo $detail['telepon_pelanggan'];?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>  :  </td>
							<td><?php echo $detail['email_pelanggan'];?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-4">
					<h3>Pengiriman</h3>
					<table>
						<tr>
							<td>Kota</td>
							<td>  :  </td>
							<td><?php echo $detail['kota'];?></td>
						</tr>
						<tr>
							<td>Ongkir</td>
							<td>  :  </td>
							<td><?php echo $detail['tarif'];?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>  :  </td>
							<td><?php echo $detail['alamat_pengiriman'];?></td>
						</tr>
						<tr>
							<td>Kode Pos</td>
							<td>  :  </td>
							<td><?php echo $detail['kode_pos'];?></td>
						</tr>
					</table>
				</div>
			</div>
			<br><br>
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th class="text-center"> No. </th>
						<th class="text-center"> Nama Produk </th>
						<th class="text-center"> Harga Produk </th>
						<th class="text-center"> Jumlah </th>
						<th class="text-center"> Subharga </th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
					
					<?php while ($data = $ambil->fetch_assoc()) { ?>
						<tr>
							<td> <?php echo $nomor; ?> </td>
							<td> <?php echo $data['nama']; ?> </td>
							<td> Rp. <?php echo number_format($data['harga']); ?> </td>
							<td> <?php echo $data['jumlah']; ?> </td>
							<td> Rp. <?php echo number_format($data['subharga']); ?> </td>
						</tr>
						<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table> 
			<div class="row">
				<div class="col-md-6 alert alert-success">
					<p>Silahkan lakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?>
					ke <br>
					<strong>Bank Mandiri 005-246800-1000 AN. KELOMPOK5</strong>
				</p>
			</div>
		</div>
	</div>
</section>

<script>
	window.print();
</script>
</body>
</html>