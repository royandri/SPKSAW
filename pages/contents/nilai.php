
<?php
  $hak=$_SESSION['posisi'];
  if ($hak!='Administrator') {
    include_once 'dashboard.php';
    exit();
  }
?>
  <section class="content-header">
  <h1>
    Data
    <small>Nilai</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Nilai</li>
  </ol>
</section>
<br>
<section class="content">
  <!-- form tambah data -->
  <div class="row" id="tambah_nilai" style="display: none;">
    <div class="col-xs-12">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Tambah Nilai</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" id="remove"><i class="fa fa-times"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="" action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <br>
                <div class="form-group row">
                  <div class="col-sm-3">
                    Nama Alternatif
                  </div>
                  <div class="col-sm-9">
                    <select class="form-control" id="namaalternatif" name="namaalternatif">
                      <option>Nama Alternatif</option>
                      <?php
                      include_once './backend/tampilcalon.php';
                      while ($alternatif = mysqli_fetch_object($calon)) {
                      ?>
                      <option value="<?php echo $alternatif->id_alternatif ?>"><?php echo $alternatif->nama_alternatif ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    Kriteria
                  </div>
                  <div class="col-sm-9">
                    <select class="form-control" id="kriteria" name="kriteria">
                      <option>Kriteria</option>
                      <?php
                      include_once './backend/tampilkrit.php';
                      while ($krite = mysqli_fetch_object($krit)) {
                      ?>
                      <option value="<?php echo $krite->id_kriteria ?>"><?php echo $krite->nama_kriteria ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    ID Nilai
                  </div>
                  <div class="col-sm-3">
                    <input type="teks" name="idnilai" id="idnilai"  value="" class="form-control" placeholder="ID Nilai" required="true">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    Keterangan
                  </div>
                  <div class="col-sm-5">
                    <input type="teks" name="ketnilai" id="ketnilai" readonly value="" class="form-control" placeholder="Keterangan" required="true">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    Jumlah Bobot
                  </div>
                  <div class="col-sm-3">
                    <input type="teks" name="jumnilai" id="jumnilai" readonly value=""  class="form-control" placeholder="Jumlah Bobot" required="true">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box-body table-responsive">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th colspan="3" class="text-center">Data Nilai</th>
                      </tr>
                      <tr>
                        <th scope="col">ID Nilai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Jumlah Bobot</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include_once './backend/tampilkriteria.php';
                      while ($b = mysqli_fetch_object($kriteria)) {
                      ?>
                      <tr>
                        <th><?php echo $b->id_nilai; ?></th>
                        <th><?php echo $b->ket_nilai; ?></th>
                        <th><?php echo $b->jum_nilai; ?></th>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-8 col-md-push-4">
                  <button type="submit" class="btn btn-primary" name="tambah_nilai" >
                    <i class="fa fa-save"></i> Simpan
                  </button>
                  <button type="reset" class="btn btn-danger" id="batal" name="batal">
                    <i class="fa fa-times"></i> Batal
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- akhir form tambah data -->
  <!-- form ubah nilai -->
  <div class="row" id="ubah_nilai" style="display: none;">
    <div class="col-xs-12">
      <div class="box box-warning box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Ubah Karyawan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" id="remove3"><i class="fa fa-times"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="" action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <br>
                <div class="form-group row">
                  <div class="col-sm-3">
                    Nama Alternatif
                  </div>
                  <div class="col-sm-9">
                    <input type="teks" name="namaalternatif2" id="namaalternatif2" readonly value="" class="form-control" placeholder="Keterangan" required="true">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    Kriteria
                  </div>
                  <div class="col-sm-9">
                    <input type="teks" name="kriteria2" id="kriteria2"  value="" readonly class="form-control" placeholder="Keterangan" required="true">
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <div class="col-sm-3">
                    ID Alternatif
                  </div>
                  <div class="col-sm-3">
                    <input type="teks" name="alter2" id="alter2"  value="" class="form-control" placeholder="ID Nilai" required="true">
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <div class="col-sm-3">
                    ID Kriteria
                  </div>
                  <div class="col-sm-3">
                    <input type="teks" name="kriter2" id="kriter2"  value="" class="form-control" placeholder="ID Nilai" required="true">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    ID Nilai
                  </div>
                  <div class="col-sm-3">
                    <input type="teks" name="idnilai2" id="idnilai2"  value="" class="form-control" placeholder="ID Nilai" required="true">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    Keterangan
                  </div>
                  <div class="col-sm-5">
                    <input type="teks" name="ketnilai2" id="ketnilai2"  value="" class="form-control" placeholder="Keterangan" required="true">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    Jumlah Bobot
                  </div>
                  <div class="col-sm-3">
                    <input type="teks" name="jumnilai2" id="jumnilai2"  value=""  class="form-control" placeholder="Jumlah Bobot" required="true">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box-body table-responsive">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th colspan="3" class="text-center">Data Nilai</th>
                      </tr>
                      <tr>
                        <th scope="col">ID Nilai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Jumlah Bobot</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include_once './backend/tampilkriteria.php';
                      while ($nilai = mysqli_fetch_object($kriteria2)) {
                      ?>
                      <tr>
                        <th><?php echo $nilai->id_nilai; ?></th>
                        <th><?php echo $nilai->ket_nilai; ?></th>
                        <th><?php echo $nilai->jum_nilai; ?></th>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-8 col-md-push-4">
                  <button type="submit" class="btn btn-primary" id="" name="ubah_nilai2">
                    <i class="fa fa-save"></i> Ubah
                  </button>
                  <button type="reset" class="btn btn-danger" id="batal2" name="batal">
                    <i class="fa fa-times"></i> Batal
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- akhir form nilai -->

  <div class="row">
    <div class="col-xs-12">
      <div class="box  box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Daftar Nilai</h3>
          <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
        </div>
        <br>
        <div class="input-group input-group-sm" >
          &nbsp;&nbsp;&nbsp;
          <button type="reset" name="tambah" id="tambah" class="btn btn-success">
            <i class="fa fa-user-plus"></i>Tambah Nilai
          </button>
        </div><br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">

          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th hidden>ID Alternatif</th>
              <th hidden>ID Kriteria</th>
              <th>Nama Calon Karyawan</th>
              <th>Kriteria</th>
              <th>Tipe Kriteria</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody id="datanilai">
              <?php
              include_once './backend/tampilnilai.php';

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
        </tbody>
          </table>
          <?php include_once './backend/normalisasi.php'; ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</section>
<?php
include_once './backend/tambahranking.php';
include_once './backend/ubahranking.php';
?>
<script>
$(document).ready(function(){
  $(document).on('click', '#hapus_nilai', function(e){
   var id_alternatif = $(this).data('id');
   var id_kriteria = $(this).data('idkrit');
   hapusnilai(id_alternatif, id_kriteria);
   e.preventDefault();
  });
  $('#tambah').click(function(e){
    e.preventDefault();
    $('#tambah_nilai').slideDown( "slow" );
    $("#nomorrm").load("./backend/refreshid_alternatif.php");
  });
  $(document).on('click', '#detail', function(e){
    e.preventDefault();
    $('#detail_karyawan').slideDown( "slow" );
  });
  $('#remove3').click(function(e){
    e.preventDefault();
    $('#ubah_nilai').hide(350);
  });
  $('#remove2').click(function(e){
    e.preventDefault();
    $('#detail_karyawan').hide(350);
  });
  $('#remove').click(function(e){
    e.preventDefault();
    $('#tambah_nilai').hide(350);
    $('#rm').val('');
  });
  $('#batal').click(function(e){
    e.preventDefault();
    $('#tambah_nilai').hide(350);
    $('#rm').val('');
  });
  $('#batal2').click(function(e){
    e.preventDefault();
    $('#ubah_nilai').hide(350);
  });
  $('#batal2').click(function(e){
    e.preventDefault();
    $('#detail_karyawan').hide(350);
  });
 });

function hapusnilai(id_alternatif, id_kriteria) {
  swal({
        title: "Hapus data?",
        text: "Anda yakin akan menghapus data ini?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Batal",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Hapus",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "./backend/hapusnilai.php?",
            type: "GET",
            data: 'id_alternatif='+id_alternatif+'&id_kriteria='+id_kriteria,
            dataType: "html",
            success: function () {
                swal("Sukses!", "Data berhasil dihapus", "success");
                $("#datanilai").load("./backend/refreshdatanilai.php");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Gagal!", "Data gagal dihapus", "error");
            }
        });
    });
}

function ubahnilai(id_alternatif, id_kriteria){
  $.ajax({
    type: "GET",
    url : "backend/detailnilai.php?",
    data: "id_alternatif="+id_alternatif+"&id_kriteria="+id_kriteria,
    success: function (data){
     var $response = $(data);
       $('#namaalternatif2').val($response.filter('#namaalternatif2').text());
       $('#kriteria2').val($response.filter('#kriteria2').text());
       $('#alter2').val($response.filter('#alter2').text());
       $('#kriter2').val($response.filter('#kriter2').text());
       $('#ketnilai2').val($response.filter('#ketnilai2').text());
       $('#jumnilai2').val($response.filter('#jumnilai2').text());
       $('#ubah_nilai').hide(350);
       $('#ubah_nilai').slideDown( "slow" );
    }
  });
}

$(function () {
  $('#example1').DataTable()
});

$(document).ready(function() {
  $("#idnilai").keyup(function() {
      var id = $('#idnilai').val();
      $.ajax({
        url: "./backend/load_data.php",
        dataType: "json",
        type: 'POST',
        data: "id="+id,
        success: function(data){
          $('#ketnilai').val(data[0].ket_nilai);
          $('#jumnilai').val(data[0].jum_nilai);
        }
      });
    });

    $("#idnilai2").keyup(function() {
        var id = $('#idnilai2').val();
        $.ajax({
          url: "./backend/load_data.php",
          dataType: "json",
          type: 'POST',
          data: "id="+id,
          success: function(data){
            $('#ketnilai2').val(data[0].ket_nilai);
            $('#jumnilai2').val(data[0].jum_nilai);
          }
        });
      });
  });
</script>
