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
                  <a href="#">Data Genre</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Genre</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Edit Nama Genre</h4>
                  </div>
                  <div class="card-body">


				 <!-- ------------------------------------------------------------------------------ -->

<?php 
echo form_open(base_url('admin/genre/edit/'.$genre['id_genre'])); 
echo csrf_field(); 
?>

<div class="form-group row">
	<label class="col-3">Nama Genre</label>
	<div class="col-9">
		<input type="text" name="nama_genre" class="form-control" placeholder="Nama Genre" value="<?php echo $genre['nama_genre'] ?>" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>

<!-- --------------------------------------------------------------------- -->

                  </div>
                </div>
              </div>

            

            
            </div>
          </div>
        </div>


