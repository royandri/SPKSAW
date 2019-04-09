<!-- created by: Roy Andri Jumat, 22-06-2018 -->
<?php
include_once './config/db_config.php';


if(isset($_POST['tambah_karyawan'])){
  $nama = $_POST['namacalon'];
  $tempatlahir = $_POST['tempatlahir'];
  $tanggallahir = $_POST['tanggallahir'];
  $agama = $_POST['agmz'];
  $kelamin = $_POST['kelamin'];
  $alamat = $_POST['alamat'];
  $kel = $_POST['kel'];
  $kec = $_POST['kec'];
  $kab = $_POST['kab'];
  $hp = $_POST['hp'];
  $query = "INSERT INTO alternatif (nama_alternatif, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, alamat, kelurahan, kecamatan, kabupaten, hp) VALUES ('".$nama."','".$tempatlahir."','".$tanggallahir."','".$agama."','".$kelamin."','".$alamat."','".$kel."','".$kec."','".$kab."','".$hp."')";
  $input = mysqli_query($koneksi, $query);

  if($input){
    ?>
     <script type="text/javascript">
      swal({
        title: "Sukses",
        text: "Data calon karyawan berhasil disimpan",
        type: "success",
        confirmButtonText: "Oke",
      },
      function () {
        $("#datacalon").load("./backend/refreshdatacalon.php");
        $('#tambah_karyawan').hide(350);
      });
    </script>
     <?php
  }else {
    ?>
     <script type="text/javascript">
      swal({
        title: "",
        text: "Data calon karyawan gagal disimpan",
        type: "error",
        confirmWarningText: "Oke"
      },
      function () {
        window.location='?p=datapasien#';
      });
    </script>
    <?php
  }
}
?>
