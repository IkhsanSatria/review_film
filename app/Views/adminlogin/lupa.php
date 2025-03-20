<?php 
use App\Models\Konfigurasi_model;
$konfigurasi  = new Konfigurasi_model;
$site         = $konfigurasi->listing();
?>
<html>
	<head>
		<title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
         <!-- Favicons -->
        <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="icon">
        <link href="<?php echo base_url('assets/upload/image/'.$site['icon']) ?>" rel="apple-touch-icon">
		<link rel="stylesheet" href="<?php echo base_url() ?>/assets/login/css/main.css"/>
		<link rel="stylesheet" href="<?php echo base_url() ?>/assets/login/css/bgimg.css"/>
		<link rel="stylesheet" href="<?php echo base_url() ?>/assets/login/css/bgimg-nosocial.css"/>
		<link rel="stylesheet" href="<?php echo base_url() ?>/assets/login/css/font.css"/>
		<link rel="stylesheet" href="<?php echo base_url() ?>/assets/login/css/font-awesome.min.css"/>
		<script type="text/javascript" src="<?php echo base_url() ?>/assets/login/js/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>/assets/login/js/main.js"></script>
		<!-- SWEETALERT -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
<body>
	
	<div class="background"></div>
	<div class="backdrop"></div>
	<div class="login-form-container" id="login-form">
		<div class="login-form-content">
			<div class="login-form-header">
				<div class="logo">
					<img src="<?php echo base_url('assets/upload/image/1683368692_1a4006f836503c5943e3.png'); ?>" width="120px">
				</div>
				<h3><?php echo $site['singkatan'];?> </h3>
				<h4><?php echo $site['namaweb'];?></h4>
				<p style="font-size: 16px;">Silahkan Masukkan Email Anda</p>
			</div>
		<?php
		 echo '<span class="text-danger">'.\Config\Services::validation()->listErrors().'</span>'; 
		 ?>
 
            <div class="card-body">
               
                <p style="line-height: 1.5;font-weight:200">Halaman ini digunakan untuk reset password Akun. Silakan isikan alamat email Anda pada form di bawah ini, kami akan mengirimkan password yang baru ke alamat email Anda
                </p>
                <?php
                    $attributes = ['class' => 'login-form']; 
                    echo form_open(base_url('adminlogin/lupa'),$attributes);
                ?>
                 <?= csrf_field() ?>
                 <div class="input-container">
					<i class="fa fa-email"></i>
					<input type="email" class="input" name="email" placeholder="Email" value="<?=set_value('email')?>" required/>
				</div>
                <div class="form-group" style="margin-top:30px">
                    <button type="submit" name="submit" value="submit" class="button" style="display:block;width:100%">Kirim</button>
                </div>
                <br>
                <p style="text-align:center"><a href="<?php echo base_url('adminlogin');?>" >Kembali Kehalaman Login</a></p>
                    <?php echo form_close(); ?>
            </div>
				
		</div>
		<div class="attibution">
			&copy; <?php echo date('Y'); ?><?php echo $site['namaweb'];?>
		</div>
	</div>
	<script>
<?php if($session->getFlashdata('sukses')) { ?>
// Notifikasi
swal ( "Berhasil" ,  "<?php echo $session->getFlashdata('sukses'); ?>" ,  "success" )
<?php } ?>

<?php if($session->getFlashdata('gagal')) { ?>
// Notifikasi
swal ( "Mohon maaf" ,  "<?php echo $session->getFlashdata('gagal'); ?>" ,  "warning" )
<?php } ?>

</script>
</body>
</html>