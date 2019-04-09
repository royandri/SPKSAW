<?php
include_once './config/pdo_config.php';
$config = new Config();
$db = $config->getConnection();

include_once './backend/function.php';

$pro = new Rangking($db);
$stmt = $pro->readKhusus();
$stmt1 = $pro->readAllAlternatif();
$stmt2 = $pro->readAllKriteria();

      while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
        $a= $row1['id_alternatif'];
        $stmtr = $pro->readR($a);
        while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
          $b = $rowr['id_kriteria'];
          $tipe = $rowr['tipe_kriteria'];
          $bobot = $rowr['bobot_kriteria'];
          ?>
            <?php
            if($tipe=='benefit'){
              $stmtmax = $pro->readMax($b);
              $maxnr = $stmtmax->fetch(PDO::FETCH_ASSOC);
              $nor = $rowr['nilai_rangking']/$maxnr['mnr1'];
            } else{
              $stmtmin = $pro->readMin($b);
              $minnr = $stmtmin->fetch(PDO::FETCH_ASSOC);
              $nor = $minnr['mnr2']/$rowr['nilai_rangking'];
            }
            $pro->ia = $a;
            $pro->ik = $b;
            $pro->nn2 = $nor;
            $pro->nn3 = $bobot*$nor;
            $pro->normalisasi();
        }
          $stmthasil = $pro->readHasil($a);
          $hasil = $stmthasil->fetch(PDO::FETCH_ASSOC);
          $pro->ia = $a;
          $pro->has = $hasil['bbn'];
          $pro->hasil();
    }
  }
  ?>
