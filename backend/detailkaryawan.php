<!-- created by: Roy Andri Selasa, 03-07-2018 -->
<?php
include_once '../config/db_config.php';

$id = $_GET['id_alternatif'];
$query = "SELECT * FROM alternatif where id_alternatif='$id'";
$data = mysqli_query($koneksi,$query);
$calon =mysqli_fetch_object($data);
 ?>

<div id="namacalon"><?php echo $calon->nama_alternatif ?></div>
<div id="tempatlahir"><?php echo $calon->tempat_lahir ?></div>
<div id="tanggallahir"><?php echo $calon->tanggal_lahir ?></div>
<div id="agama"><?php echo $calon->agama ?></div>
<div id="jeniskelamin"><?php echo $calon->jenis_kelamin ?></div>
<div id="alamat"><?php echo $calon->alamat ?></div>
<div id="kel"><?php echo $calon->kelurahan ?></div>
<div id="kec"><?php echo $calon->kecamatan ?></div>
<div id="kab"><?php echo $calon->kabupaten ?></div>
<div id="nohp"><?php echo $calon->hp ?></div>
