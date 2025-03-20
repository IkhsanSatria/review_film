<style>
    .ion-ios-star{
        color: #f1c40f;
    }
    .ion-ios-star-outline{
        
    }
    .rate{
        font-size: 14px;
    }
</style>
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
                  <a href="#">Data Rating</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Rating</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"><?= $title;?></h4>
                  </div>
                  <div class="card-body">


				 <!-- ------------------------------------------------------------------------------ -->
<table class="table table-bordered" id="example2">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="30%">Judul Film</th>
            <th>Nama User</th>
            <th>Rating</th>
            <th>Tanggal Rate</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($rating as $rating) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $rating['nama_film'] ?></td>
      <td><?php echo $rating['nama_user'];?></td>
      <td>
        <div class="rate">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                      <i class="ion-ios-star<?= ($i <= $rating['nilai_rating']) ? '' : '-outline' ?>" data-value="<?= $i ?>"></i>
                <?php endfor; ?>
				</div>
      </td>
      <td><?php echo tgl_indo($rating['created_at']) ?></td>
			<td>
				<a href="<?php echo base_url('admin/rating/delete/'.$rating['id_rating']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
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


