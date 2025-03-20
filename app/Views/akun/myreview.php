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
                
                <<table class="table table-bordered" id="example2">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Judul Film</th>
                            <th>Nama User</th>
                            <th>Komentar</th>
                            <th>Tanggal Komen</th>
                            <th> Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($komentar as $komentar) { ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $komentar['nama_film'] ?></td>
                            <td><?php echo $komentar['nama_user'];?></td>
                            <td><?php echo $komentar['komentar'];?></td>
                            <td><?php echo tgl_indo($komentar['created_at']) ?></td>
                            
                            <td class="text-center">  <a href="<?php echo base_url('akun/delete_review/'.$komentar['id_komentar']) ?>" class="btn redBtn" onclick="confirmation(event)" style="color:red"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>