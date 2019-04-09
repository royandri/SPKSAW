<!-- created by: Roy Andri Selasa, 03-07-2018 -->
<?php
include_once './config/db_config.php';

if(isset($_POST['ubah_nilai2'])){
  $idaltern = $_POST['alter2'];
  $kriteri = $_POST['kriter2'];
  $keter = $_POST['ketnilai2'];
  $jumnil = $_POST['jumnilai2'];

  $query = "UPDATE rangking SET nilai_rangking=$jumnil, ket_nilai='$keter' where id_alternatif = $idaltern AND id_kriteria = $kriteri ";
  $input = mysqli_query($koneksi, $query);
  if($input){
    ?>
     <script type="text/javascript">
      swal({
        title: "Data dirubah",
        text: "Data nilai calon karyawan berhasil diubah",
        type: "success",
        confirmButtonText: "Oke",
      },
      function () {
        $("#datacalon").load("./backend/refreshdatanilai.php");
        $('#ubah_nilai').hide(350);
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
        window.location='?p=nilai#';
      });
    </script>
    <?php
  }
}
?>
