<div class="col-md-3 col-sm-12 col-xs-12">
                <div class="user-information">
                    <div class="user-img">
                        <?php if($user['gambar']==""){ ?>
                        <a href="#"><img src="<?php echo base_url('assets/upload/user/user_default.png') ?>" alt=""><br></a>
                        <?php }else{?>
                           <a href="<?php echo base_url('akun');?>"><img width=180 height=180 src="<?php echo base_url('assets/upload/user/'.$user['gambar']) ?>" alt="" style="border-radius:50%"><br></a> 
                        <?php } ?>
                    </div>
                    <div class="user-fav">
                        <ul>
                            <li  <?php if($aktif==1){ ?> class="active" <?php } ?>><a href=<?php echo base_url('akun');?>>Profile</a></li>
                            <li <?php if($aktif==5){ ?> class="active" <?php } ?>><a href=<?php echo base_url('akun/myreview');?>>Review movies</a></li>
                            <li <?php if($aktif==3){ ?> class="active" <?php } ?>><a href=<?php echo base_url('akun/myrated');?>>Rated movies</a></li>
                            <li <?php if($aktif==4){ ?> class="active" <?php } ?>><a href=<?php echo base_url('akun/myfavorite');?>>My Favorite movies</a></li>

                            <?php if($session->get('role')=='author'){ ?>
                                <li <?php if($aktif==2){ ?> class="active" <?php } ?>><a href="<?php echo base_url('akun/mymovies'); ?>">My Movies</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="user-fav">
                        <p>Others</p>
                        <ul>
                            <li <?php if($aktif==6){ ?> class="active" <?php } ?>><a href="<?php echo base_url('akun/ubahpassword');?>">Change password</a></li>
                            <li><a href="<?php echo base_url('akun/logout')?>">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>