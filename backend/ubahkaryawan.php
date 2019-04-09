<!-- created by: Roy Andri Selasa, 03-07-2018 -->
<?php
include_once './config/db_config.php';

if(isset($_POST['ubah_calon2'])){
  $id2 = $_POST['idcalon2'];
  $nama2 = $_POST['namacalon2'];
  $tempatlahir2 = $_POST['tempatlahir2'];
  $tanggallahir2 = $_POST['tanggallahir2'];
  $agama2 = $_POST['agama2'];
  $kelamin2 = $_POST['jeniskelamin2'];
  $alamat2 = $_POST['alamat2'];
  $kel2 = $_POST['kel2'];
  $kec2 = $_POST['kec2'];
  $kab2 = $_POST['kab2'];
  $hp2 = $_POST['nohp2'];

?>
<script>
  alert(<?php echo $nama2 ?>);
</script>
<?php

  $query = "UPDATE alternatif SET nama_alternatif='$nama2',tempat_lahir='$tempatlahir2',tanggal_lahir='$tanggallahir2',agama='$agama2',jenis_kelamin='$kelamin2',alamat='$alamat2',kelurahan='$kel2',kecamatan='$kec2',kabupaten='$kab2', hp='$hp2' where id_alternatif = '$id2'";
  $input = mysqli_query($koneksi, $query);
  if($input){
    ?>
     <script type="text/javascript">
      swal({
        title: "Data dirubah",
        text: "Data calon karyawan berhasil diubah",
        type: "success",
        confirmButtonText: "Oke",
      },
      function () {
        $("#datacalon").load("./backend/refreshdatacalon.php");
        $('#tambah_calon').hide(350);
      });
    </script>
     <?php
  }else {
    ?>
     <script type="text/javascript">
      swal({
        title: "Maaf",
        text: "Data calon karyawan gagal diubah",
        type: "error",
        confirmWarningText: "Oke"
      },
      function () {
        window.location='?p=karyawan#';
      });
    </script>
    <?php
  }
}
?>
