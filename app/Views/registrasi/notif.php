
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> <?php echo $session->getFlashdata("sukses"); ?></h1>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog detail section-->
<div class="page-single">
	<div class="container">
		<div class="row">
				<p class="text-center">Selamat Anda Berhasil Registrasi. Silahkan <span style="font-size: 14px;font-weight: bold;"><a href="#" class="loginLink"> Login</a></span> dengan Akun anda</p>

		</div>
	</div>
</div>
 
 <script>
	 <?php if ($session->getFlashdata("sukses")) { ?>
	// Notifikasi
	swal ( "Berhasil" ,  "<?php echo $session->getFlashdata("sukses"); ?>" ,  "success" )
	<?php } ?>
	
	 <?php if ($session->getFlashdata("warning")) { ?>
	// Notifikasi
	swal ( "Mohon maaf" ,  "<?php echo $session->getFlashdata("warning"); ?>" ,  "warning" )
	<?php } ?>
 </script>
 
 