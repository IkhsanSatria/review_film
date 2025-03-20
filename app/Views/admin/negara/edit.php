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
                  <a href="#">Data Negara</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Negara</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Edit Nama Negara</h4>
                  </div>
                  <div class="card-body">


				 <!-- ------------------------------------------------------------------------------ -->

<?php 
echo form_open(base_url('admin/negara/edit/'.$negara['id_negara'])); 
echo csrf_field(); 
?>

<div class="form-group row">
	<label class="col-3">Nama Negara</label>
	<div class="col-9">
		<input type="text" name="nama_negara" class="form-control" placeholder="Nama Negara" value="<?php echo $negara['nama_negara'] ?>" required>
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


