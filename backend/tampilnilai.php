<?php
include_once './config/db_config.php';

$query = 'SELECT rangking.id_alternatif AS id_al, rangking.id_kriteria AS id_kr, nama_alternatif, nama_kriteria, tipe_kriteria, nilai_rangking from rangking inner join alternatif on alternatif.id_alternatif = rangking.id_alternatif INNER join kriteria on kriteria.id_kriteria  = rangking.id_kriteria order by rangking.id_alternatif DESC';
$nilai = mysqli_query($koneksi, $query);
 ?>
