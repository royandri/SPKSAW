<!-- created by: Roy Andri Selasa, 03-07-2018 -->
<?php
include_once '../config/db_config.php';

$id = $_GET['id_alternatif'];
$query = "DELETE FROM alternatif WHERE id_alternatif='$id'";
$input = mysqli_query($koneksi, $query);
 ?>
