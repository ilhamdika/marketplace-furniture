<!DOCTYPE html>
<html>

<head>
    <?php include "header.php" ?>
    <title>Semua Produk | Jepara Furniture Comumunity</title>
</head>

<body>
    <?php

    use Mpdf\Tag\A;

    include "koneksi.php";
    include "navbar.php";
    include "header.php";


    ?>
    <!-- <br><br> -->
    <?php include "search.php" ?>

    <section id="highlights" class="highlights scrollspy" style="background-color: #d3d3d3 ;">
        <div class="container">

            <br><br>
            <h3 class="center-align">Daftar Produk</h3>


            <div class="row">
                <?php $ambil = $koneksi->query("SELECT * FROM produk 
			JOIN kategori ON produk.id_kategori=kategori.id_kategori
			JOIN toko ON produk.id_toko=toko.id_toko
			ORDER BY id_produk DESC
			"); ?>
                <?php while ($perproduk = $ambil->fetch_assoc()) { ?>

                    <div class="grid-example col m3 s12" style="background-color: #d3d3d3 ;">
                        <div class=" responisve-card card hoverable" style="border-radius:30px; background-color: #d3d3d3 ;">
                            <div class="card-image waves-effect waves-block waves-light">
                                <center>
                                    <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">
                                        <p><strong style="color:black; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $perproduk['nama_produk']; ?></strong></p>
                                    </a>
                                    <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">
                                        <img class="responsive-img activator" src="assets/img/produk/<?php echo $perproduk['foto_produk']; ?>" style="height: 250px; width: 250px;" id="gambarr">
                                    </a>
                            </div>
                            </center>
                            <div class="card-content">
                                <h6><b><a href="toko.php?id=<?php echo $perproduk['id_toko'] ?>"><?php echo $perproduk['nama_toko']; ?></a></b></h6>
                                <h6>Kategori: <?php echo $perproduk['nama_kategori'] ?> </h6>
                                <p>Stok: <?php if ($perproduk['stok_produk'] < 1) : ?>
                                        <?php echo     'habis'; ?>
                                    <?php else : ?>
                                        <?php echo $perproduk['stok_produk'] ?>
                                    <?php endif; ?>

                                </p>
                                <span class="harga">
                                    <h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
                                </span>
                                <hr>
                                <!-- <div class="card-action">
                                <?php if ($perproduk['stok_produk'] < 1) : ?>
                                    <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn waves-effect waves-light left red btn-small  disabled">Detail</a>
                                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn waves-effect waves-light right btn-small disabled">beli</a></span>
                                <?php else : ?>
                                    <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn waves-effect waves-light left red btn-small ">Detail</a>
                                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn waves-effect waves-light right btn-small">Beli</a></span>
                                <?php endif; ?>
                            </div>
 -->
                            </div>

                        </div>
                    </div>
                <?php     } ?>
            </div>
        </div>
    </section>
</body>