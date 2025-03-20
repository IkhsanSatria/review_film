

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1><?= $title ?></h1>
					<ul class="breadcumb">
						<li class="active"><a href="<?php echo base_url('home');?>">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Rated movies</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width2">
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="topbar-filter">
				<p>Found <span>14 Movies</span> in total</p> 
				</div>
                <?php foreach($rate as $rate): ?>
				<div class="movie-item-style-2 userrate">
				<img src="<?php echo base_url('assets/upload/user/')?>/<?php echo $rate['gambar']==""?"user.jpg":$rate['gambar'];?>" alt="Avatar User" style="border-radius:50%">
				<div class="mv-item-infor">
						<h6><a href="#"><?= $rate['nama_user'] ?></a> (<?= $rate['role'] ?>)</h6>
                        <div class="rate">
                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                <i class="ion-ios-star<?= ($i <= $rate['nilai_rating']) ? '' : '-outline' ?>" data-value="<?= $i ?>"></i>
                         <?php endfor; ?>
						</div>		
                        <p class="time sm"><?= tgl_indo($rate['created_at']) ?></p>
					</div>
				</div>
                <?php endforeach;?>
				
				<div class="topbar-filter">
					
				</div>
			</div>
		</div>
	</div>
</div>
