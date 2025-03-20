<style>
    .table{
        color:#fff
    }
</style>
<?php include("head.php");?>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <?php include("sidebar.php");?>
            <div class="col-md-9 col-sm-12 col-xs-12">
            <p style="margin-bottom: 20px">
                <a href="<?php echo base_url('akun/tambah_movie') ?>" class="redbtn">
                    <i class="fa fa-plus"></i> Tambah Baru
                </a>
            </p>
            <?php if($total==0){ ?>
                <div class="alert alert-warning text-center">
                    Anda belum memiliki film yang diinputkan
                </div>
            <?php }else{ ?>
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Gambar</th>
                        <th width="30%">Nama Film</th>
                        <th width="16%">Tahun Rilis</th>
                        <th>Kategori Umur</th>
                        <th>Lihat Details</th>
                        <!-- <th>Edit</th> -->
                        <th>Delete</th>

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
                        <a href="<?php echo base_url('film/detail/'.$film['id_film']) ?>" class="btn redBtn" style="color:blue"><i class="fa fa-eye"></i></a>
                        </td>
                        <!-- <td>
                        <a href="<?php echo base_url('akun/edit_movie/'.$film['id_film']) ?>" class="btn redBtn" style="color:white"><i class="fa fa-edit"></i></a>
                        </td> -->
                        <td>
                        <a href="<?php echo base_url('akun/delete_movie/'.$film['id_film']) ?>" class="btn redBtn" onclick="confirmation(event)" style="color:red"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>    
            <?php } ?>      
        </div>
        </div>
    </div>
</div>