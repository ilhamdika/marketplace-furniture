 <?php
	session_start();
	include "koneksi.php";
	?>
 <!DOCTYPE html>
 <html>

 <head>
 	<?php include "header.php" ?>
 	<title>Toko | Computer OnShop</title>
 </head>

 <body style="background-color: #d3d3d3 ;">
 	<?php include "navbar.php" ?>
 	<?php
		$id_toko = $_GET['id'];
		$ambil = $koneksi->query("SELECT * FROM toko 
 	WHERE toko.id_toko='$id_toko'");
		$pecah = $ambil->fetch_assoc(); ?>
 	<div class="container">
 		<h2 class="center">Profil Toko</h2>

 		<div class="row">
 			<div class="col s1" style="position: relative;">
 				<img src="assets/img/toko/<?php echo $pecah['foto_toko']; ?>" class="circle" height="80" width="80" style="margin-top: 20px; margin-left: 40px;">
 			</div>
 			<div class="col s10" style="margin-top: 10px; position: relative; ">
 				<span class="black-text">
 					<h5 style="margin-left: 100px;"><?php echo $pecah['nama_toko']; ?></h5>
 					<h6 style="margin-left: 100px;"><?php echo 	$pecah['alamat_toko'] ?></h6>
 				</span>
 			</div>
 			<div class="row">
 				<div class="col s6">
 					<br><br>
 					<p>
 						<b>
 							<i class="tiny material-icons">phone</i>telpon : <?php echo $pecah['telepon_toko']; ?><br><br>
 							<i class="tiny material-icons">email</i>email : <?php echo $pecah['email_toko']; ?> <br><br>
 							<i class="tiny material-icons">location_on</i>alamat : <?php echo $pecah['alamat_toko']; ?> <br>
 						</b>
 					</p>
 				</div>
 				<!-- <div class="col s6">
 					<br><br>
 					<p>
 						<br><br>
 						: <?php echo $pecah['email_toko']; ?><br><br>
 						: <?php echo $pecah['alamat_toko']; ?>
 					</p>
 				</div> -->

 				<?php
					$ambil = $koneksi->query("SELECT * FROM produk 
 			LEFT JOIN toko ON produk.id_toko=toko.id_toko
 			WHERE produk.id_toko='$id_toko'");
					while ($detail = $ambil->fetch_assoc()) {
						$data[] = $detail;
					}
					$produk = 0;
					$stok_produk = 0;
					$stok_awal = 0;
					$produk_terjual = 0;
					$total_pembelian = 0;


					if (isset($data)) {
						foreach ($data as $key => $value) : {
								$value['id_toko'] = 1;
								$toko = $value['id_toko'];
								$produk += $toko;

								$stok_produk += $value['stok_produk'];
								$stok_awal += $value['stok_awal'];
								$produk_terjual += $stok_awal - $stok_produk;
								$total_pembelian +=   $value['harga_produk'] * ($value['stok_awal'] - $value['stok_produk']);
							}
						endforeach;
					}

					?>
 				<div class="col s2">
 					<br><br>
 					<p>

 						<b>
 							<i class="tiny material-icons">local_offer</i> Jenis produk <br><br>
 							<i class="tiny material-icons">local_shipping</i> Produk Terjual <br> <br>
 							<i class="tiny material-icons">date_range</i> Bergabung <br>
 						</b>
 					</p>
 				</div>

 				<div class="col s2">
 					<br><br>
 					<p>
 						: <?php if ($produk < 1) : ?>
 							<?php echo "-" ?>
 						<?php else : ?>
 							<?php echo 	$produk ?>
 						<?php endif; ?><br> <br>
 						: <?php if ($produk_terjual < 1) : ?>
 							<?php echo "-" ?>
 						<?php else : ?>
 							<?php echo $produk_terjual; ?>
 						<?php endif; ?><br><br>
 						: <?php echo date("d F Y", strtotime($pecah['bergabung'])); ?>
 					</p>
 				</div>
 			</div>
 		</div>
 		<br>
 		<br>
 		<section id="carousel" class="carousel">
 			<div class="row">
 				<h4>Tentang Toko</h4>
 				<div class="col s12">
 					<h5><?php echo $pecah['nama_toko']; ?></h5>
 					<p style="text-align: justify;"><?php echo 	$pecah['deskripsi_toko']; ?></p>
 					<!-- 					<div class="col s4 m4 l4 xl4"> <i class="tiny material-icons">info_outline</i> </div>
					<div class="col s4 m4 l4 xl4"> <i class="tiny material-icons">library_books</i></div>
					<div class="col s4 m4 l4 xl4"> <i class="tiny material-icons">network_wifi</i> </div> -->
 				</div>
 			</div>
 		</section>

 		<section id="highlights" class="highlights scrollspy">
 			<h1 class="center-align">Produk Terbaru</h1>
 			<div class="row">
 				<?php $ambil = $koneksi->query("SELECT * FROM produk 
					LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori
					WHERE produk.id_toko='$id_toko' "); ?>
 				<?php while ($perproduk = $ambil->fetch_assoc()) { ?>
 					<div class="grid-example col m3 s12">
 						<div class=" responisve-card card hoverable" style="border-radius:30px; background-color: #d3d3d3 ;">
 							<div class="card-image waves-effect waves-block waves-light">
 								<center>
 									<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">
 										<p><strong style="color:black; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $perproduk['nama_produk']; ?></strong>
 										</p>
 									</a>
 									<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">
 										<img class="responsive-img activator" src="assets/img/produk/<?php echo $perproduk['foto_produk']; ?>" style="height: 250px; width: 250px;" id="gambarr"> </a>
 							</div>
 							</center>
 							<div class="card-content">
 								<h6>kategori : <?php echo $perproduk['nama_kategori'] ?> </h6>
 								<p>stok : <?php echo $perproduk['stok_produk'] ?></p>
 								<span class="harga">
 									<h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
 								</span>
 								<hr>
 								<!-- <div class="card-action">
 									<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn waves-effect waves-light left red btn-small ">detail</a>
 									<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn waves-effect waves-light right btn-small">beli</a></span>
 								</div> -->
 							</div>
 						</div>
 					</div>
 				<?php 	} ?>
 			</div>
 		</section>

 	</div>