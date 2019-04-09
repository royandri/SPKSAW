<!-- created by: Roy Andri Selasa, 03-07-2018 -->
<?php
include_once '../config/db_config.php';

$id = $_GET['id_alternatif'];
$idk = $_GET['id_kriteria'];

$query = "DELETE FROM rangking WHERE id_alternatif=$id AND id_kriteria = $idk";
$input = mysqli_query($koneksi, $query);
 ?>
