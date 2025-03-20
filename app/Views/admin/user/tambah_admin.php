<p>
	<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-default">
		<i class="fa fa-plus"></i> Tambah Baru
	</button>
</p>
<?php 
echo form_open(base_url('admin/user/admin')); 
echo csrf_field(); 
?>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Baru</h4>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				
				<div class="form-group row">
					<label class="col-3">Nama Lengkap</label>
					<div class="col-9">
						<input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('name') ?>" required>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-3">Email</label>
					<div class="col-9">
						<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">usia</label>
					<div class="col-9">
						<input type="text" name="usia" class="form-control" placeholder="usia" value="<?php echo set_value('usia') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Password</label>
					<div class="col-9">
						<input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
					</div>
				</div>
				
				
				
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php echo form_close(); ?>