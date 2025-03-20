
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> <?php echo $session->getFlashdata("warning"); ?></h1>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog detail section-->
<div class="page-single">
	<div class="container">
		<div class="row">
				<p class="text-center">Periksa Kembali email atau Password Akun Anda. Jika Ada kendala Hubungi Admin</p>

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
 
 