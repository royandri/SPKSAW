<?php
include_once '../config/db_config.php';

$idlogin = $_GET['id_login'];
$query = "SELECT * FROM pengguna where id_pengguna='$idlogin'";
$data = mysqli_query($koneksi,$query);
$login =mysqli_fetch_object($data);
 ?>

<div id="id_login"><?php echo $idlogin ?></div>
<div id="namalengkap"><?php echo $login->nama_lengkap ?></div>
<div id="username"><?php echo $login->username ?></div>
<div id="password"><?php echo $login->password ?></div>
<div id="hak_akses"><?php echo $login->level ?></div>
