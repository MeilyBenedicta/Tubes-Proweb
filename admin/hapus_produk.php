<?php 

$data = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$_GET[id]'");
$hapus = $data->fetch_assoc();
$foto_produk = $hapus['foto_produk'];

if (file_exists("../foto_produk/$foto_produk")){
	unlink("../foto_produk/$foto_produk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk ='$_GET[id]'");
echo "<script>alert('produk terhapus');</script>";
echo "<script> location='index.php?halaman=produk'; </script>";

?>