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
                  <a href="#"><?= $user['role']=="admin"?"Edit User Admin":"Edit User"; ?></a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#"><?= $user['role']=="admin"?"User Admin":"User"; ?></a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"><?= $user['role']=="admin"?"Edit User Admin":"Edit User"; ?></h4>
                  </div>
                  <div class="card-body">


				 <!-- ------------------------------------------------------------------------------ -->

<?php
echo form_open(base_url('admin/user/edit/'.$user['id_user'])); 
echo csrf_field(); 
?>
					
			
				<div class="form-group row">
					<label class="col-3">Nama Lengkap</label>
					<div class="col-9">
						<input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="<?php echo $user['name'] ?>" required <?= $user['role']=="admin"?"":"readonly"; ?>>
					</div>
				</div>
				
				
				<div class="form-group row">
					<label class="col-3">Email</label>
					<div class="col-9">
						<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user['email'] ?>" required <?= $user['role']=="admin"?"":"readonly"; ?>>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">usia</label>
					<div class="col-9">
						<input type="number" name="usia" class="form-control" placeholder="usia" value="<?php echo $user['usia'] ?>" <?= $user['role']=="admin"?"":"readonly"; ?> >
					</div>
				</div>
				<?php if($user['role']!="admin"){ ?>
				<div class="form-group row">
					<label class="col-3">Role</label>
					<div class="col-9">
						<select name="role" class="form-control" required>
							<option value="">Pilih Role</option>
							<option value="subscriber" <?php if($user['role']=="subscriber"){ echo "selected"; } ?>>Subscriber</option>
							<option value="author" <?php if($user['role']=="author"){ echo "selected"; } ?>>Author</option>
						</select>
					</div>
				</div>
				<?php } ?>

				<?php if($user['role']=="admin"){ ?>
				<div class="form-group row">
					<label class="col-3">Password</label>
					<div class="col-9">
					<input type="password" name="password" class="form-control" placeholder="Password">
					<small>Password Minimal 6 Karakter. Jika Password tidak diubah maka biarkan kosong!</small>
					</div>
				</div>
				<?php } ?>
			
				

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
	</div>
</div>

<?php echo form_close(); ?>

	<!-- ----------------------------------------------------- -->
</div>
        </div>
      </div>

    

    
    </div>
  </div>
</div>
