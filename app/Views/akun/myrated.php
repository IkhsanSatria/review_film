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
                
            <table class="table table-bordered" id="example2">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="30%">Judul Film</th>
                        <th>Nama User</th>
                        <th>Rating</th>
                        <th>Tanggal Rate</th>
                        <th width="5%"></th>
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
                        <td class="text-center">  <a href="<?php echo base_url('akun/delete_rated/'.$rating['id_rating']) ?>" class="btn redBtn" onclick="confirmation(event)" style="color:red"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>