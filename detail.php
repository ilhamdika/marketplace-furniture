<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php
// mendapatkan id produk dari url
$id_produk = $_GET["id"];

// query ambil data

$ambil = $koneksi->query("SELECT * FROM produk 
	LEFT JOIN toko ON produk.id_toko=toko.id_toko 
	WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
if (isset($_SESSION['pelanggan'])) {
	if ($_SESSION['pelanggan']['id_pelanggan'] == $detail['id_toko']) {
		echo "<script>alert('Tidak dapat membeli produk sendiri');</script>";
		echo "<script>location='index.php';</script>";
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<?php include "header.php" ?>
	<title>Detail | Jepara furniture Community</title>
</head>

<body style="background-color: #d3d3d3 ;">
	<!--Navbar-->
	<?php include "navbar.php" ?>
	<div class="container">
		<h1 class="center-align" style="font-size:30px; font-weight: bold;">Detail Produk</h1>
		<div class="row">
			<div class="grid-example col m6 s12" style="margin-right: 70px;">
				<!-- <div class="col s6 m6 l6 xl6">
					<div class="carousel carousel-slider" style="height: 400px; width: 400px;">
						<a class="carousel-item" href="#one!"><img src="assets/img/produk/<?php echo $detail['foto_produk']; ?>" style="height: 400px; width: 400px;" id="gambarr">></a>
						<a class="carousel-item" href="#two!"><img src="assets/img/homepage/b.jpeg"></a>
						<a class="carousel-item" href="#tree!"><img src="assets/img/homepage/h.jpeg"></a>
					</div>
				</div> -->

				<img class="responsive-img activator" src="assets/img/produk/<?php echo $detail['foto_produk']; ?>" style="height: 400px; width: 400px;" id="gambarr">



			</div>
			<div class="grid-example col m4 s12">
				<h5><?php echo $detail['nama_produk']; ?></h5>
				<h6>Rp.<?php echo number_format($detail['harga_produk']); ?></h6>
				<h7>Stok : <?php echo $detail['stok_produk']; ?></h7>
				<h6>Jenis: <?php echo $detail['jenis_produk'] ?></h6>
				<h6>Bahan: <?php echo $detail['bahan'] ?></h6>
				<h6>Sistem order: <?php echo $detail['jenis_order'] ?></h6>
				<h6>Dimensi: <?php echo $detail['berat_produk'] ?></h6>
				<div class="row">
					<form class="col s12" method="post">
						<div class="row">
							<div class="input-field col s6">
								<input placeholder="Jumlah" min="1" max="<?php echo $detail["stok_produk"]; ?>" type="number" class="form-control" name="jumlah" required>

							</div>
							<div class="input-field col s6">
								<button class="btn" name="beli" style="border-radius:50px;">beli</button>
							</div>
							<div class="input-field col s6">

							</div>
							<div class="col">

								<h4 style="font-size: 20px; ">Untuk pengirimannya silahkan<h4 style="font-weight: bold;">Hubungi kami</h4>
								</h4>
								<a href="https://wa.me/<?php echo	$detail["telepon_toko"]; ?>?text=Saya%20pelanggan%20dari%20Jepara%20Furniture%20Community">
									<img src="assets/img/homepage/wa.png" style="max-height: 70px;, float: right;">
								</a>
							</div>
						</div>

						<h5>
							<a href="toko.php?id=<?php echo $detail['id_toko'] ?>" style="color: black;">
								<?php echo $detail['nama_toko'] ?></b></a>
						</h5>
						<a href="toko.php?id=<?php echo $detail['id_toko'] ?>">Kunjungi Toko</a>
						<br>
						<!-- <h6><b>Detail Produk :</b></h6>

						<h6><?php echo $detail['deskripsi_produk'] ?></h6> -->

					</form>

				</div>
				<?php
				if (isset($_POST["beli"])) {
					// mendapatkan id produk yang kita beli
					$jumlah = $_POST["jumlah"];
					// masukkan di keranjang belanja
					$_SESSION["keranjang"][$id_produk] = $jumlah;

					echo "<script>alert('produk telah masuk ke keranjang')</script>";
					echo "<script>location='keranjang.php';</script>";
				}
				?>
			</div>
		</div>
	</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h4>Deskripsi Produk</h4>
				<h6><?php echo $detail['deskripsi_produk'] ?></h6>
			</div>


</body>
<!-- footer -->
<!-- <?php include "footer.php"; ?> -->

</html>