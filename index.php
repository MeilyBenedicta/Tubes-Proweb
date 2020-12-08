<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['pelanggan'])) {
	echo "<script>location='menu.php';</script>";
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
</head>
<body>
	<div class="container">
		<span><img src="itsport.png" ></span>
		<span><button type="button" class="btn btn-danger" onclick="login()">Login</button></span>
	</div>
	<div id="main">
		<div id="d1"></div>
		<div id="d2"></div>
		<div id="d3"></div>
		<div id="d4"></div>
		<div id="d5"></div>
		<div id="d6"></div>
		<div id="d7"></div>
		<div id="d8"></div>
		<div id="d9"></div>
		<div id="d10"></div>
		<div id="d11"></div>
	</div>
	<div id="contain">
		<form class="box" method="POST">
			<h1>Login</h1>
			<hr><br><br>
			<input type="email" placeholder="Email..." name="email" name="email" required>
			<input type="password" placeholder="Password..." name="password" required>
			<button name="login" class="btn btn-success"><b>LOGIN</b></button>
			<br>
			<p>Belum punya akun?<a href="daftar.php">
				<b>Silahkan daftar disini</b></a></p>
			</form>
			<?php
			if (isset($_POST['login'])) {
				$email = $_POST['email'];
				$password = $_POST['password'];
				$password=sha1($password);
				$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan =
					'$email' AND password_pelanggan = '$password'");
				$cocok = $ambil->num_rows;

				if ($cocok == 1) {
					$akun = $ambil->fetch_assoc();

					$_SESSION['pelanggan'] = $akun;
					echo "<div class='alert alert-success text-center'>
					Login Berhasil</div>";
					echo "<meta http-equiv='refresh' content='1,url=menu.php'>";
				}
				else {
					echo "<div class='alert alert-danger text-center'>
					Login Gagal, Periksa kembali akun anda</div>";
				}
			}
			?>
		</div>
		<script>
			function login(){
				TweenMax.to(".container span", 2, {
					opacity: 0,
					y: -60,
					ease: Expo.easeInOut
				})
				TweenMax.to(".container", 2, {
					delay: 1,
					top: "-100%",
					ease: Expo.easeInOut
				})
			}
		</script>
	</body>
	</html>
