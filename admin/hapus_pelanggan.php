<?php 

$data = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan ='$_GET[id]'");
$hapus = $data->fetch_assoc();

$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan ='$_GET[id]'");
echo "<script>alert('Data Pelanggan Terhapus');</script>";
echo "<script> location='index.php?halaman=produk'; </script>";

?>