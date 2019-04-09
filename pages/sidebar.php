<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="dist/img/icon.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $username ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
            <button disabled type="submit" name="search" id="search-btn" class="btn btn-flat">
              <i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">NAVIGASI</li>
    <?php $hak='admin';?>
    <li>
      <a href="?p=dashboard">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <?php if ($hak=='admin'){?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Master Data</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="?p=karyawan"><i class="fa fa-circle-o"></i> Data Calon Karyawan</a></li>
        <li><a href="?p=nilai"><i class="fa fa-circle-o"></i> Data Nilai</a></li>
        <li><a href="?p=pengaturanakun"><i class="fa fa-circle-o"></i> Data User</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-server"></i>
        <span>Proses</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Proses SAW</a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Peringkat</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-file"></i>
        <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Laporan SAW</a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Peringkat</a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Calon Karyawan</a></li>
      </ul>
    </li>
    <li class="header">PENGATURAN</li>
    <li>
      <a href="#">
        <i class="fa fa-gears"></i>
        <span>Pengaturan Kriteria</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-gears"></i>
        <span>Pengaturan Nilai Kriteria</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-gears"></i>
        <span>Pengaturan Nilai Kuota</span>
      </a>
    </li>
  <?php }else if ($hak=='pemanggil_antrian') { ?>
    <li class="header">PENGATURAN</li>
    <li>
      <a href="?p=pengaturanantrian#">
        <i class="fa fa-gear"></i>
        <span>Pengaturan Kuota</span>
      </a>
    </li>
  <?php }else if ($hak=='kepala' || $hak=='karyawan') {?>
    <li>
      <a href="?p=antrian#">
        <i class="fa fa-users"></i> <span>Antrian</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green">new</small>
        </span>
      </a>
    </li>
    <li>
      <a href="?p=datapasien#">
        <i class="fa fa-wheelchair"></i>
        <span>Data Pasien</span>
      </a>
    </li>
    <li>
      <a href="?p=pengaduan#">
        <i class="fa fa-envelope"></i> <span>Kritik dan Saran</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green">new</small>
        </span>
      </a>
    </li>
  <?php } ?>
  </ul>
</section>
