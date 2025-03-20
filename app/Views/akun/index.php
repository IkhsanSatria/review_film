<?php include("head.php");?>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <?php include("sidebar.php");?>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="form-style-1 user-pro" action="#">
                    <form action="<?php echo base_url('akun');?>" class="user" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                        <h4>01. Profile details</h4>
                        <div class="row">
                            <div class="col-md-6 form-it">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" value="<?= $user['name'] ?>" required>
                            </div>
                            <div class="col-md-6 form-it">
                                <label>Email Address</label>
                                <input type="text" name="email" value="<?= $user['email'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-it">
                                <label>Usia</label>
                                <input type="number" name="usia" value="<?= $user['usia']?>" required>
                            </div>
                            <div class="col-md-6 form-it">
                                <label>Profil Singkat</label>
                                <input type="text" name="profile" value="<?= $user['profile']?>" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-it">
                                <label>Ganti Foto Profil</label>
                                <input type="file" name="gambar">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input class="submit" type="submit" value="save">
                            </div>
                        </div>  
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>