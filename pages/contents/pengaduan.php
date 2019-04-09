<?php
  $hak=$_SESSION['posisi'];
  if ($hak!='admin' && $hak!='kepala' && $hak!='karyawan') {
    include_once 'dashboard.php';
    exit();
  }
?>
<section class="content-header">
  <h1>
    Kritik
    <small>Saran</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pengaduan</li>
  </ol>
</section>
<br>
<section class="content">
  <!-- form detail pengaduan -->
  <div class="row" id="detail_pengaduan" style="display: none;">
    <div class="col-xs-12">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Detail Kritik dan Saran</h3>

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
                ID Pengaduan
              </div>
              <div class="col-sm-10">
                <input type="teks" name="id_pengaduan" id="id_pengaduan" value="" disabled class="form-control" placeholder="ID Pengaduan" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Email
              </div>
              <div class="col-sm-10">
                <input type="teks" name="email" id="email" disabled value="" class="form-control" placeholder="E-Mail" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Nama
              </div>
              <div class="col-sm-10">
                <input type="teks" name="nama" id="nama" disabled value="" class="form-control" placeholder="Nama" required="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">
                Isi Aduan
              </div>
              <div class="col-sm-10">
                <textarea name="isi_aduan" id="isi_aduan" disabled value="" class="form-control" placeholder="Isi Aduan" required="true"></textarea>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- menampilkand tabel data pengaduan -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box  box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"></i> Daftar Kritik dan Saran</h3>
          <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
        </div>
        <br>
        <div class="input-group input-group-sm" >
        </div
        <!-- /.box-header -->
        <div class="box-body table-responsive">

          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th hidden>id</th>
              <th>Email</th>
              <th>Nama</th>
              <th>Isi Aduan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody id="datapasien">
              <?php
              include_once './backend/tampilpengaduan.php';
              $no=0;
              while ($a = mysqli_fetch_object($pengaduan)) {
              $no= $no+1;
              ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td hidden><?php echo $a->id_pengaduan; ?></td>
              <td><?php echo $a->email; ?></td>
              <td><?php echo $a->nama; ?></td>
              <td><?php echo $isi = substr($a->isi_aduan, 0, 60 ); echo " ....";  ?></td>
              <td>
                <div class="btn-group-horizontal btn-group-sm">
                  <input type="hidden" name="norm" value="<?php echo $a->no_rm;?>">
                  <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="detailpengaduan(<?php echo "'$a->id_pengaduan'"; ?>)"><i class="fa fa-eye"></i> Detail</a>
                  <a href="javascript:void(0)" class="btn btn-danger btn-sm " id="hapus_pengaduan" data-id="<?php echo $a->id_pengaduan; ?>"><i class="fa fa-trash"></i> Hapus</a>
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
<script>
$(document).ready(function(){
  $(document).on('click', '#hapus_pengaduan', function(e){
   var idpengaduan = $(this).data('id');
   hapuspengaduan(idpengaduan);
   e.preventDefault();
  });
  $('#remove').click(function(e){
    e.preventDefault();
    $('#detail_pengaduan').hide(350);
  });
});

function hapuspengaduan(idpengaduan) {
  swal({
        title: "Hapus data?",
        text: "Anda yakin akan menghapus pengaduan?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Batal",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Hapus",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "./backend/hapuspengaduan.php?",
            type: "GET",
            data: 'id_pengaduan='+idpengaduan,
            dataType: "html",
            success: function () {
                swal("Sukses!", "Data berhasil dihapus", "success");
                $("#datapasien").load("./backend/refreshpengaduan.php");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Gagal!", "Data gagal dihapus", "error");
            }
        });
    });
}

function detailpengaduan(idpengaduan){
  $.ajax({
    type: "GET",
    url : "backend/detailpengaduan.php?",
    data: "id_pengaduan="+idpengaduan,
    success: function (data){
     var $response = $(data);
       $('#id_pengaduan').val($response.filter('#id_pengaduan').text());
       $('#email').val($response.filter('#email').text());
       $('#nama').val($response.filter('#nama').text());
       $('#isi_aduan').val($response.filter('#isi_aduan').text());
       $('#detail_pengaduan').hide(350);
       $('#detail_pengaduan').slideDown( "slow" );
    }
  });
}

$(function () {
  $('#example1').DataTable()
});
</script>
