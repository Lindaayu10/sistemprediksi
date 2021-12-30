<?php require_once(APPPATH . 'views/layouts/header.php') ?>
<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
						</div>
						<form class="user" action="<?= base_url('/Registration/store') ?>" method="post">
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="name" name="nama" placeholder="Enter full name">
								<div class="invalid-feedback">
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
							</div>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="User Name">
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Register Account
							</button>
						</form>
						<div class="text-center mt-4">
							<a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once(APPPATH . 'views/layouts/footer.php') ?>
