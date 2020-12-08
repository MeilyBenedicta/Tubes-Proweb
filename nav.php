<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-lg bg-warning">
		<div class="container bg-dark">
			<ul class="nav navbar-nav">
				<li><a href="menu.php"><b>HOME</b></a></li>
				<li><a href="keranjang.php"><b>KERANJANG</b></a></li>
				<li><a href="checkout.php"><b>CHECKOUT</b></a></li>
				<?php if (isset($_SESSION['pelanggan'])): ?>
					<li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin logout?')"><b>LOGOUT</b></a></li>
					<?php else: ?>

					<?php endif ?>
				</ul>
				<form action="pencarian.php" method="GET" class="navbar-form navbar-right">
					<input type="text" name="keyword" class="form-control">
					<button type="submit" class="btn btn-primary">Search</button>
					
				</form>
			</div>
		</nav>
	</body>
	</html>
