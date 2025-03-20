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
                  <a href="<?php echo base_url('admin/user');?>">Data User</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">User Author</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"><?= $title ?></h4>
                  </div>
                  <div class="card-body">


				 <!-- ------------------------------------------------------------------------------ -->


                  	
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Nama</th>
			<th width="20%">Email</th>
			<th width="15%">Usia</th>
			<th width="12%">Role</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($user as $user) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $user['name'] ?></td>
			<td><?php echo $user['email'] ?></td>
			<td><?php echo $user['usia'] ?></td>
			<td><?php echo $user['role'] ?></td>
			<td>
				<a href="<?php echo base_url('admin/user/edit/'.$user['id_user']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/user/delete/'.$user['id_user']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>



   </div>
        </div>
      </div>

    

    
    </div>
  </div>
</div>
