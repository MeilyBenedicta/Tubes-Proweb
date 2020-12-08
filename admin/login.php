<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "it_sport");

if (isset($_SESSION['admin'])) {
  echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IT SPORT | Admin Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="amdin/login.php"><b>Admin IT Sport</b> </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan melakukan login terlebih dahulu</p>

      <form method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="user">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" class="btn btn-success btn-block btn-flat" name="login">Login</button>
          </div>
        </div>
      </form>
      <?php
      if(isset($_POST['login'])){
        $data = mysqli_query($koneksi,"SELECT * FROM admin WHERE username ='$_POST[user]' AND 
          password = '$_POST[pass]'");
        $cocok = mysqli_num_rows($data);
        if ($cocok==1){
          $_SESSION['admin'] = mysqli_fetch_array($data);
          echo "<br><div class='alert alert-success'> Login Sukses</div>";
          echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        }
        else {
          echo "<br><div class='alert alert-danger'> Login Gagal</div>";
          echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        }
      }
      ?>
    </div>
  </div>
</script>
</body>
</html>
