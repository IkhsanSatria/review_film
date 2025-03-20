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
            <form action="<?php echo base_url('akun/edit_movie/'.$film['id_film']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<div class="form-group row">
	<label class="col-md-2">Judul/Nama Film</label>
	<div class="col-md-10">
		<input type="text" name="nama_film" class="form-control" value="<?= $film['nama_film'] ?>" required>
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2">Gambar Film</label>
	<div class="col-md-10">
		<?php if($film['gambar_film']==""){ ?>
			<img src="<?php echo base_url('assets/upload/image/noimage.png');?>" alt="Gambar Film">
			<?php }else{ ?>	
		<img src="<?php echo base_url('assets/upload/image/'.$film['gambar_film']);?>" alt="Gambar Film">
		
		<?php } ?>
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2">Upload Gambar</label>
	<div class="col-md-10">
		<input type="file" name="gambar_film" class="form-control">
		<small><i>*Kosongkan saja Jika Gambar tidak Diganti</i></small>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Kategori Umur</label>
	<div class="col-md-4">
		<select name="kategori_umur" class="form-control">
			<?php if($film['kategori_umur'] ==""){ ?>
			<option value="">Pilih Kategori Umur</option>
		<?php }else{ ?>
			<option value="Anak" <?php if($film['kategori_umur']=="Anak"){echo "selected";} ?>>Anak</option>
			<option value="Dewasa" <?php if($film['kategori_umur']=="Dewasa"){echo "selected";} ?>>Dewasa</option>
			<option value="Anak dan Dewasa" <?php if($film['kategori_umur']=="Anak dan Dewasa"){echo "selected";} ?>>Anak dan Dewasa</option>
		<?php } ?>
		</select>
	</div>
	
</div>

<div class="form-group row">
	<label class="col-md-2">Genre Film</label>
	<div class="col-md-4">
		<select name="genre" class="form-control">
			<option value="">Pilih Genre Film</option>
			<?php foreach ($genre as $g) { ?>
			<option value="<?= $g['id_genre'] ?>" <?php if($g['id_genre']==$film['genre']){ echo "selected";} ?>><?= $g['nama_genre'] ?></option>
			
		<?php	} ?>
		</select>
	</div>
	
</div>
<div class="form-group row">
		<label class="col-md-2">Negara Asal Film</label>

<div class="col-md-4">
		<select name="negara" class="form-control">
			<option value="">Pilih Negara Asal Film</option>
			<?php foreach ($negara as $n) { ?>
			<option value="<?= $n['id_negara'] ?>" <?php if($n['id_negara']==$film['negara']){ echo "selected";} ?>><?= $n['nama_negara'] ?></option>
			
		<?php	} ?>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Durasi (Menit)</label>
	<div class="col-md-4">
		<input type="number" name="durasi" class="form-control" value="<?= $film['durasi'] ?>" >
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Tahun Rilis</label>
	<div class="col-md-4">
		<input type="text" name="tahun_rilis" class="form-control" value="<?= $film['tahun_rilis'] ?>" >
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2">Link Trailer</label>
	<div class="col-md-4">
		<input type="text" name="trailer" class="form-control" value="<?= $film['trailer'] ?>" >
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2">Deskripsi Singkat</label>
	<div class="col-md-10">
		<textarea name="deskripsi" class="form-control konten"><?= $film['deskripsi'] ?></textarea>
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2">Sinopsis Film</label>
	<div class="col-md-10">
		<textarea name="sinopsis" class="form-control konten"><?= $film['sinopsis']?></textarea>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2"></label>
	<div class="col-md-2">
		<a href="<?php echo base_url('akun/mymovies') ?>" class="btn btn-danger"><i class="fa fa-chevron-left"></i> Kembali</a>
	</div>
	<div class="col-md-2">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>      
        </div>
        </div>
    </div>
</div>