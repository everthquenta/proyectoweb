<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>
	<title>DIDEDE</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>admilte/plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>admilte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>admilte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>admilte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>admilte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand text-white  navbar-light" style="background:#061B3D">
			<!-- Left navbar links -->
			<ul class="navbar-nav text-white">
				<li class="nav-item">
					<a class="nav-link text-white " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="../../index3.html" class="nav-link text-white">Home</a>
				</li>


			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search -->

				<ul class="navbar-nav text-white">


					<li class="nav-item d-none d-sm-inline-block">
						<a href="<?php echo base_url(); ?>index.php/Usuarios/logout" class="nav-link text-white">Salir</a>
					</li>
				</ul>

				<!-- Messages Dropdown Menu -->




			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar  elevation-4" style="background:#3D4246">
			<!-- Brand Logo -->
			<div style="width:80px; heigth: 80px;">
				<a href="../../index3.html" class="brand-link pb-20 mb-20 d-flex" heigth="200px">
					<img src="<?php echo base_url(); ?>img/logoinstitucional.png" alt="AdminLTE Logo" class="brand-image  elevation-100" style="opacity: .9; heigth: 3000px">
					<span class="brand-text font-weight-light text-white">DIDEDE</span>
				</a>
			</div>
			

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo base_url(); ?>admilte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block text-white">Administrador</a>
					</div>
				</div>

				<!-- SidebarSearch Form -->
				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar border border-white text-white">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



						<li class="nav-item menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon fas fa-table"></i>
								<p>
									ASOCIACION
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>index.php/Cliente/index" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Asociaciones Deportivas</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>index.php/Cliente/agregar" class="nav-link ">
										<i class="far fa-circle nav-icon"></i>
										<p>Registrar Asociacion Deportiva</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>index.php/Cliente/deshabilitados" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Asociaciones sin personeria Juridica</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item menu-open">
							<a href="#" class="nav-link  active">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Solicitudes
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>index.php/Conductor/index" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Solicitudes de Asociaciones</p>
									</a>
								</li>

							</ul>
						</li>
						<li class="nav-item menu-open">
							<a href="#" class="nav-link  active">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Solicitudes aceptadas
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>index.php/Tarjeta/index" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Solicitudes Rechazados</p>
									</a>
								</li>

							</ul>
						</li>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->