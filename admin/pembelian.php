<h2 class="text-center">Data Pembelian</h2>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th> No. </th>
			<th> Nama Pelanggan </th>
			<th> Tanggal Pembelian </th>
			<th> Total </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan"); ?>
		<?php while ($data = $ambil->fetch_assoc()) { ?>
			<tr>
				<td> <?php echo $nomor; ?> </td>
				<td> <?php echo $data['nama_pelanggan']; ?> </td>
				<td> <?php echo $data['tanggal_pembelian']; ?> </td>
				<td> Rp. <?php echo number_format($data['total_pembelian']); ?> </td>
				<td> 
					<a href="index.php?halaman=detail&id=<?php echo $data['id_pembelian']; ?>" class="btn btn-success"> Detail </a>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>