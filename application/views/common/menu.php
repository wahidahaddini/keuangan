<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $title; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url()."assets/" ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url()."assets/" ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/" ?>vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/" ?>custom/css/custom-style.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/" ?>vendor/MDTimePicker-master/mdtimepicker.css" rel="stylesheet">
  
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.jqueryui.min.css" >
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url()."home"?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIRIANG</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url()."home" ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Master
        <?php if ($this->session->userdata('bidang_id')!= '1'): ?>
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."Pengajuan"; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Pengajuan Baru</span></a>
      </li>
      <?php endif ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."DataPengajuan"; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Data Pengajuan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."DataPanjar"; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Data Panjar</span></a>
      </li>
      <?php if ($this->session->userdata('bidang_id')== '1'): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."Panjar"; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Panjar Baru</span></a>
      </li>

       <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pengaturan
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."RefBidang"; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Manajemen Bidang</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."Kegiatan"; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Manajemen Kegiatan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."Rekening"; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Manajemen Rekening</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()."User"; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Manajeme Akun</span></a>
      </li>
      <?php endif ?>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">SIRIANG</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Anda Yaking Ingin Keluar Sebagai "<?= $this->session->userdata("nama")?>"?</div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="<?= base_url()."login/logout"?>">Logout</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata("nama")?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo str_replace("-"," ", ucwords($this->uri->segment(1))) ?></h1>
            <?php
            if (isset($btnHref)) {
                ?>
            <a href="<?php echo $btnHref ?>" class="d-none d-sm-inline-block btn btn-<?php echo $btnBg ?> shadow-sm"><i class="fas fa-<?php echo $btnFa ?> fa-sm text-white-50"></i> <?php echo $btnText ?></a>
            <?php
            } ?>
          </div>


