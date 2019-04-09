
<?php

include_once '../config/db_config.php';

$query = 'SELECT rangking.id_alternatif AS id_al, rangking.id_kriteria AS id_kr, nama_alternatif, nama_kriteria, tipe_kriteria, nilai_rangking from rangking inner join alternatif on alternatif.id_alternatif = rangking.id_alternatif INNER join kriteria on kriteria.id_kriteria  = rangking.id_kriteria order by rangking.id_alternatif DESC';
$nilai = mysqli_query($koneksi, $query);

$no=0;
while ($a = mysqli_fetch_object($nilai)) {
$no= $no+1;
?>
<tr>
<td><?php echo $no; ?></td>
<td hidden><?php echo $a->id_al; ?></td>
<td hidden><?php echo $a->id_kr; ?></td>
<td><?php echo $a->nama_alternatif; ?></td>
<td><?php echo $a->nama_kriteria; ?></td>
<td><?php echo $a->tipe_kriteria; ?></td>
<td><?php echo $a->nilai_rangking; ?></td>
<td>
  <div class="btn-group-horizontal btn-group-sm">
    <a href="javascript:void(0)" class="btn btn-warning btn-sm" onclick="ubahnilai(<?php echo $a->id_al;?>,<?php echo $a->id_kr; ?>)"><i class="fa fa-edit"></i> Ubah</a>
    <a href="javascript:void(0)" class="btn btn-danger btn-sm " id="hapus_nilai" data-id="<?php echo $a->id_al; ?>" data-idkrit="<?php echo $a->id_kr; ?>"><i class="fa fa-trash"></i> Hapus</a>
  </div>
</td>
</tr>
<?php } ?>
