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
                    <h4 class="card-title">Data Nama Genre</h4>
                  </div>
                  <div class="card-body">


				 <!-- ------------------------------------------------------------------------------ -->
<?php include('tambah.php'); ?>
<table class="table table-bordered" id="example2">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="50%">Nama</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($genre as $genre) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $genre['nama_genre'] ?></td>
			<td>
				<a href="<?php echo base_url('admin/genre/edit/'.$genre['id_genre']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/genre/delete/'.$genre['id_genre']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>

<!-- --------------------------------------------------------------------- -->

                  </div>
                </div>
              </div>

            

            
            </div>
          </div>
        </div>


