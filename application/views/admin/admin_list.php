<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?= base_url() ?>assets/img/logoamikom.png" type="image/png">
	<title>Data User</title>

	<!-- Custom fonts for this template-->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template-->
	<!--<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
  <link href="<? //= base_url() 
				?>assets/css/sb-admin-2.min.css" rel="stylesheet">-->
	<link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">ADMIN</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url() ?>admin/dashboard">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Nav Item - Charts -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url() ?>admin/Admin_datasiswa">
					<i class="fas fa-fw fa-folder"></i>
					<span>Data Siswa</span></a>
			</li>

			<!-- Nav Item - Charts -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url() ?>admin/Admin_dataguru">
					<i class="fas fa-fw fa-folder"></i>
					<span>Data Guru</span></a>
			</li>
			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fas fa-fw fa-list alt"></i>
					<span>Laporan</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<!-- <h6 class="collapse-header">Prediksi:</h6> -->
						<a class="collapse-item" href="<?= base_url("admin/Admin_hasil") ?>">Hasil</a>
						<a class="collapse-item" href="<?= base_url("guru/uji_akurasi") ?>">Uji Akurasi</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url() ?>admin/dataadmin">
					<i class="fas fa-fw fa-glyphicon fa-user"></i>
					<span>User</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
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
						<i class="fa fa-bars"></i></button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang, <b><?php echo $this->session->userdata("nama") ?></span>
								<img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/340br.jpg">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?php echo base_url() ?>admin/dataadmin/logout" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Log Out
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">


					<!-- Content Row -->
					<div class="row">
						<!-- Begin Page Content -->
						<div class="container-fluid">

							<!-- Page Heading -->
							<div class="text-center justify-content-between mb-4">
								<h1 class="h3 mb-0 text-gray-800">DATA USER</h1>
							</div>

							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">
										<a href="<?php echo site_url('admin/dataadmin/add') ?>"><i class="fas fa-plus"></i> Add New</a>
									</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead class="text-center">
												<tr>
													<th>ID</th>
													<th>Nama Lengkap</th>
													<th>Username</th>
													<th>Password</th>
													<th>Level</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												<?php foreach ($user as $u) : ?>
													<tr>
														<td width="50">
															<?php echo $u->id_user ?>
														</td>
														<td width="150">
															<?php echo $u->nama ?>
														</td>
														<td width="100">
															<?php echo $u->username ?>
														</td>
														<td width="150">
															<?php echo $u->password ?>
														</td>
														<td width="100">
															<?php echo $u->level ?>
														</td>
														<td width="200">
															<a href="<?php echo site_url('admin/dataadmin/edit/' . $u->id_user) ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
															<a href="<?php echo site_url('admin/datadmin/delete/' . $u->id_user) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>

														</td>
													</tr>
												<?php endforeach; ?>

											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>
						<!-- /.container-fluid -->
					</div>

				</div>
				<!-- End of Content Wrapper -->

			</div>
			<!-- End of Page Wrapper -->

			<!-- Scroll to Top Button-->
			<a class="scroll-to-top rounded" href="#page-top">
				<i class="fas fa-angle-up"></i>
			</a>

			<!-- Logout Modal-->
			<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<a class="btn btn-primary" href="<?php echo base_url() ?>admin/Dashboard/logout">Logout</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>&copy; <?= date('Y'); ?> - Sistem Prediksi - All Right Reservered</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

			<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
			<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

			<!-- Core plugin JavaScript-->
			<script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

			<!-- Custom scripts for all pages-->
			<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

			<!-- Page level plugins -->
			<script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

			<!-- Page level custom scripts -->
			<script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
			<script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>