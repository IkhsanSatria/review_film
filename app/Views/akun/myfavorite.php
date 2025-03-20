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

			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p>Found <span><?= $total ?> movies</span> in total</p> 
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
								<p class="rate"><i class="ion-android-star"></i><span><?=$filmRating?></span> /10</p>
							</div>
						</div>	
          <?php endforeach; ?>

						
				</div>		
				
			</div>
			
		</div>
	</div>
</div>