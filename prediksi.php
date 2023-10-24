<?php 

include 'admin/koneksi.php';
include 'header.php';

if(isset($_POST['prediksi'])){
    $nim = $_POST['nim'];
    $mds = $_POST['mds'];
    $adp = $_POST['adp'];
    $sc = $_POST['sc'];
    $gkdm = $_POST['gkdm'];
    $rpl = $_POST['rpl'];
    $ka = $_POST['ka'];
    $pkdkh = $_POST['pkdkh'];

//naive_bayes
    $totalmm = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='2'")->num_rows;
    $totaljar = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='1'")->num_rows;
    $totalai = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='3'")->num_rows;
    $totalData = $koneksi->query("SELECT * FROM tb_dataset")->num_rows;

// Matematika dan Statistika
    //MM
    $totalalpromm = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='2' and mds= '$mds'")->num_rows;
    //Jaringan
    $totalalprojar = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='1' and mds= '$mds'")->num_rows;
    //AI
    $totalalproai = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='3' and mds= '$mds'")->num_rows;

// Algoritma dan Pemrograman
    //MM
    $totalsimm = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='2' and adp= '$adp'")->num_rows;
    //Jaringan
    $totalsijar = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='1' and adp= '$adp'")->num_rows;
    //AI
    $totalsiai = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='3' and adp= '$adp'")->num_rows;

// Sistem Cerdas
    //MM
    $totalsdmm = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='2' and sc= '$sc'")->num_rows;
    //Jaringan
    $totalsdjar = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='1' and sc= '$sc'")->num_rows;
    //AI
    $totalsdai = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='3' and sc= '$sc'")->num_rows;

// Grafik Komputer dan Mutimedia
    //MM
    $totalsomm = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='2' and gkdm= '$gkdm'")->num_rows;
    //Jaringan
    $totalsojar = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='1' and gkdm= '$gkdm'")->num_rows;
    //AI
    $totalsoai = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='3' and gkdm= '$gkdm'")->num_rows;

// Rekayasa Perangkat Lunak
    //MM
    $totalrdmm = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='2' and rpl= '$rpl'")->num_rows;
    //Jaringan
    $totalrdjar = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='1' and rpl= '$rpl'")->num_rows;
    //AI
    $totalrdai = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='3' and rpl= '$rpl'")->num_rows;

// Komputer Arsitektur
    //MM
    $totalkalkulusmm = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='2' and ka= '$ka'")->num_rows;
    //Jaringan
    $totalkalkulusjar = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='1' and ka= '$ka'")->num_rows;
    //AI
    $totalkalkulusai = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='3' and ka= '$ka'")->num_rows;

// Pembentukan Karakter dan Kecakapan Hidup
    //MM
    $totalstatistikamm = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='2' and pkdkh= '$pkdkh'")->num_rows;
    //Jaringan
    $totalstatistikajar = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='1' and pkdkh= '$pkdkh'")->num_rows;
    //AI
    $totalstatistikaai = $koneksi->query("SELECT * FROM tb_dataset WHERE id_kategori='3' and pkdkh= '$pkdkh'")->num_rows;
  
//PROBABILITY + laplace
    //Matematika dan Statistika
    $PROBalpromm  = (($totalalpromm  + 1) /($totalmm  + 3));
    $PROBalprojar  = (($totalalprojar  + 1) /($totaljar  + 3));
    $PROBalproai  = (($totalalproai  + 1) /($totalai  + 3));

    //Algoritma dan Pemrograman
    $PROBsimm  = (($totalsimm  + 1) /($totalmm  + 3));
    $PROBsijar  = (($totalsijar  + 1) /($totaljar  + 3));
    $PROBsiai  = (($totalsiai  + 1) /($totalai  + 3));

    //Sistem Cerdas
    $PROBsdmm  = (($totalsdmm  + 1) /($totalmm  + 3));
    $PROBsdjar  = (($totalsdjar  + 1) /($totaljar  + 3));
    $PROBsdai  = (($totalsdai  + 1) /($totalai  + 3));

    //Grafik Komputer dan Mutimedia
    $PROBsomm  = (($totalsomm  + 1) /($totalmm  + 3));
    $PROBsojar  = (($totalsojar  + 1) /($totaljar  + 3));
    $PROBsoai  = (($totalsoai  + 1) /($totalai  + 3));

    //Rekayasa Perangkat Lunak
    $PROBrdmm  = (($totalrdmm  + 1) /($totalmm  + 3));
    $PROBrdjar  = (($totalrdjar  + 1) /($totaljar  + 3));
    $PROBrdai  = (($totalrdai  + 1) /($totalai  + 3));

    //Komputer Arsitektur
    $PROBkalkulusmm  = (($totalkalkulusmm  + 1) /($totalmm  + 3));
    $PROBkalkulusjar  = (($totalkalkulusjar  + 1) /($totaljar  + 3));
    $PROBkalkulusai  = (($totalkalkulusai  + 1) /($totalai  + 3));

    //Pembentukan Karakter dan Kecakapan Hidup
    $PROBstatistikamm  = (($totalstatistikamm  + 1) /($totalmm  + 3));
    $PROBstatistikajar  = (($totalstatistikajar  + 1) /($totaljar  + 3));
    $PROBstatistikaai  = (($totalstatistikaai  + 1) /($totalai  + 3));

//prediksi
    //MM
    $multimedia = $PROBalpromm * $PROBsimm * $PROBsdmm * $PROBsomm * $PROBrdmm * $PROBkalkulusmm * $PROBstatistikamm;
    $mm = number_format((float) $multimedia * ($totalmm/$totalData), 13, '.', '');

    //jaringan
    $jaringan = $PROBalprojar * $PROBsijar * $PROBsdjar * $PROBsojar * $PROBrdjar * $PROBkalkulusjar * $PROBstatistikajar;
    $jar = number_format((float) $jaringan * ($totaljar/$totalData), 13, '.', '');

    //ai
    $sistemcerdas = $PROBalproai * $PROBsiai * $PROBsdai * $PROBsoai * $PROBrdai * $PROBkalkulusai * $PROBstatistikaai;
    $ai = number_format((float) $sistemcerdas * ($totalai/$totalData), 13, '.', '');

    // var_dump($mm,$jar,$ai);

//membandingkan
    if($mm >= $jar && $mm >= $ai){
        $prediksi = "2";
        $bobot = $mm;
    }
    elseif($jar >= $mm && $jar >= $ai){
        $prediksi = "1";
        $bobot = $jar;
    }
    else{
        $prediksi = "3";
        $bobot = $ai;
    }

//INSERT
    $sql_dataset = "INSERT INTO tb_dataset VALUES ('','$nim','$mds','$adp','$sc','$gkdm','$rpl','$ka','$pkdkh','$prediksi')";
    if($koneksi->query($sql_dataset)===TRUE){
    $id_dataset = $koneksi->insert_id;
    }else{
    echo $sql_dataset;
    }

    $query=mysqli_query($koneksi, "INSERT INTO tb_hasil VALUES ('','$id_dataset','$ai','$mm','$jar')") or die(mysqli_error($koneksi));

    if($query):
       echo "<script language='javascript'>swal('Selamat...', 'Data Berhasil di input!', 'success');</script>" ;
       echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
     else:
       echo "<script language='javascript'>swal('Oops...', 'Something went wrong!', 'error');</script>" ;
       echo '<meta http-equiv="Refresh" content="0; URL=datatesting.php">';
     endif;   
      header("location:hasil.php");
}

?>

    <div class="container" style="margin-top: 3rem">
        <div class="card" >
            <div class="card-header">PREDIKSI TOPIK KATEGORI SKRIPSI MENGGUNAKAN METODE NAIVE BAYES</div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" class="form-control" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="mds">Matematika dan Statistika</label>
                        <select class="form-control" name="mds">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="adp">Algoritma dan Pemrograman</label>
                        <select class="form-control" name="adp">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="sc">Sistem Cerdas</label>
                        <select class="form-control" name="sc">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="gkdm">Grafik Komputer dan Mutimedia</label>
                        <select class="form-control" name="gkdm">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="rpl">Rekayasa Perangkat Lunak</label>
                        <select class="form-control" name="rpl">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="ka">Komputer Arsitektur</label>
                        <select class="form-control" name="ka">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="pkdkh">Pembentukan Karakter dan Kecakapan Hidup</label>
                        <select class="form-control" name="pkdkh">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="modal-footer" style="margin-top: 1rem;">
                        <button type="submit" name="prediksi" class="btn btn-primary">Lakukan Prediksi</button>
                    </div>
                </form>        
            </div>
        </div>
    </div>