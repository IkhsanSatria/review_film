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
                  <a href="#">Data Film</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Film</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Data Film</h4>
                  </div>
                  <div class="card-body">


				 <!-- ------------------------------------------------------------------------------ -->

<p>
	<a href="<?php echo base_url('admin/film/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="15%">Gambar</th>
			<th width="30%">Nama Film</th>
			<th width="16%">Tahun Rilis</th>
			<th>Kategori Umur</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($film as $film) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td>
				<?php if($film['gambar_film']=="") { echo '-'; }else{ ?>
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$film['gambar_film']) ?>" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td><a href="<?php echo base_url('admin/film/edit/'.$film['id_film']) ?>">
					<?php echo $film['nama_film'] ?>
				</a>
				<small>
					<br><i class="fa fa-eye"></i> View: <?php echo $film['hits'] ?>
					<br><i class="fa fa-list"></i> Genre: <?php echo $film['nama_genre'] ?>
					<br><i class="fa fa-globe"></i> Negara: <?php echo $film['nama_negara'] ?>
					<br><i class="fa fa-clock"></i> Durasi: <?php echo $film['durasi'] ?> Menit

				</small>
			</td>
			<td>
				<?php echo $film['tahun_rilis']; ?>
			</td>
			<td><?php echo $film['kategori_umur'] ?></td>
			<td>
				<a href="<?php echo base_url('admin/film/edit/'.$film['id_film']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/film/delete/'.$film['id_film']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>


<!-- --------------------------------------------------------------------------------- -->

 </div>
        </div>
      </div>

    

    
    </div>
  </div>
</div>