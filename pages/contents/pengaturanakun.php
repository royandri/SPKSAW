<!-- created by: Roy Andri Selasa, 15-07-2018 -->
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
    <small>User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pengaturan Akun</li>
  </ol>
</section>
<br>
<section class="content">
  <!-- form tambah akun -->
  <div class="row" id="tambah_akun" style="display:none;" >
    <div class="col-xs-12">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Tambah User</h3>

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
                Nama Lengkap
              </div>
              <div class="col-sm-10">
                <input type="teks" name="namalengkap" minlength="5" value="" class="form-control" placeholder="Nama Lengkap" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Username
              </div>
              <div class="col-sm-10">
                <input type="teks" name="username" minlength="5" value="" class="form-control" placeholder="Username" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Password
              </div>
              <div class="col-sm-10">
                <input type="password" name="password" id="password2" minlength="5" value="" class="form-control" placeholder="Password" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Konfirmasi Password
              </div>
              <div class="col-sm-10">
                <input type="password" name="konfirmpassword" id="konfirmpassword" minlength="5" value="" class="form-control" placeholder="Konfirmasi Password" required="true" oninput="Cek()">
                <span class="label label-success" id="cocok" style="display:none">Cocok</span>
                <span class="label label-danger" id="salah" style="display:none">Salah</span>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Hak Akses
              </div>
              <div class="col-sm-10">
                <select class="form-control" name="hakakses" required="true">
                  <option value="">Pilihan</option>
                  <option value="Administrator">Administrator</option>
                  <option value="Pimpinan">Pimpinan</option>
                  <option value="Operator">Operator</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-8 col-md-push-4">
                  <button type="submit" class="btn btn-primary" name="tambah_akun">
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
  <!-- akhir form tambah akun -->
  <!-- form ubah akun -->
  <div class="row" id="ubah_akun" style="display:none;" >
    <div class="col-xs-12">
      <div class="box box-warning box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Ubah Akun</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" id="remove1"><i class="fa fa-times"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="" action="" method="post">
            <div class="form-group row">
              <div class="col-sm-2">
                ID Login
              </div>
              <div class="col-sm-10">
                <input type="teks" disabled name="idlogin" id="id_login" value="" class="form-control" placeholder="Username" required="true">
                <input type="hidden"  name="idlogin2" id="id_login2" value="" class="form-control" placeholder="Username" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Nama Lengkap
              </div>
              <div class="col-sm-10">
                <input type="teks" name="namalengkap2" id="namalengkap" value="" minlength="5" class="form-control" placeholder="Username" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Username
              </div>
              <div class="col-sm-10">
                <input type="teks" name="username2" id="username" value="" minlength="5" class="form-control" placeholder="Username" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Password
              </div>
              <div class="col-sm-10">
                <input type="password" name="password2" id="password" minlength="5" value="" class="form-control" placeholder="Password" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Konfirmasi Password
              </div>
              <div class="col-sm-10">
                <input type="password" name="konfirmpassword2" id="konfirmpassword2" minlength="5" value="" class="form-control" placeholder="Konfirmasi Password" required="true" oninput="Cek2();">
                <span class="label label-success" id="cocok2" style="display:none">Cocok</span>
                <span class="label label-danger" id="salah2" style="display:none">Salah</span>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Level
              </div>
              <div class="col-sm-10">
                <select class="form-control" name="hakakses2" required="true">
                  <option value="">Pilihan</option>
                  <option id="admin" value="Administrator">Administrator</option>
                  <option id="operator" value="Operator">Operator</option>
                  <option id="pimpinan" value="Pimpinan">Pimpinan</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-md-8 col-md-push-4">
                  <button type="submit" class="btn btn-primary" name="ubah_akun">
                    <i class="fa fa-save"></i> Ubah
                  </button>
                  <button type="reset" class="btn btn-danger" id="batal1" name="batal">
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
  <!-- akhir form ubah akun -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box  box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Daftar Akun</h3>
          <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
        </div>
        <br>
        <div class="input-group input-group-sm" >
          &nbsp;&nbsp;&nbsp;
          <button type="reset" name="tambahakun" id="tambahakun" class="btn btn-success">
            <i class="fa fa-user-plus"></i>Tambah User
          </button>
        </div><br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">

          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th hidden>ID/th>
              <th>Nama Lengkap</th>
              <th>Username</th>
              <th>Password</th>
              <th>Posisi</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody id="dataakun">
              <?php
              include_once './backend/tampilakun.php';
              $no=0;
              while ($a = mysqli_fetch_object($akun)) {
              $no= $no+1;
              ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td hidden><?php echo $a->id_pengguna; ?></td>
              <td><?php echo $a->nama_lengkap; ?></td>
              <td><?php echo $a->username;  ?></td>
              <td><?php echo $a->password; ?></td>
              <td><?php echo $a->level;  ?></td>
              <td>
                <div class="btn-group-horizontal btn-group-sm">
                  <input type="hidden" name="idlogin" value="<?php echo $a->id_pengguna;?>">
                  <a href="javascript:void(0)" class="btn btn-warning btn-sm" onclick="ubahakun(<?php echo "'$a->id_pengguna'"; ?>)"><i class="fa fa-edit"></i> Ubah</a>
                  <a href="javascript:void(0)" class="btn btn-danger btn-sm " id="hapus_akun" data-id="<?php echo $a->id_pengguna; ?>"><i class="fa fa-trash"></i> Hapus</a>
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
<?php include_once './backend/tambahakun.php'; ?>
<?php include_once './backend/ubahakun.php'; ?>
<script>
$(document).ready(function(){
  $('#tambahakun').click(function(e){
    e.preventDefault();
    $('#tambah_akun').slideDown( "slow" );
  });
  $('#remove').click(function(e){
    e.preventDefault();
    $('#tambah_akun').hide(500);
  });
  $('#batal').click(function(e){
    e.preventDefault();
    $('#tambah_akun').hide(500);
  });
  $('#batal1').click(function(e){
    e.preventDefault();
    $('#ubah_akun').hide(500);
  });
  $('#remove1').click(function(e){
    e.preventDefault();
    $('#ubah_akun').hide(500);
  });
  $('#ubahahakun').click(function(e){
    e.preventDefault();
    $('#ubah_akun').slideDown( "slow" );
  });
  $(document).on('click', '#hapus_akun', function(e){
   var idlogin = $(this).data('id');
   hapusakun(idlogin);
   e.preventDefault();
  });
});

function ubahakun(idlogin){
  $.ajax({
    type: "GET",
    url : "./backend/detailakun.php?",
    data: "id_login="+idlogin,
    success: function (data){
     var $response = $(data);
       $('#id_login').val($response.filter('#id_login').text());
       $('#id_login2').val($response.filter('#id_login').text());
       $('#namalengkap').val($response.filter('#namalengkap').text())
       $('#username').val($response.filter('#username').text());
       $('#password').val($response.filter('#password').text());
       $('#konfirmpassword2').val($response.filter('#password').text());
       if (($response.filter('#hak_akses').text())=="Administrator"){
           document.getElementById('admin').selected=true;
       }else if (($response.filter('#hak_akses').text())=="Operator"){
         document.getElementById('operator').selected=true;
       }else if (($response.filter('#hak_akses').text())=="Pimpinan"){
         document.getElementById('pimpinan').selected=true;
       }
       $('#ubah_akun').hide(350);
       $('#ubah_akun').slideDown( "slow" );
    }
  });
}

function hapusakun(idlogin) {
  swal({
        title: "Hapus data?",
        text: "Anda yakin akan menghapus akun ini?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Batal",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Hapus",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "./backend/hapusakun.php?",
            type: "GET",
            data: 'id_login='+idlogin,
            dataType: "html",
            success: function () {
                swal("Sukses!", "Data berhasil dihapus", "success");
                $("#dataakun").load("./backend/refreshdataakun.php");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Gagal!", "Data gagal dihapus", "error");
            }
        });
    });
}
function Cek() {
  if(document.getElementById('password2').value==document.getElementById('konfirmpassword').value){
   $("#cocok").show();
   $("#salah").hide();
  }else{
   $("#salah").show();
   $("#cocok").hide();
  }
}
function Cek2() {
  if(document.getElementById('password').value==document.getElementById('konfirmpassword2').value){
   $("#cocok2").show();
   $("#salah2").hide();
  }else{
   $("#salah2").show();
   $("#cocok2").hide();
  }
}
$(function () {
  $('#example1').DataTable()
});
</script>
