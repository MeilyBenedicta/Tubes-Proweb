<?php include "header.php"; ?>
<div class="content-wrapper">
  <section class="content container-fluid">
    <?php 
    if (isset($_GET['halaman'])){
      if($_GET['halaman'] == "produk"){
        include'produk.php';
      }
      elseif ($_GET['halaman'] == "pelanggan"){
        include 'pelanggan.php';
      }
      elseif ($_GET['halaman'] == "hapus_produk"){
        include 'hapus_pelanggan.php';
      }
      elseif ($_GET['halaman'] == "pembelian"){
        include 'pembelian.php';
      }
      elseif ($_GET['halaman'] == "komentar"){
        include 'komentar.php';
      }
      elseif ($_GET['halaman'] == "detail"){
        include 'detail.php';
      }
      elseif ($_GET['halaman'] == "tambah_produk"){
        include 'tambah_produk.php';
      }
      elseif ($_GET['halaman'] == "hapus_produk"){
        include 'hapus_produk.php';
      }
      elseif ($_GET['halaman'] == "ubah_produk"){
        include 'ubah_produk.php';
      }
      elseif ($_GET['halaman'] == "logout"){
        include 'logout.php';
      }
    }
    else {
      include 'home.php';
    }
    ?>
  </section>
</div>

<?php include "footer.php";?>

</div>
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>