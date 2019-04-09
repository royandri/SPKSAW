
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
    <small>Calon Karyawan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Calon Karyawan</li>
  </ol>
</section>
<br>
<section class="content">
  <!-- form tambah data -->
  <div class="row" id="tambah_karyawan" style="display: none;">
    <div class="col-xs-12">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Tambah Karyawan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" id="remove"><i class="fa fa-times"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="" action="" method="post">
            <div class="form-group row">
              <div class="col-sm-2">
                Nama Alternatif
              </div>
              <div class="col-sm-10">
                <input type="teks" name="namacalon" id="nCalon" minlength="4" oninput="ceknama()" value="" class="form-control" placeholder="Nama" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Tempat Lahir
              </div>
              <div class="col-sm-10">
                <input type="teks" name="tempatlahir" id="nTempatlahir" minlength="4" oninput="cektempatlahir()" value="" class="form-control" placeholder="Tempat lahir" required="true">
              </div>
            </div>
            <div class="form-group row ">
              <div class="col-sm-2">
                Tanggal Lahir
              </div>
              <div class="col-sm-10">
                <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                  <input class="form-control" type="text" name="tanggallahir"  placeholder="yyyy-mm-dd" required>
                  <span class="btn hidden"><i class="fa fa-calendar"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Agama
              </div>
              <div class="col-sm-10">
                <select class="form-control" name="agama" onchange="document.getElementById('agama').value=this.options[this.selectedIndex].text">
                  <option value="">Pilihan</option>
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                  <option value="katholik">Katholik</option>
                  <option value="hindu">Hindu</option>
                  <option value="budha">Budha</option>
                </select>
                <input type="hidden" name="agmz" id="agama" value="" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Jenis Kelamin
              </div>
              <div class="col-sm-10">
                <select class="form-control" name="kelamin"  onchange="document.getElementById('kelamin').value=this.options[this.selectedIndex].text">
                  <option value="">Pilihan</option>
                  <option value="laki">L</option>
                  <option value="perempuan">P</option>
                </select>
                <input type="hidden" name="kelamin" id="kelamin" value="" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Alamat Lengkap
              </div>
              <div class="col-sm-10">
                <textarea type="teks" name="alamat" value="" class="form-control" placeholder="Alamat lengkap" required="true"></textarea>
                <br>
                <div class="row">
                  <div class="col-sm-1">
                    Kel
                  </div>
                  <div class="col-sm-5">
                    <input type="teks" name="kel" id="nKel" minlength="4" oninput="cekkel" value="" class="form-control" placeholder="Kelurahan" required="true">
                  </div>
                  <div class="col-sm-1">
                    Kec
                  </div>
                  <div class="col-sm-5">
                    <input type="teks" name="kec" id="nKec" minlength="4" oninput="cekkec()" value="" class="form-control" placeholder="Kecamatan" required="true">
                  </div>
                </div>
                <div class="row">
                  <br>
                  <div class="col-sm-1">
                    Kab
                  </div>
                  <div class="col-sm-11">
                    <input type="teks" name="kab" id="nKab" minlength="4" oninput="cekkab()" value="" class="form-control" placeholder="Kabupaten" required="true">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                No. HP
              </div>
              <div class="col-sm-10">
                <input type="teks" name="hp" id="nhp" minlength="4" oninput="cekhp()" value="" class="form-control" placeholder="No HP" required="true">
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-8 col-md-push-4">
                  <button type="submit" class="btn btn-primary" name="tambah_karyawan" onclick="ceksemua()">
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
  <!-- form detail pasein -->
  <div class="row" id="detail_karyawan" style="display: none;">
    <div class="col-xs-12">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Detail Karyawan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" id="remove2"><i class="fa fa-times"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="" action="" method="post">
            <div class="form-group row">
              <div class="col-sm-2">
                Nama Pasien
              </div>
              <div class="col-sm-10">
                <input type="teks" name="namacalon1" id="namacalon" disabled value="" class="form-control" placeholder="Nama" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Tempat Lahir
              </div>
              <div class="col-sm-10">
                <input type="teks" disabled name="tempatlahir1" id="tempatlahir" value="" class="form-control" placeholder="Tempat lahir" required="true">
              </div>
            </div>
            <div class="form-group row ">
              <div class="col-sm-2">
                Tanggal Lahir
              </div>
              <div class="col-sm-10">
                <input type="teks" disabled name="tanggallahir1" id="tanggallahir" value="" class="form-control" placeholder="Tanggal lahir" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Agama
              </div>
              <div class="col-sm-10">
                <input type="teks" disabled name="agama1" id="agamas" value="" class="form-control" placeholder="Agama" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Jenis Kelamin
              </div>
              <div class="col-sm-10">
                <input type="teks" disabled name="jeniskelamin1" id="jeniskelamin" value="" class="form-control" placeholder="Jenis kelamin" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Alamat Lengkap
              </div>
              <div class="col-sm-10">
                <textarea type="teks" disabled name="alamat1" id="alamat" value="" class="form-control" placeholder="Alamat lengkap" required="true"></textarea>
                <br>
                <div class="row">
                  <div class="col-sm-1">
                    Kel
                  </div>
                  <div class="col-sm-5">
                    <input type="teks" disabled name="kel1" id="kel" value="" class="form-control" placeholder="Kelurahan" required="true">
                  </div>
                  <div class="col-sm-1">
                    Kec
                  </div>
                  <div class="col-sm-5">
                    <input type="teks" disabled name="kec1" id="kec" value="" class="form-control" placeholder="Kecamatan" required="true">
                  </div>
                </div>
                <div class="row">
                  <br>
                  <div class="col-sm-1">
                    Kab
                  </div>
                  <div class="col-sm-11">
                    <input type="teks" disabled name="kab1" id="kab" value="" class="form-control" placeholder="Kabupaten" required="true">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                No. HP
              </div>
              <div class="col-sm-10">
                <input type="teks" disabled name="nohp1" id="nohp" value="" class="form-control" placeholder="No. HP" required="true">
              </div>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- akhir form detail calon; -->
  <!-- form ubah calon -->
  <div class="row" id="ubah_calon" style="display: none;">
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
            <div class="form-group row" hidden>
              <div class="col-sm-2">
                ID Calon
              </div>
              <div class="col-sm-10">
                <input type="teks" name="idcalon2" id="idcalon1" minlength="4" oninput="ceknama1()"  value="" class="form-control" placeholder="Nama" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Nama Calon
              </div>
              <div class="col-sm-10">
                <input type="teks" name="namacalon2" id="namacalon1" minlength="4" oninput="ceknama1()"  value="" class="form-control" placeholder="Nama" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Tempat Lahir
              </div>
              <div class="col-sm-10">
                <input type="teks"  name="tempatlahir2" id="tempatlahir1" minlength="4" oninput="cektempatlahir1()" value="" class="form-control" placeholder="Tempat lahir" required="true">
              </div>
            </div>
            <div class="form-group row ">
              <div class="col-sm-2">
                Tanggal Lahir
              </div>
              <div class="col-sm-10">
                <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                  <input class="form-control" type="text" id="tanggallahir1"  name="tanggallahir2"  placeholder="yyyy-mm-dd" required>
                  <span class="btn hidden"><i class="fa fa-calendar"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Agama
              </div>
              <div class="col-sm-10">
                <select class="form-control" id="jk" name="agama" onchange="document.getElementById('agamas1').value=this.options[this.selectedIndex].text">
                  <option  value="">Pilihan</option>
                  <option id="islam" value="islam">Islam</option>
                  <option id="kristen" value="kristen">Kristen</option>
                  <option id="katholik" value="katholik">Katholik</option>
                  <option id="hindu" value="hindu">Hindu</option>
                  <option id="budha" value="budha">Budha</option>
                </select>
                <input type="hidden"  name="agama2" id="agamas1" value="" class="form-control" placeholder="Agama" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Jenis Kelamin
              </div>
              <div class="col-sm-10">
                <select class="form-control" name="kelamin"  id="jeniskelamin1" onchange="document.getElementById('jeniskelamin3').value=this.options[this.selectedIndex].text">
                  <option value="">Pilihan</option>
                  <option id="laki"value="laki">L</option>
                  <option id="perempuan" value="perempuan">P</option>
                </select>
                <input type="hidden"  name="jeniskelamin2" id="jeniskelamin3" value="" class="form-control" placeholder="Jenis kelamin" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Alamat Lengkap
              </div>
              <div class="col-sm-10">
                <textarea type="teks"  name="alamat2" id="alamat1" minlength="6" value="" class="form-control" placeholder="Alamat lengkap" required="true"></textarea>
                <br>
                <div class="row">
                  <div class="col-sm-1">
                    Kel
                  </div>
                  <div class="col-sm-5">
                    <input type="teks"  name="kel2" id="kel1" minlength="4" oninput="cekkel1()" value="" class="form-control" placeholder="Kelurahan" required="true">
                  </div>
                  <div class="col-sm-1">
                    Kec
                  </div>
                  <div class="col-sm-5">
                    <input type="teks"  name="kec2" id="kec1" minlength="4" oninput="cekkec1()" value="" class="form-control" placeholder="Kecamatan" required="true">
                  </div>
                </div>
                <div class="row">
                  <br>
                  <div class="col-sm-1">
                    Kab
                  </div>
                  <div class="col-sm-11">
                    <input type="teks"  name="kab2" id="kab1" minlength="4" oninput="cekkab1()" value="" class="form-control" placeholder="Kabupaten" required="true">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                No. HP
              </div>
              <div class="col-sm-10">
                <input type="teks"  name="nohp2" id="nohp2" minlength="4" oninput="cektempatlahir1()" value="" class="form-control" placeholder="No. HP" required="true">
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-8 col-md-push-4">
                  <button type="submit" class="btn btn-primary" id="" name="ubah_calon2">
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
  <!-- akhir form ubah calon -->

  <div class="row">
    <div class="col-xs-12">
      <div class="box  box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Daftar Calon Karyawan</h3>
          <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
        </div>
        <br>
        <div class="input-group input-group-sm" >
          &nbsp;&nbsp;&nbsp;
          <button type="reset" name="tambah" id="tambah" class="btn btn-success">
            <i class="fa fa-user-plus"></i>Tambah Karyawan
          </button>
        </div><br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">

          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th hidden>id</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Usia</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody id="datacalon">
              <?php
              include_once './backend/tampilcalon.php';

              $no=0;
              while ($a = mysqli_fetch_object($calon)) {
              $no= $no+1;
              ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td hidden><?php echo $a->id_alternatif; ?></td>
              <td><?php echo $a->nama_alternatif; ?></td>
              <td><?php echo $a->jenis_kelamin; ?></td>
              <td><?php echo $a->tempat_lahir; ?></td>
              <td><?php echo $a->tanggal_lahir; ?></td>
              <td><?php echo $a->usia; ?></td>
              <td>
                <div class="btn-group-horizontal btn-group-sm">
                  <input type="hidden" name="id_alternatif" value="<?php echo $a->no_rm;?>">
                  <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="detailkaryawan(<?php echo "'$a->id_alternatif'"; ?>)"><i class="fa fa-eye"></i> Detail</a>
                  <a href="javascript:void(0)" class="btn btn-warning btn-sm" onclick="ubahkaryawan(<?php echo "'$a->id_alternatif'"; ?>)"><i class="fa fa-edit"></i> Ubah</a>
                  <a href="javascript:void(0)" class="btn btn-danger btn-sm " id="hapus_karyawan" data-id="<?php echo $a->id_alternatif; ?>"><i class="fa fa-trash"></i> Hapus</a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</section>
<?php
include_once './backend/tambahcalon.php';
include_once './backend/ubahkaryawan.php';
?>
<script>
$(document).ready(function(){
  $(document).on('click', '#hapus_karyawan', function(e){
   var id_alternatif = $(this).data('id');
   hapuscalon(id_alternatif);
   e.preventDefault();
  });
  $('#tambah').click(function(e){
    e.preventDefault();
    $('#tambah_karyawan').slideDown( "slow" );
    $("#nomorrm").load("./backend/refreshid_alternatif.php");
  });
  $(document).on('click', '#detail', function(e){
    e.preventDefault();
    $('#detail_karyawan').slideDown( "slow" );
  });
  $('#remove3').click(function(e){
    e.preventDefault();
    $('#ubah_calon').hide(350);
  });
  $('#remove2').click(function(e){
    e.preventDefault();
    $('#detail_karyawan').hide(350);
  });
  $('#remove').click(function(e){
    e.preventDefault();
    $('#tambah_karyawan').hide(350);
    $('#rm').val('');
  });
  $('#batal').click(function(e){
    e.preventDefault();
    $('#tambah_karyawan').hide(350);
    $('#rm').val('');
  });
  $('#batal2').click(function(e){
    e.preventDefault();
    $('#ubah_calon').hide(350);
  });
  $('#batal2').click(function(e){
    e.preventDefault();
    $('#detail_karyawan').hide(350);
  });
 });

function hapuscalon(id_alternatif) {
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
            url: "./backend/hapuscalon.php?",
            type: "GET",
            data: 'id_alternatif='+id_alternatif,
            dataType: "html",
            success: function () {
                swal("Sukses!", "Data berhasil dihapus", "success");
                $("#datacalon").load("./backend/refreshdatacalon.php");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Gagal!", "Data gagal dihapus", "error");
            }
        });
    });
}

function detailkaryawan(id_alternatif){
  $.ajax({
    type: "GET",
    url : "backend/detailkaryawan.php?",
    data: "id_alternatif="+id_alternatif,
    success: function (data){
     var $response = $(data);
       $('#namacalon').val($response.filter('#namacalon').text());
       $('#jeniskelamin').val($response.filter('#jeniskelamin').text());
       $('#alamat').val($response.filter('#alamat').text());
       $('#kel').val($response.filter('#kel').text());
       $('#kec').val($response.filter('#kec').text());
       $('#kab').val($response.filter('#kab').text());
       $('#tempatlahir').val($response.filter('#tempatlahir').text());
       $('#tanggallahir').val($response.filter('#tanggallahir').text());
       $('#agamas').val($response.filter('#agama').text());
       $('#nohp').val($response.filter('#nohp').text());
       $('#detail_karyawan').hide(350);
       $('#detail_karyawan').slideDown( "slow" );
    }
  });
}

function ubahkaryawan(id_alternatif){
  $.ajax({
    type: "GET",
    url : "backend/detailkaryawan.php?",
    data: "id_alternatif="+id_alternatif,
    success: function (data){
     var $response = $(data);
       $('#namacalon1').val($response.filter('#namacalon').text());
      //  $('#jeniskelamin1').val($response.filter('#jeniskelamin').text());
       if (($response.filter('#jeniskelamin').text())=="L"){
           document.getElementById('laki').selected=true;
       }else {
         document.getElementById('perempuan').selected=true;
       }
       $('#jeniskelamin3').val($response.filter('#jeniskelamin').text());
       $('#alamat1').val($response.filter('#alamat').text());
       $('#kel1').val($response.filter('#kel').text());
       $('#kec1').val($response.filter('#kec').text());
       $('#kab1').val($response.filter('#kab').text());
       $('#tempatlahir1').val($response.filter('#tempatlahir').text());
       $('#tanggallahir1').val($response.filter('#tanggallahir').text());
       if (($response.filter('#agama').text())=="Islam"){
           document.getElementById('islam').selected=true;
       }else if (($response.filter('#agama').text())=="Kristen") {
         document.getElementById('kristen').selected=true;
       }else if (($response.filter('#agama').text())=="Katholik") {
         document.getElementById('katholik').selected=true;
       }else if (($response.filter('#agama').text())=="Hindu") {
         document.getElementById('hindu').selected=true;
       }else if (($response.filter('#agama').text())=="Budha") {
         document.getElementById('budha').selected=true;
       }

       $('#agamas1').val($response.filter('#agama').text());
       $('#nohp2').val($response.filter('#nohp').text());
       $('#idcalon1').val(id_alternatif);
       $('#ubah_calon1').hide(350);
       $('#ubah_calon').slideDown( "slow" );
    }
  });
}

$(".input-group.date").datepicker({autoclose: true, todayHighlight: true, startDate: '1930-01-01', endDate:'now'});
$(function () {
  $('#example1').DataTable()
});
function refresh(){
}
$(function() {
  setInterval(refresh, 100);
});

function ceknama(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("nCalon");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Nama pasien wajib huruf !");
      nCalon.value='';
  }
}


function cekkec(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("nKec");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Kecamatan wajib huruf !");
      nKec.value='';
  }
}

function cekkel(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("nKel");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Kelurahan wajib huruf !");
      nKel.value='';
  }
}

function cekkab(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("nKab");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Kabupaten wajib huruf !");
      nKab.value='';
  }
}

function cektempatlahir(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("nTempatlahir");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Tempat lahir wajib huruf !");
      nTempatlahir.value='';
  }
}

function ceksemua(){
  ceknama();
  cekkel();
  cekkec();
  cekkab();
  cektempatlahir();
}

function ceknama1(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("namacalon1");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Nama pasien wajib huruf !");
      namacalon1.value='';
  }
}

function cekkk1(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("kk1");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Nama KK wajib huruf !");
      kk1.value='';
  }
}

function cekpekerjaan1(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("pekerjaan1");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Pekerjaan wajib huruf !");
      pekerjaan1.value='';
  }
}

function cekkec1(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("kec1");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Kecamatan wajib huruf !");
      kec1.value='';
  }
}

function cekkel1(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("kel1");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Kelurahan wajib huruf !");
      kel1.value='';
  }
}

function cekkab1(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("kab1");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Kabupaten wajib huruf !");
      kab1.value='';
  }
}

function cektempatlahir1(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var dtInput = document.getElementById("tempatlahir1");
  if (dtInput.value.match(validasiHuruf)) {
  } else {
      alert("Tempat lahir wajib huruf !");
      tempatlahir1.value='';
  }
}

function ceksemua1(){
  ceknama1();
  cekkk1();
  cekkel1();
  cekkec1();
  cekkab1();
  cektempatlahir1();
  cekpekerjaan1();
}
</script>
