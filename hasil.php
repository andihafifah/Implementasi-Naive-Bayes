<?php 

include 'admin/koneksi.php';
include 'header.php';

?>

<div class="container" style="margin-top: 3rem">
        <div class="card" >
            <div class="card-header">HASIL PREDIKSI NAIVE BAYES</div>
            <div class="card-body">
                <table class="table table-bordered" style="text-align: center;">
                    <thead class="table">
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">No</th>
                            <th rowspan="2" style="vertical-align: middle;">Nim</th>
                            <th colspan="3">Nilai</th>
                            <th rowspan="2" style="vertical-align: middle;">Prediksi</th>
                        </tr>
                        <tr>
                            <th>Jaringan</th>
                            <th>Multimedia</th>
                            <th>Sistem Cerdas</th>
                        </tr>
                    </thead>
                    <?php 
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM tb_hasil INNER JOIN tb_dataset ON tb_hasil.id_dataset=tb_dataset.id_dataset order by id_hasil desc limit 1");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nim'] ?></td>
                            <td><?= $d['bobot_jar'] ?></td>
                            <td><?= $d['bobot_mm'] ?></td>
                            <td><?= $d['bobot_ai'] ?></td>
                            <?php 
                            if($d['bobot_jar'] > $d['bobot_mm'] && $d['bobot_jar'] > $d['bobot_ai']){
                                $prediksi = "Jaringan";
                            ?>
                            <td><a href="jaringan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><?= $prediksi ?></a></td>
                            <?php 
                            }elseif($d['bobot_mm'] > $d['bobot_jar'] && $d['bobot_mm'] > $d['bobot_ai']){
                                $prediksi = "Multimedia";
                            ?>
                            <td><a href="multimedia.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><?= $prediksi ?></a></td>
                            <?php
                            }else{
                                $prediksi = "Sistem Cerdas";
                            ?>
                            <td><a href="sistem-cerdas.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><?= $prediksi ?></a></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>       
            </div>
        </div>
    </div>