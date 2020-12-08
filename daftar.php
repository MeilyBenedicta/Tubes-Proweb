<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>IT SPORT | Daftar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="sasa.css">
</head>
<body>
	<div id="con" style="margin-top: 10px">
		<div class="row">
			<div class="col-sm-6">
				<div class="left-column">
					<h1 style="margin-top: 200px">IT SPORT<hr>Your Sports Need</h1>
				</div></div>
				<div class="container">
					<div class="col-sm-6">
						<div class="right-column">
							<div class="box">
								<div class="panel-body">
									<b><h2 style="color: white">SignUp</b></h2><hr>
									<form method="POST" class="form-horizontal">
										<div class="form-group">
											<label class="col-md-3 control-label">Nama</label>
											<div class="col-md-6">
												<input type="text" name="nama" class="form-control" placeholder="Nama" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Email</label>
											<div class="col-md-6">
												<input type="email" name="email" class="form-control" placeholder="Email" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Password</label>
											<div class="col-md-6">
												<input type="password" name="pass1" class="form-control" placeholder="Password" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Konfirmasi Password</label>
											<div class="col-md-6">
												<input type="password" name="pass2" class="form-control" placeholder="Konfirmasi Password" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Alamat</label>
											<div class="col-md-6">
												<textarea name="alamat" rows="2" class="form-control" style="resize: none;" placeholder="Alamat" required></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Telepon</label>
											<div class="col-md-6">
												<input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-6 col-md-offset-3">
												<button class="btn btn-success btn-block btn-lg" name="daftar">
													Daftar
												</button>
											</div>
										</div>
									</div>
								</form>
								<?php
								if (isset($_POST['daftar'])) {
									$nama = $_POST['nama'];
									$email = $_POST['email'];
									$pass1 = $_POST['pass1'];
									$pass2 = $_POST['pass2'];
									$alamat = $_POST['alamat'];
									$telepon = $_POST['telepon'];

									$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
									$cocok = $ambil->num_rows;

									if ($cocok == 1) {
										echo "<script>alert('Email sudah digunakan');</script>";
										echo "<script>location='daftar.php';</script>";
									}
									elseif ($pass1 != $pass2) {
										echo "<script>alert('Password tidak cocok');</script>";
										echo "<script>location='daftar.php';</script>";
									}
									else {
										$pass1=sha1($pass1);
										$koneksi->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES
											('$email', '$pass1', '$nama', '$telepon', '$alamat')");
										
										echo "<script>alert('Pendaftaran Berhasil');</script>";
										echo "<script>location='index.php';</script>";
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>