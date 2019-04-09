<?php
include_once './config/db_config.php';

$query = 'SELECT *FROM nilai';
$kriteria = mysqli_query($koneksi, $query);

$query2 = 'SELECT *FROM nilai';
$kriteria2 = mysqli_query($koneksi, $query2);
 ?>
