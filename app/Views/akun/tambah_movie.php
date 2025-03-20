<style>
    label{
        color:#fff
    }
</style>
<?php include("head.php");?>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <?php include("sidebar.php");?>
            <div class="col-md-9 col-sm-12 col-xs-12">
            <form action="<?php echo base_url('akun/tambah_movie') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<div class="form-group row">
	<label class="col-md-2">Judul/Nama Film</label>
	<div class="col-md-10">
		<input type="text" name="nama_film" class="form-control" value="<?php echo set_value('nama_film') ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Upload Gambar</label>
	<div class="col-md-10">
		<input type="file" name="gambar_film" class="form-control" value="<?php echo set_value('gambar_film') ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Kategori Umur</label>
	<div class="col-md-4">
		<select name="kategori_umur" class="form-control">
			<option value="">Pilih Kategori Umur</option>
			<option value="Anak">Anak</option>
			<option value="Dewasa">Dewasa</option>
			<option value="Anak dan Dewasa">Anak dan Dewasa</option>
		</select>
	</div>
	
</div>

<div class="form-group row">
	<label class="col-md-2">Genre Film</label>
	<div class="col-md-4">
		<select name="genre" class="form-control" required>
			<option value="">Pilih Genre Film</option>
			<?php foreach ($genre as $g) { ?>
			<option value="<?= $g['id_genre'] ?>"><?= $g['nama_genre'] ?></option>
			
		<?php	} ?>
		</select>
	</div>
	
</div>
<div class="form-group row">
		<label class="col-md-2">Negara Asal Film</label>

<div class="col-md-4">
		<select name="negara" class="form-control" required>
			<option value="">Pilih Negara Asal Film</option>
			<?php foreach ($negara as $n) { ?>
			<option value="<?= $n['id_negara'] ?>"><?= $n['nama_negara'] ?></option>
			
		<?php	} ?>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Durasi (Menit)</label>
	<div class="col-md-4">
		<input type="number" name="durasi" class="form-control" value="<?php echo set_value('durasi') ?>" >
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Tahun Rilis</label>
	<div class="col-md-4">
		<input type="text" name="tahun_rilis" class="form-control" value="<?php echo set_value('tahun_rilis') ?>" >
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2">Link Trailer</label>
	<div class="col-md-4">
		<input type="text" name="trailer" class="form-control" value="<?php echo set_value('trailer') ?>" >

	</div>
	<small>*contoh : https://www.youtube.com/watch?v=<strong>GR1EmTKAWIw</strong>, yang dipakai adalah yang huruf Tebal saja</small>
</div>
<div class="form-group row">
	<label class="col-md-2">Deskripsi Singkat</label>
	<div class="col-md-10">
		<textarea name="deskripsi" class="form-control konten"><?php echo set_value('deskripsi') ?></textarea>
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2">Sinopsis Film</label>
	<div class="col-md-10">
		<textarea name="sinopsis" class="form-control konten"><?php echo set_value('sinopsis') ?></textarea>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2"></label>
	<div class="col-md-10">
		<button type="submit" class="redbtn"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>      
        </div>
        </div>
    </div>
</div>