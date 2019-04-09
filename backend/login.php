<?php
//membuka Session
session_start();

if(isset($_SESSION['sudah_login'])){
  ?>
  <script type="text/javascript">
    window.location='../admin/index.php';
  </script>
  <?php
}else {
  include_once '../config/db_config.php';

  $username ="";
  $password ="";
  $posisi ="";

  if(isset($_POST['login'])){
    $cekPassword ="";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM pengguna WHERE username='".$username."'";
    $hasil = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($hasil)>0){
      while ($data=mysqli_fetch_assoc($hasil)) {
        $id_login = $data['id_pengguna'];
        $cekPassword = $data['password'];
        $posisi = $data['level'];
      }
    $testPassword = MD5($password);
    // menguji apakah nilai variabel testPassword sama dengan nilai variabel cekPassword
    if($cekPassword == $testPassword){

      $_SESSION['id_login'] = $id_login;
      $_SESSION['username'] = $username;
      $_SESSION['posisi'] = $posisi;
      $_SESSION['sudah_login'] = true;
      ?>
      <script type="text/javascript">
      swal({
                      title: "",
                      text: "Selamat Datang <?php echo $username ?>!",
                      type: "success",
                      confirmWarningText: "Oke"
                  },
                  function () {
                      window.location='../index.php';
                  });
      </script>
<?php
}else {
  //jika tidak sesuai
  ?>
  <script type="text/javascript">
    swal("Password salah","Silahkan periksa kembali password anda","error");
  </script>
  <?php
}

}else {
  //jika hasil kurang dari nol, peringatan
  ?>
  <script type="text/javascript">
  swal("Username tidak ditemukan","Silahkan periksa kembali username anda","error");
  </script>
  <?php
      }
  }

} //else isset sudah login
 ?>
