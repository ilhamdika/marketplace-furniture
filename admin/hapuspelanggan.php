 <?php
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]' ");
	$pecah = $ambil->fetch_assoc();
	$fotopelanggan = $pecah['foto_pelanggan'];
	if (file_exists("../pelanggan/$fotopelanggan")) {
		unlink("../pelanggan/$fotopelanggan");
	}

	$koneksi->query("SET FOREIGN_KEY_CHECKS=0");
	$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]' ");
	$koneksi->query("SET FOREIGN_KEY_CHECKS=1");

	echo "<script>alert('pelanggan terhapus');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
	?>

