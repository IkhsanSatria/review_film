<!doctype html>
	<html lang="en">
	<head>
		<title>Website Review Film</title>
		<meta charset="utf-8">
		<link rel="icon" href="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
		<!-- SweetAlert2 -->
	  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>/assets/login/css/style.css">
	</head>

	<body style="background-color: #c5e1fc;">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 col-lg-10">
						<div class="wrap d-md-flex">
							<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
								<div class="text w-100">
									<p>
										<img src="<?php echo base_url('assets/upload/image/logoR.png');?>" alt="Logo Aplikasi"  style="max-height: 100px; width: auto;">
									</p>
									<h2 style="font-size:16px">Website Review Film</h2>
									<p>Review Film Gampang dan Mudah</p>
									
								</div>
							</div>
							<div class="login-wrap p-4 p-lg-5">
								<div class="d-flex">
									<div class="w-100">
										<h3 class="mb-4">Review Film</h3>
										<hr>
									</div>
									
								</div>

								<?php 
								$validation = \Config\Services::validation();
								$errors = $validation->getErrors();
								if(!empty($errors))
								{
									echo '<span class="text-danger">'.$validation->listErrors().'</span>';
								}
								?>

								<?php if (session('msg')) : ?>
									<div class="alert alert-info alert-dismissible">
										<?= session('msg') ?>
										<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
									</div>
								<?php endif ?>

								<?php echo form_open(base_url('adminlogin'), 'class="signin-form"'); ?>

								<input type="hidden" name="pengalihan" value="<?php echo Session()->get('pengalihan'); ?>">

								<div class="form-group mb-3">
									<label class="label" for="name">Email</label>
									<input type="email" name="email" class="form-control" placeholder="Email" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary submit  px-3">Login</button>
								</div>
								
								<p class="text-center">
									Kembali ke <a href="<?php echo base_url() ?>">Beranda</a> | Lupa Password? <a href="<?php echo base_url('adminlogin/lupa') ?>">Reset</a>
								</p>
							
							<?php echo form_close(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url() ?>/assets/login/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/login/js/popper.js"></script>
	<script src="<?php echo base_url() ?>/assets/login/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/login/js/main.js"></script>
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url() ?>/assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script>
	<?php if(isset($_GET['logout'])) { ?>
		Swal.fire({
		  icon: 'success',
		  heightAuto: false,
		  timer: 2000,
		  title: 'Sukses...',
		  text: 'Anda berhasil logout.',
		})
	<?php }if(Session()->getFlashdata('warning')) { ?>
	// Notifikasi
	Swal.fire({
	  icon: 'warning',
	  title: 'Oops...',
	  timer: 3000,
	  heightAuto: false,
	  text: '<?php echo Session()->getFlashdata('warning'); ?>',
	})
	<?php } ?>
	<?php if(Session()->getFlashdata('sukses')) { ?>
	// Notifikasi
	Swal.fire({
	  icon: 'success',
	  heightAuto: false,
	  timer: 2000,
	  title: 'Alhamdulillah...',
	  text: '<?php echo Session()->getFlashdata('sukses'); ?>',
	})
	<?php } ?>
	</script>
</body>
</html>

