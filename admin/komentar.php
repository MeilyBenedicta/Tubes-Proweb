<h2 class="text-center">Komentar</h2>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th> No. </th>
			<th> Nama Pelanggan </th>
			<th> Nama Produk </th>
			<th> Komentar </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM komentar "); ?>
		<?php while ($data = $ambil->fetch_assoc()) { ?>
			<tr>
				<td> <?php echo $nomor; ?> </td>
				<td> <?php echo $data['nama']; ?> </td>
				<td> <?php echo $data['nama_produk']; ?> </td>
				<td> <?php echo $data['komentar']; ?> </td>
				
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
