<p>
	<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-default">
		<i class="fa fa-plus"></i> Tambah Baru
	</button>
</p>
<?php 
echo form_open(base_url('admin/negara')); 
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
					<label class="col-3">Nama Negara</label>
					<div class="col-9">
						<input type="text" name="nama_negara" class="form-control" placeholder="Nama Negara" value="<?php echo set_value('nama_negara') ?>" required>
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