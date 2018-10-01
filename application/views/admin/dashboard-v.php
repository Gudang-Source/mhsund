<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
  <!-- lgo -->
  <link rel="shortcut icon" href="<?php echo base_url($brand); ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- css font awesome -->
  <link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>">
  <!-- css font themify -->
  <link rel="stylesheet" href="<?php echo base_url('asset/themify-icons.css'); ?>">
  <!-- css font css pribadi -->
  <link rel="stylesheet" href="<?php echo base_url('asset/css/custom.css'); ?>">
  <!-- jquery -->
  <script src="<?php echo base_url('asset/js/jquery-3.3.1.min.js') ?>" ></script>
  <!-- popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <!-- bootstrap js -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

</head>
<body>
  <?php if ($this->ion_auth->is_admin()): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1" style="font-size: 12px;">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navmaster" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmaster">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-light" href="<?php echo base_url('index.php/admin/dashboard') ?>"><i class="ti ti-home"></i> Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="<?php echo base_url('index.php/admin/satuan_pend') ?>"><i class="ti ti-desktop"></i> Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="<?php echo base_url('index.php/admin/Mahasiswa') ?>"><i class="ti ti-user"></i> Mahasiswa</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="dosen" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-crown"></i> Dosen
              </a>
              <div class="dropdown-menu" aria-labelledby="dosen" style="font-size: 13px;">
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/dosen') ?>">Dosen</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/dosen/penugasan') ?>">Penugasan Dosen</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="perkuliahan" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-cup"></i> Perkuliahan
              </a>
              <div class="dropdown-menu" aria-labelledby="perkuliahan" style="font-size: 13px;">
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/matakuliah') ?>">Mata Kuliah</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/Kurikulum') ?>">Kurikulum</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/kelas') ?>">Kelas Perkuliahan</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/nilai') ?>">Nilai Perkuliahan</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/kuliah_mahasiswa') ?>">Aktivitas Kuliah Mahasiswa</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/mahasiswa/lulus') ?>">Mahasiswa Lulus / DO</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/mahasiswa/aktivitas') ?>">Aktivitas Mahasiswa</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="pelengkap" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-notepad"></i> Pelengkap
              </a>
              <div class="dropdown-menu" aria-labelledby="pelengkap" style="font-size: 13px;">
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/skala_nilai') ?>">Skala Nilai</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/setting/periode_kuliah') ?>">Setting Periode Perkuliahan</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="rekap" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-bag"></i> Rekaptulasi
              </a>
              <div class="dropdown-menu" aria-labelledby="setting" style="font-size: 13px;">
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/rekaptulasi') ?>">Rekap Pelaporan</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/rekaptulasi/jml_dosen') ?>">Jumlah Dosen</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/rekaptulasi/jml_mahasiswa') ?>">Jumlah mahasiswa</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/rekaptulasi/ips_mahasiswa') ?>">Rekap IPS Mahasiswa</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/rekaptulasi/krs') ?>">KRS Mahasiswa</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/rekaptulasi/khs') ?>">KHS Mahasiswa</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/rekaptulasi/stat_mahasiswa') ?>">Laporan Status Mahasiswa</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/export') ?>">EXPORT DATA</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="setting" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-settings"></i> Setting
              </a>
              <div class="dropdown-menu" aria-labelledby="setting" style="font-size: 13px;">
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/skala_nilai') ?>">Sanbox</a>
                <a class="dropdown-item" href="<?php echo base_url('index.php/admin/setting/periode_kuliah') ?>">Setting Periode</a>
                 <a class="dropdown-item" href="<?php echo base_url('index.php/admin/setting/user_prodi') ?>">Akun Prodi</a>
                  <a class="dropdown-item" href="<?php echo base_url('index.php/admin/setting/periode_kuliah') ?>">Akun Dosen</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <img src="<?php echo base_url($brand) ?>" width="30" height="30" class="d-inline-block align-top mr-1" alt="<?php echo base_url($brand) ?>">
      <a class="navbar-brand" href="#"><?php echo $this->Admin_m->info_pt(1)->nama_info_pt; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if ($this->ion_auth->is_admin()): ?>
                  <?php echo $users->username; ?>
                  <?php elseif($this->ion_auth->in_group('dosen')): ?>
                    <span class="text-success" style="font-size: 13px"><?php echo $datamhs->nidn.' - '.$datamhs->nm_sdm; ?></span>
                    <?php elseif($this->ion_auth->in_group('prodi')): ?>
                    <span class="text-success" style="font-size: 13px"><?php echo $users->username; ?></span>
                  <?php else: ?>
                    <span class="text-success" style="font-size: 13px"><?php echo $datamhs->nipd.' - '.$datamhs->nm_pd; ?></span>
                <?php endif ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo base_url('index.php/login/logout') ?>">Log Out</a>
              </div>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </nav>
  <?php if ($this->ion_auth->is_admin()): ?>
    <div class="container">
      <div class="row">
        <div class="col">
          <?php $this->view($page); ?>
        </div>
      </div>
    </div>
    <?php else: ?>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <?php $this->view($aside); ?>
          </div>
          <div class="col-md-9">
            <?php $this->view($page); ?>
          </div>
        </div>
      </div>
    <?php endif ?>
</body>
</html>