	<!--navbar-->
<nav class="navbar navbar-default">
	<div class="container">
	<ul class="nav navbar-nav">
		<li><a href="index.php">Home</a></li>
		<li><a href="keranjang.php">Keranjang</a></li>
		<!--jika sudah login-->
		<?php if(isset($_SESSION["pelanggan"])):?>
		<li><a href="logout.php">Logout</a></li>
			<!--selain itu-->
		<?php else: ?>
		<li><a href="login.php">Login</a></li>
		<?php endif ?>
		<li><a href="daftar.php">Daftar</a></li>
		<li><a href="checkout.php">Checkout</a></li>
	</ul>
	</div>
</nav>