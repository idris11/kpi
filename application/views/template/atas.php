<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>.:: Sistem Informasi Pengukuran KPI ::.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <span class="logo-mini"><b>KPI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><h4><i>Sistem Informasi Pengukuran KPI Pegawai</i></h4></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><center>MENU UTAMA</center></li>
        <?php
        if ($level=='kaban') {
          # code...
        ?>
        <li><a href="#"><i class="fa fa-user"></i> <span><?php echo $username; ?></span></a></li>
        <li><a href="<?php echo base_url(); ?>indikator/dashboard_indikator"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url(); ?>indikator/rekapitulasi_indikator"><i class="fa fa-bookmark-o"></i> <span>Rekapitulasi Indikator</span></a></li>
        <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        <?php
        }
        elseif ($level=='penilai') {
          # code...
        ?>
        <li><a href="#"><i class="fa fa-user"></i> <span><?php echo $username; ?></span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-certificate"></i> <span>Master Indikator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>indikator/daftar_indikator"><i class="fa fa-circle-o"></i> Daftar Indikator</a></li>
            <li><a href="<?php echo base_url(); ?>indikator/tambah_indikator"><i class="fa fa-circle-o"></i> Tambah Indikator</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Indikator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>indikator"><i class="fa fa-circle-o"></i> Target Indikator</a></li>
            <li><a href="<?php echo base_url(); ?>indikator/realisasi_indikator"><i class="fa fa-circle-o"></i> Realisasi Indikator</a></li>
            <li><a href="<?php echo base_url(); ?>indikator/update_indikator"><i class="fa fa-circle-o"></i> Update Indikator</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Kategori</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>kategori"><i class="fa fa-circle-o"></i> Lihat Data Kategori</a></li>
            <li><a href="<?php echo base_url(); ?>kategori/tambah_kategori"><i class="fa fa-circle-o"></i> Tambah Data Kategori</a></li>
            <li><a href="<?php echo base_url(); ?>kategori/analisa_kategori"><i class="fa fa-circle-o"></i> Pembobotan Kategori</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url(); ?>indikator/analisa_indikator"><i class="fa fa-bookmark-o"></i> <span>Pembobotan Indikator</span></a></li>
        <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        <?php
        }
        elseif ($level=='admin') {
          # code...
        ?>
        <li><a href="#"><i class="fa fa-user"></i> <span><?php echo $username; ?></span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i> <span>Master Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>pegawai"><i class="fa fa-circle-o"></i> Lihat Pegawai</a></li>
            <li><a href="<?php echo base_url(); ?>pegawai/tambah_pegawai"><i class="fa fa-circle-o"></i> Tambah Pegawai</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-certificate"></i> <span>Master Pangkat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>pangkat"><i class="fa fa-circle-o"></i> Lihat Pangkat</a></li>
            <li><a href="<?php echo base_url(); ?>pangkat/tambah_pangkat"><i class="fa fa-circle-o"></i> Tambah Pangkat</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-suitcase"></i> <span>Master Jabatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>jabatan"><i class="fa fa-circle-o"></i> Lihat Jabatan</a></li>
            <li><a href="<?php echo base_url(); ?>jabatan/tambah_jabatan"><i class="fa fa-circle-o"></i> Tambah Jabatan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Master Unit Kerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>unitkerja"><i class="fa fa-circle-o"></i> Lihat Unit Kerja</a></li>
            <li><a href="<?php echo base_url(); ?>unitkerja/tambah_unitkerja"><i class="fa fa-circle-o"></i> Tambah Unit Kerja</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url(); ?>indikator/dashboard_indikator"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url(); ?>indikator/rekapitulasi_indikator"><i class="fa fa-bookmark-o"></i> <span>Rekapitulasi Indikator</span></a></li>
        <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        <?php
        }
        elseif ($level=='pegawai') {
          # code...
        ?>
        <li><a href="#"><i class="fa fa-user"></i> <span><?php echo $username; ?></span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Indikator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>indikator/nilai_indikator"><i class="fa fa-circle-o"></i> Nilai Indikator</a></li>
            <li><a href="<?php echo base_url(); ?>indikator/pencapaian_indikator"><i class="fa fa-circle-o"></i> Hasil Pengukuran Indikator</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        <?php
        }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">