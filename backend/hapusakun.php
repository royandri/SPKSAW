<?php
include_once '../config/db_config.php';

$id_login = $_GET['id_login'];
$query = "DELETE FROM pengguna WHERE id_pengguna='$id_login'";
$input = mysqli_query($koneksi, $query);
 ?>
