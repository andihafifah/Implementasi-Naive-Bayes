<?php 

include 'admin/koneksi.php';
include 'header.php';

?>

<div class="container" style="margin-top: 3rem;">
    <div class="card">
        <div class="card-header">DATA DENGAN KATEGORI JARINGAN</div>
        <div class="card-body">
            <table class="table">
                    <thead class="table">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Judul Skripsi</th>
                    </thead>
                    <?php
                    $kategori = mysqli_query($koneksi, "SELECT * FROM tb_judul INNER JOIN tb_kategori ON tb_judul.id_kategori=tb_kategori.id_kategori WHERE tb_kategori.nama_kategori = 'Jaringan'")
                    ?>
                    <?php $i = 1; ?>
                    <?php foreach($kategori as $k) : ?>
                    <tbody>
                        <td><?= $i ?></td>
                        <td><?= $k["nama_kategori"] ?></td>
                        <td><?= $k["nama_judul"] ?></td>
                    </tbody>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </table>
        </div>
    </div>
</div>