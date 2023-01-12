<?php
//koneksi ke database
session_start();
include "koneksi.php";
include "header.php";
?>
<!DOCTYPE html>
<link rel="stylesheet" href="css/style.css">
<html>
<header>
	<title>Jepara Furniture Community</title>
</header>

<body style="border-radius:30px; background-color: #d3d3d3 ;">
	<!-- NAVBAR -->
	<?php include "navbar.php"; ?>
	<!-- SLIDER -->
	<?php include "slider.php" ?>
	<!-- SEARCHING -->
	<?php include "search.php" ?>





	<!-- highlights -->
	<?php include "produk.php" ?>

	<?php include "gambar.php" ?>

	<?php include "slider2.php" ?>

	<!-- ABOUT ME -->
	<?php include "about.php" ?>




	</div>

	<!--JavaScript at end of body for optimized loading-->
	<script>
		// alert('Welcome to my page');
		// var lagi = true;

		// while (lagi){
		// 	var nama = prompt('Masukkan nama :');
		// 	alert('Hello, ' + nama);

		// 	lagi = confirm ('coba lagi?');

		// } 
		// alert('terima kasih...');

		const sidenav = document.querySelectorAll('.sidenav');
		M.Sidenav.init(sidenav);

		const slider = document.querySelectorAll('.slider');
		M.Slider.init(slider, {
			indicators: false,
			height: 500,
			transition: 600,
			interval: 3000,
		});

		const parallax = document.querySelectorAll('.parallax');
		M.Parallax.init(parallax);

		const materialbox = document.querySelectorAll('.materialboxed');
		M.Materialbox.init(materialbox);

		const scroll = document.querySelectorAll('.scrollspy');
		M.ScrollSpy.init(scroll);
	</script>
</body>

</html>