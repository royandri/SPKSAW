<!-- created by: Roy Andri Selasa, 05-07-2018 -->
<?php

include_once '../config/db_config.php';

$query = 'SELECT * FROM pengguna ORDER BY id_pengguna DESC';
$akun = mysqli_query($koneksi, $query);

$no=0;
while ($a = mysqli_fetch_object($akun)) {
$no= $no+1;
?>
<tr>
<td><?php echo $no; ?></td>
<td hidden><?php echo $a->id_pengguna; ?></td>
<td><?php echo $a->nama_lengkap; ?></td>
<td><?php echo $a->username;  ?></td>
<td><?php echo $a->password; ?></td>
<td><?php echo $a->level;  ?></td>
<td>
  <div class="btn-group-horizontal btn-group-sm">
    <input type="hidden" name="idlogin" value="<?php echo $a->id_pengguna;?>">
    <a href="javascript:void(0)" class="btn btn-warning btn-sm" onclick="ubahakun(<?php echo "'$a->id_pengguna'"; ?>)"><i class="fa fa-edit"></i> Ubah</a>
    <a href="javascript:void(0)" class="btn btn-danger btn-sm " id="hapus_akun" data-id="<?php echo $a->id_pengguna; ?>"><i class="fa fa-trash"></i> Hapus</a>
  </div>

</td>
</tr>
<?php } ?>
