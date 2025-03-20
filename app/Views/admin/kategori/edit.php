<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3"><?php echo $title;?></h3>
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
                  <a href="#">Kategori Laporan</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Edit Kategori</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"><?php echo $title;?></h4>
                  </div>
                  <div class="card-body">


				  <form action="<?php echo base_url('admin/kategori/edit/'.$kategori['id_kategori']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
					<?php 
					echo csrf_field(); 
					?>

					<div class="form-group row">
						<label class="col-3">Nama Kategori</label>
						<div class="col-9">
							<input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?php echo $kategori['nama_kategori'] ?>" required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-3">Nomor urut</label>
						<div class="col-9">
							<input type="number" name="urutan" class="form-control" placeholder="Nomor urut" value="<?php echo $kategori['urutan'] ?>" required>
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
              </div>

            

            
            </div>
          </div>
        </div>