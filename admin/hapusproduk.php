 <?php
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
	$fotoproduk = $pecah['foto_produk'];
	if (file_exists("../foto_produk/$fotoproduk")) {
		unlink("../foto_produk/$fotoproduk");
	}
	$koneksi->query("SET FOREIGN_KEY_CHECKS=0");
	$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]' ");
	$koneksi->query("SET FOREIGN_KEY_CHECKS=1");

	echo "<script>alert('produk terhapus');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
	?>

