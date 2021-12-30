<?php require_once(APPPATH . 'views/layouts/header.php') ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-5 col-md-4">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body">
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<?php echo $this->session->flashdata('msg'); ?>
									<h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
								</div>
								<form class="form-signin" method="POST" action="<?php echo site_url('auth/authentication'); ?>">
									<div class="form-group">
										<input type="username" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username...">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password...">
									</div>
									<div class="form-group">
										<div class="custom-control custom-checkbox small">
											<input type="checkbox" class="custom-control-input" id="customCheck">
											<label class="custom-control-label" for="customCheck">Remember
												Me</label>
										</div>
									</div>
									<button class="btn btn-primary btn-user btn-block" type="submit">Login
									</button>
								</form>
								<div class="text-center mt-4">
									<a class="small" href="<?php echo base_url(); ?>registration">Create an Account!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once(APPPATH . 'views/layouts/footer.php') ?>
