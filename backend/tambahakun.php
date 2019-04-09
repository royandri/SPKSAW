<?php
include_once './config/db_config.php';


if(isset($_POST['tambah_akun'])){

  $namalengkap = $_POST['namalengkap'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hak_akses = $_POST['hakakses'];
  $newPass = md5($password);

  $cekusername = "SELECT username from pengguna where username = '$username'";
  $prosescek = mysqli_query($koneksi, $cekusername);
  if(mysqli_num_rows($prosescek) > 0){
    ?>
    <script type="text/javascript">
     swal({
       title: "",
       text: "Username <?php echo $username?> sudah digunakan",
       type: "error",
       confirmWarningText: "Oke"
     },
     function () {
       window.location='?p=pengaturanakun#';
     });
   </script>
    <?php
  }else{
    $query = "INSERT INTO pengguna (nama_lengkap, username, password, level) VALUES ('".$namalengkap."','".$username."','".$newPass."','".$hak_akses."')";
    $input = mysqli_query($koneksi, $query);

    if($input){
      ?>
       <script type="text/javascript">
        swal({
          title: "Berhasil",
          text: "User berhasil ditambahkan",
          type: "success",
          confirmButtonText: "Oke",
        },
        function () {
          $("#dataakun").load("./backend/refreshdataakun.php");
          $('#tambah_akun').hide(500);
        });
        // function(){
        //   window.location="?p=datapasien#";
        // });
      </script>
       <?php
    }else {
      ?>
       <script type="text/javascript">
        swal({
          title: "",
          text: "Pendaftaran Gagal",
          type: "error",
          confirmWarningText: "Oke"
        },
        function () {
          window.location='?p=pengaturanakun#';
        });
      </script>
      <?php
    }
  }
}
?>
