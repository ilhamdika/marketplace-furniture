<!-- 		<?php

				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
				$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
				$pecah = $ambil->fetch_assoc(); ?>
 -->

<!-- NAVBAR -->
<div class="navbar" style="background-color: white; font-style:bold; ">
	<nav>
		<div class="container">
			<div class="nav-wrapper" style="color:black;">
				<a href="index.php" class="brand-logo left"><img src="assets/img/homepage/logo2.png" class="logo"></a>
				<a href="#" data-target="mobile-nav" class="right sidenav-trigger"><i class="material-icons">menu</i></a>

				<ul id="nav-mobile" class="right hide-on-med-and-down" style="color: black;">
					<li>
						<a href="checkout.php" style="color: black;">Checkout</a>
					</li>

					<!-- Jika sudah login ada session penjual-->
					<?php if (isset($_SESSION['pelanggan'])) : ?>
						<li>
							<a ass="nav-link" tabindex="-1" aria-disabled="true" href="penjual/index.php" name="jual" style="color: black;">Jual</a>
						</li>

						<!-- Selain itu (belom login || belom ada session penjual) -->
					<?php else : ?>
						<li>
							<a href="daftar.php" ass="nav-link" tabindex="-1" aria-disabled="true" style="background-color: green; border-radius: 20px; margin-top:1px; color: black;">Mendaftar</a>
						</li>
					<?php endif ?>
					<!-- Jika sudah login ada session pelanggan-->
					<?php if (isset($_SESSION['pelanggan'])) : ?>
						<li>
							<a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true" style="background-color:red;">Logout</a>
						</li>
						<!-- Selain itu (belom login || belom ada session pelanggan) -->
					<?php else : ?>
						<li>
							<a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true" style="background-color: blue; border-radius: 20px; margin-top:1px; color: black;">Login</a>
						</li>
					<?php endif ?>

				</ul>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li>
						<a href="katalog.php" style="color: black;">Semua Produk</a>
					</li>

					<li>
						<a href="riwayat.php" style="color: black;">Riwayat Belanja</a>
					</li>

					<li>
						<a href="keranjang.php">
							<script src="https://cdn.lordicon.com/lusqsztk.js"></script>
							<lord-icon src="https://cdn.lordicon.com/slkvcfos.json" trigger="loop-on-hover" colors="primary:#121331,secondary:#000000" stroke="100" style="width:50px;height:50px; margin-top:9px;">
							</lord-icon>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>

<!-- Sidenav -->
<ul class="sidenav" id="mobile-nav">
	<li>
		<a class="nav-link" href="keranjang.php"><i class="material-icons">shopping_cart</i>Keranjang</a>
	</li>
	<li>
		<a class="nav-link" href="riwayat.php"><i class="material-icons">assignment</i>Riwayat Belanja</a>
	</li>
	<li>
		<a class="nav-link" href="checkout.php"><i class="material-icons">payment</i>Checkout</a>
	</li>
	<li>
		<a class="nav-link" href="penjual/index.php"><i class="material-icons">store_mall_directory</i>Jual</a>
	</li>
	<!-- Jika sudah login ada session pelanggan-->
	<?php if (isset($_SESSION['pelanggan'])) : ?>
		<li class="nav-item">
			<a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true"><i class="material-icons">exit_to_app</i>Logout</a>
		</li>
		<!-- Selain itu (belom login || belom ada session pelanggan) -->
	<?php else : ?>
		<li class="nav-item">
			<a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true"><i class="material-icons">assignment</i>Login</a>
		</li>
	<?php endif ?>
</ul>