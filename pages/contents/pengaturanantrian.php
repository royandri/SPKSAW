<?php
  $hak=$_SESSION['posisi'];
  if ($hak!='admin' && $hak!='pemanggil_antrian') {
    include_once 'dashboard.php';
    exit();
  }
?>
<section class="content-header">
  <?php include_once './backend/panggilantrian.php'; ?>
  <?php include_once './backend/ambilantrian.php'; ?>
  <?php include_once './backend/panggilan.php'; ?>
  <h1>
    Pengaturan
    <small>Antrian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pengaturan Antrian</li>
  </ol>
</section><br>
<section class="content">
  <div class="row">
    <div class="col-md-4">
      <div class="box  box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Status Antrian</h3>
          <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
        </div>
        <br>
        <div class="input-group input-group-sm" >
        </div
        <!-- /.box-header -->
        <div class="box-body" id="status_antrian">
          <?php include_once './backend/ambilstatus.php'; ?>
        </div>
        <!-- /.box-body -->
      </div>
      <div id="keterangan">
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-8">
      <div class="box  box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"> Panggil Antrian</h3>
          <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
        </div>
        <br>
        <div class="input-group input-group-sm" >
        </div>
        <!-- .box-header -->
        <div class="box-body ">
          <div class="row">
            <div class="col-md-6">
              <div class="box  box-primary box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-user"></i> Loket</h3>
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                </div>
                <br>
                <div class="input-group input-group-sm" >
                </div
                <!-- /.box-header -->
                <div class="box-body" id="loket">
                  <h1 align="center"><b>BP Umum</b></h1><br><br>
                </div>
                <!-- /.box-body -->
              </div>


              <form class="" action="#" method="post">
                <input type="hidden" id="inputan" name="nilai" value="<?php echo $display;?>">
                <div id="tombolantrian">
                  <?php
                  include_once 'config/db_config.php';
                  $nxt = $display+1;
                  $qry = "SELECT id_berobat, no_antrian FROM pasien_berobat WHERE tanggal_berobat = CURRENT_DATE() AND no_antrian=$nxt";
                  $ambildata = mysqli_query($koneksi, $qry);
                  if(mysqli_num_rows($ambildata) > 0){
                    ?>
                    <button type="submit" id="ulang"  class="btn btn-primary" name="ulg"><i class="fa fa-angle-double-up"></i> Ulang</button>
                    <button type="submit" id="sebelum"  class="btn btn-success" value="Sebelumnya" name="sebelumnya"><i class="fa fa-angle-double-down"></i> Sebelumnya</button>
                    <button type="submit" id="selanjut" class="btn btn-warning" value="Selanjutnya" name="selanjutnya"><i class="fa  fa-angle-double-right"></i> Selanjutnya</button>
                    <?php
                  }else {
                    ?>
                    <button type="submit" id="ulang"  class="btn btn-primary" name="ulg"><i class="fa fa-angle-double-up"></i> Ulang</button>
                    <button type="submit" id="sebelum"  class="btn btn-success" value="Sebelumnya" name="sebelumnya"><i class="fa fa-angle-double-down"></i> Sebelumnya</button>
                    <button type="submit" id="selanjut" disabled class="btn btn-warning" value="Selanjutnya" name="selanjutnya"><i class="fa  fa-angle-double-right"></i> Selanjutnya</button>
                    <script type="text/javascript">
                    $(document).ready(function(){
                      $("#keterangan").load("backend/ket.php");
                    })
                    </script>
                    <?php
                  }
                   ?>
                </div>
                <!-- <input type="submit" class="btn" name="btn" value="Sebelumnya"> -->
                <!-- <input type="submit" class="btn" name="btn" value="Selanjutnya"> -->
                <?php
             	  $tmp=explode(' ',$kalimatTerbilang);
             	  ?>
                <?php
                if($display=='0'){
                  ?>
                  <script>
                  $(document).ready(function(){
                  $("#ulang").prop( "disabled", false );
                  $("#sebelum").prop( "disabled", true );
                  $("#selanjut").prop( "disabled", true );
                  $("#keterangan").load("backend/ket.php");
                });
                </script>
                  <?php
                }else {
                  ?>
                  <!-- <script>
                  $(document).ready(function(){
                    $("#ulang").prop( "disabled", false );
                    $("#sebelum").prop( "disabled", false );
                    $("#selanjut").prop( "disabled", false );
                    $("#keterangan").load("backend/ket2.php");
                  });
                  </script> -->
                  <?php
                }

                 ?>
                 <?php include_once './backend/cekulang.php'; ?>
              </form>
            </div>
            <audio id="audioplayer" autoplay>
              <source src="<?php if($display!='0'){echo "assets/audio/opening.mp3";}?>">
            </audio>
            <div class="col-md-6">
              <div class="box  box-danger box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-share"></i> Nomor Antrian</h3>
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                </div>
                <br>
                <div class="input-group input-group-sm" >
                </div
                <!-- /.box-header -->
                <div class="box-body" id="noantrian">
                  <h1 align="center" style="font-size:100px;"><b><?php echo $display;?></b></h1>
                  <hr>
                  <marquee direction="left">
                <h3>
                <?php
                  if($display=='0')
                  echo "Tidak ada antrian";
                  else
                  echo " Antrian ke ".$kalimatTerbilang.""; ?></h3>
                </marquee>
                <br><br>
                </div>
                <!-- /.box-body -->
              </div>
            </div>

          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<script type="text/javascript">
    var songs = ["assets/audio/nomor_antrian.mp3",<?php
    foreach ($tmp as $antri){
      if($antri!='')
		echo "\"assets/audio/".$antri.".mp3\",";
  }?>"assets/audio/ending.mp3"];
      var ln=songs.length;
      var i=0;
      var audio = document.getElementById("audioplayer");
      audio.addEventListener("ended", function() {
          var getAudio = this.getAttribute("src");
          var getPos = songs.indexOf(getAudio);
          if(i<ln){
          audio.src =songs[i];
          i++;
          audio.play();
        }
      });
  </script>
<script>
$(document).ready(function(){
  $(document).on('click', '#mulai', function(e){
    $.ajax({
      url : "./backend/mulaiantrian.php?",
      dataType: "html",
      success: function () {
          swal("Sukses!", "Antrian berhasil dijalankan", "success");
          $("#status_antrian").load("./backend/ambilstatus.php");
      },
      error: function (xhr, ajaxOptions, thrownError) {
          swal("Gagal!", "Antrian gagal dijalankan", "error");
      }
    });
  });
  $(document).on('click', '#tutup', function(e){
    $.ajax({
      url : "./backend/tutupantrian.php?",
      dataType: "html",
      success: function () {
          swal("Sukses!", "Antrian berhasil dihentikan", "success");
          $("#status_antrian").load("./backend/ambilstatus.php");
      },
      error: function (xhr, ajaxOptions, thrownError) {
          swal("Gagal!", "Antrian gagal dihentikan", "error");
      }
    });
  });
  $(document).on('click', '#refr', function(e){
    $.ajax({
      url : "./backend/refreshstatus.php?",
      dataType: "html",
      success: function () {
          $("#tombolantrian").load("./backend/refantrian.php");
      },
      error: function (xhr, ajaxOptions, thrownError) {
          swal("Gagal!", "Refresh status gagal !", "error");
      }
    });
  });
  $(document).on('click', '#reset', function(e){
    swal({
          title: "Reset antrian?",
          text: "Anda yakin akan mengatur ulang antrian?",
          type: "warning",
          showCancelButton: true,
          cancelButtonText: "Batal",
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Reset",
          closeOnConfirm: false
      }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
          url : "./backend/resetantrian.php?",
          dataType: "html",
          success: function () {
            swal("Sukses!", "Antrian berhasil diatur ulang", "success");
            $("#status_antrian").load("./backend/ambilstatus.php");
            location.reload();
          },
          error: function (xhr, ajaxOptions, thrownError) {
            swal("Gagal!", "Antrian gagal diatur ulang", "error");
          }
        });
      });
  });
});
</script>
