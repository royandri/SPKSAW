<?php
include_once '../config/db_config.php';

$id = $_POST['id'];
$sql="SELECT * FROM nilai WHERE id_nilai='$id'";
$response = array();
$query = mysqli_query($koneksi, $sql);
if($query){
  if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_object($query)){
      $response[] = $row;
    }
  }else{
    $response['error'] = 'Data kosong';
  }
}else{
  $response['error'] = mysqli_error();
}
die(json_encode($response));
?>
