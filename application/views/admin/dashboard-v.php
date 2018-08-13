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
  <script src="<?php echo base_url('asset/js/jquery-3.3.1.min.js') ?>" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <?php if ($this->ion_auth->is_admin()): ?>
    <div class="bg-dark p-1 text-light" style="font-size: 12px;">
      <div class="container">
        <ul class="navbar-nav">
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle text-light" href="#" id="master" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-layout-tab"></i> Data Master Akademik
            </a>
            <div class="dropdown-menu" aria-labelledby="master" style="font-size: 13px;">
              <a class="dropdown-item" href="#"><i class="ti ti-user"></i> Mahasiswa</a>
              <a class="dropdown-item" href="#"><i class="ti ti-book"></i> Matakuliah</a>
              <a class="dropdown-item" href="#"><i class="ti ti-tag"></i> Dosen</a>
              <a class="dropdown-item" href="#"><i class="ti ti-ruler-pencil"></i> Program Studi</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  <?php endif ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <img src="<?php echo base_url($brand) ?>" width="30" height="30" class="d-inline-block align-top mr-1" alt="<?php echo base_url($brand) ?>">
      <a class="navbar-brand" href="#"><?php echo $title; ?></a>
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
</body>
</html>