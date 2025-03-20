<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">APLIKASI REVIEW FILM</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">My Profil</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Profil</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Data Profil</h4>
                  </div>
                  <div class="card-body">


				 <!-- ------------------------------------------------------------------------------ -->
<div class="row">
	<div class="col-3">
		<img src="<?php if($user['gambar']=="") { echo base_url('assets/upload/image/noimage.png'); }else{ echo base_url('assets/upload/user/'.$user['gambar']); } ?>" class="img img-thumbnail">
	</div>
	<div class="col-9">
		<form action="<?php echo base_url('admin/akun') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<?php 
			echo csrf_field(); 
			?>
			<input type="hidden" name="id_user" value="<?php echo $user['id_user'] ?>">
			<div class="form-group row">
				<label class="col-3">Nama Pengguna</label>
				<div class="col-9">
					<input type="text" name="name" class="form-control" placeholder="Nama user" value="<?php echo $user['name'] ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3">Usia</label>
				<div class="col-9">
					<input type="text" name="usia" class="form-control" placeholder="Usia user" value="<?php echo $user['usia'] ?>" >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3">Email</label>
				<div class="col-9">
					<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user['email'] ?>" required>
				</div>
			</div>

			
			<div class="form-group row">
				<label class="col-3">Password</label>
				<div class="col-9">
					<input type="text" name="password" class="form-control" placeholder="Password" value="">
					<small class="text-danger">Minimal 6 karakter dan maksimal 32 karakter atau biarkan kosong</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3">Akses Level</label>
				<div class="col-9">
					<input type="text" name="role" class="form-control" placeholder="Role" value="<?php echo $user['role'] ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3">Profil Admin</label>
				<div class="col-9">
					<textarea name="profil" class="form-control konten"><?php echo $user['profile'] ?></textarea>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-3">Upload Foto profil</label>
				<div class="col-9">
					<input type="file" name="gambar" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-3"></label>
				<div class="col-9">
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>

<!-- --------------------------------------------------------------------------------- -->

 </div>
        </div>
      </div>

    

    
    </div>
  </div>
</div>