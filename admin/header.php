<?php 
$koneksi = new mysqli("localhost" , "root" , "" , "it_sport");
session_start();
?>

<?php 
if (!isset($_SESSION['admin'])){
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}
?>

<?php 
$user = $_SESSION['admin']['username'];
$query = $koneksi->query("SELECT * FROM admin WHERE username = '$user'");
$data = $query->fetch_array();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IT SPORT</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <header class="main-header">

    <a href="index.html" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Admin IT Sport</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>          
      <ul class="nav navbar-nav navbar-right">

      </ul>
    </div>
  </nav>
</header>
<aside class="main-sidebar">

  <section class="sidebar">

    <div class="user-panel">
      <div class="pull-left image">
        <img src="login.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $data['nama']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
      <li><a href="index.php?halaman=produk"><i class="fa fa-shopping-basket"></i> <span>Product</span></a></li>
      <li><a href="index.php?halaman=pelanggan"><i class="fa fa-user"></i> <span>Customer</span></a></li>
      <li><a href="index.php?halaman=pembelian"><i class="fa fa-money"></i> <span>Purchase</span></a></li>
      <li><a href="index.php?halaman=komentar"><i class="fa fa-comment"></i> <span>Comment</span></a></li>
      <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>
  </section>
</aside>
</body>
</html>