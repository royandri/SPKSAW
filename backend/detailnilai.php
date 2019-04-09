<!-- created by: Roy Andri Selasa, 03-07-2018 -->
<?php
include_once '../config/db_config.php';

$ida = $_GET['id_alternatif'];
$idkr = $_GET['id_kriteria'];
$query = "SELECT rangking.id_alternatif AS id_al, rangking.id_kriteria AS id_kr, nama_alternatif, nama_kriteria, tipe_kriteria, nilai_rangking, bobot_kriteria, ket_nilai from rangking inner join alternatif on alternatif.id_alternatif = rangking.id_alternatif INNER join kriteria on kriteria.id_kriteria  = rangking.id_kriteria where rangking.id_alternatif = $ida AND rangking.id_kriteria = $idkr";
$data = mysqli_query($koneksi,$query);

$nilai =mysqli_fetch_object($data);
 ?>
<div id="namaalternatif2"><?php echo $nilai->nama_alternatif ?></div>
<div id="kriteria2"><?php echo $nilai->nama_kriteria ?></div>
<div id="alter2"><?php echo $nilai->id_al ?></div>
<div id="kriter2"><?php echo $nilai->id_kr?></div>
<div id="ketnilai2"><?php echo $nilai->ket_nilai ?></div>
<div id="jumnilai2"><?php echo $nilai->nilai_rangking ?></div>
