<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> movie listing - grid</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span><a href="<?php echo base_url('film')?>">Movie</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Genre</li>
						<li> <span class="ion-ios-arrow-right"></span><?= $menu ?></li>
					</ul>
				</div>
			</div>
		</div>  
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p>Found <span>5 Movies</span> in total</p> 
				</div>
				<div class="flex-wrap-movielist">
          <?php    
            use App\Models\Rating_model;
            $m_rating = new Rating_model();

          ?>
          <?php foreach ($film as $film): 
            $rating = $m_rating->getFilmRating($film['id_film']);
            $filmRating = (isset($rating['average'])) ? round($rating['average'], 1) : 0;
            ?>
						<div class="movie-item-style-2 movie-item-style-1">
							<img src="<?php echo base_url('assets/upload/image/'.$film['gambar_film'])?>" alt="">
							<div class="hvr-inner">
	            				<a  href="<?php echo base_url('film/detail/'.$film['id_film'])  ?>">Lihat Detail <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="<?php echo base_url('film/detail/'.$film['id_film'])  ?>"><?= $film['nama_film'] ?></a></h6>
								<p class="rate"><i class="ion-android-star"></i><span><?=$filmRating?></span> /10 (views <?= $film['hits'] ?> kali)</p>
							</div>
						</div>	
          <?php endforeach; ?>

						
				</div>		
				<div class="topbar-filter">
					
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="searh-form">
						<h4 class="sb-title">Cari Film</h4>
						<form class="form-style-1" action="<?php echo base_url('film/cariFilm');?>" method="GET">
							<div class="row">
								<div class="col-md-12 form-it">
									<label>Nama Film/Judul Film</label>
									<input type="text" name="keyword" placeholder="Enter keywords">
								</div>
								<div class="col-md-12 form-it">
									<label>Genres</label>
									<div class="group-ip">
										<select
											name="genre" multiple="" class="ui fluid dropdown">
											<option value="">Pilih genres</option>
											<?php foreach($genre2 as $g): ?>
												<option value="<?= $g['id_genre'] ?>"><?= $g['nama_genre'] ?></option>
											<?php endforeach;?>
										</select>
									</div>	
								</div>
								
								<div class="col-md-12 form-it">
									<label>Tahun Rilis</label>
									<div class="row">
										
										<div class="col-md-12">
										<input type="number" name="tahun" placeholder="Tahun Rilis">

										</div>
									</div>
								</div>
								<div class="col-md-12 ">
									<input class="submit" type="submit" value="submit">
								</div>
							</div>
						</form>
					</div>
					
				
				
				</div>
			</div>
		</div>
	</div>
</div>

<script>
 const sortFilm = document.getElementById("sort");
 sortFilm.onchange = function(){
   const sort = sortFilm.value;

 }

</script>
