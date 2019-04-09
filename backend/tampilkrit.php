<?php
include_once './config/db_config.php';

$query = 'SELECT *FROM kriteria';
$krit = mysqli_query($koneksi, $query);
 ?>
