<?php
include_once './config/db_config.php';

$query = 'SELECT id_alternatif, nama_alternatif, jenis_kelamin, hp, tempat_lahir, tanggal_lahir, year(curdate())-year(tanggal_lahir)as usia FROM alternatif  ORDER BY id_alternatif DESC';
$calon = mysqli_query($koneksi, $query);

 ?>
