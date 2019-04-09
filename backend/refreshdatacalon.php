<!-- created by: Roy Andri Selasa, 03-07-2018 -->
<?php

include_once '../config/db_config.php';

$query = 'SELECT id_alternatif, nama_alternatif, jenis_kelamin, hp, tempat_lahir, tanggal_lahir, year(curdate())-year(tanggal_lahir)as usia FROM alternatif  ORDER BY id_alternatif DESC';
$calon = mysqli_query($koneksi, $query);


$no=0;
while ($a = mysqli_fetch_object($calon)) {
$no= $no+1;
?>
<tr>
  <td><?php echo $no; ?></td>
  <td hidden><?php echo $a->id_alternatif; ?></td>
  <td><?php echo $a->nama_alternatif; ?></td>
  <td><?php echo $a->jenis_kelamin; ?></td>
  <td><?php echo $a->tempat_lahir; ?></td>
  <td><?php echo $a->tanggal_lahir; ?></td>
  <td><?php echo $a->usia; ?></td>
<td>
  <div class="btn-group-horizontal btn-group-sm">
    <input type="hidden" name="norm" value="<?php echo $a->no_rm;?>">
    <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="detailkaryawan(<?php echo "'$a->id_alternatif'"; ?>)"><i class="fa fa-eye"></i> Detail</a>
    <a href="javascript:void(0)" class="btn btn-warning btn-sm" onclick="ubahkaryawan(<?php echo "'$a->id_alternatif'"; ?>)"><i class="fa fa-edit"></i> Ubah</a>
    <a href="javascript:void(0)" class="btn btn-danger btn-sm " id="hapus_karyawan" data-id="<?php echo $a->id_alternatif; ?>"><i class="fa fa-trash"></i> Hapus</a>
  </div>
</td>
</tr>
<?php } ?>
