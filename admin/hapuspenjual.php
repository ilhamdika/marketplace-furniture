<?php
$ambil = $koneksi->query("SELECT * FROM toko WHERE id_toko='$_GET[id]' ");
$pecah = $ambil->fetch_assoc();
$fototoko = $pecah['foto_toko'];
if (file_exists("../toko/$fototoko")) {
	unlink("../toko/$fototoko");
}
$koneksi->query("SET FOREIGN_KEY_CHECKS=0");
$koneksi->query("DELETE FROM toko WHERE id_toko='$_GET[id]' ");
$koneksi->query("SET FOREIGN_KEY_CHECKS=1");

echo "<script>alert('toko terhapus');</script>";
echo "<script>location='index.php?halaman=penjual';</script>";
