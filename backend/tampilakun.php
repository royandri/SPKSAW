<?php
include_once './config/db_config.php';

$query = 'SELECT * FROM pengguna ORDER BY id_pengguna DESC';
$akun = mysqli_query($koneksi, $query);

 ?>
