<!-- created by: Roy Andri Jumat, 22-06-2018 -->
<?php
include_once './config/db_config.php';


if(isset($_POST['tambah_nilai'])){
  $idalter = $_POST['namaalternatif'];
  $idkriteria = $_POST['kriteria'];
  $idnilai = $_POST['idnilai'];
  $ketnilai = $_POST['ketnilai'];
  $jumnilai = $_POST['jumnilai'];


  $cekdata = "SELECT id_alternatif, id_kriteria from rangking where id_alternatif = $idalter and id_kriteria = $idkriteria";
  $prosescek = mysqli_query($koneksi, $cekdata);
  if(mysqli_num_rows($prosescek) > 0){
    ?>
    <script type="text/javascript">
     swal({
       title: "",
       text: "Data nilai sudah ada",
       type: "error",
       confirmWarningText: "Oke"
     },
     function () {
       window.location='?p=nilai#';
     });
   </script>
    <?php
  }else{
    $query = "INSERT INTO rangking (id_alternatif, id_kriteria, nilai_rangking, ket_nilai) VALUES ($idalter, $idkriteria, $jumnilai,'$ketnilai')";
    $input = mysqli_query($koneksi, $query);

    ?>
    <script type="text/javascript">
      alter(<?php echo $idalter ?>);
    </script>
    <?php
    if($input){
      ?>
       <script type="text/javascript">
        swal({
          title: "Berhasil",
          text: "Data nilai berhasil ditambahkan",
          type: "success",
          confirmButtonText: "Oke",
        },
        function () {
          $("#datanilai").load("./backend/refreshdatanilai.php");
          $('#tambah_nilai').hide(500);
        });

      </script>
       <?php
    }else {
      ?>
       <script type="text/javascript">
        swal({
          title: "",
          text: "Nilai gagal ditambahkan",
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
}
?>
