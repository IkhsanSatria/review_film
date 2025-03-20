<?php 
use App\Models\Film_model;
use App\Models\Rating_model;

$m_film = new Film_model();
$film_terbaru = $m_film->listingterbaru();
 $m_rating = new Rating_model();
?>
<div class="slider movie-items">
	<div class="container">
		<div class="row">
			<div class="social-link">
				<p>Follow us: </p>
				<a href="https://www.facebook.com/facebook/?locale=id_ID"><i class="ion-social-facebook"></i></a>
				<a href="https://x.com/"><i class="ion-social-twitter"></i></a>
				<a href="https://www.google.co.id/?hl=id"><i class="ion-social-googleplus"></i></a>
				<a href="https://www.youtube.com/user/YouTube"><i class="ion-social-youtube"></i></a>
			</div>
	    	<div  class="slick-multiItemSlider">
	    		<?php foreach ($film_terbaru as $filmTerbaru) : ?>
	    	   		
	    	   	<?php 
	    	   	$rating = $m_rating->getFilmRating($filmTerbaru['id_film']); 
	    	   	$filmRating = (isset($rating['average'])) ? round($rating['average'], 1) : 0;

	    	   	?>

		    		<div class="movie-item">
		    			<div class="mv-img">
		    				<a href="<?php echo base_url('film/detail/'.$filmTerbaru['id_film']) ?>"><img src="<?php echo base_url('assets/upload/image/'.$filmTerbaru['gambar_film']) ?>" alt="" width="285" height="437"></a>
		    			</div>
		    			<div class="title-in">
		    				<div class="cate">
		    					<span class="blue"><a href="<?php echo base_url('film/genre/'.$filmTerbaru['genre']) ?>"><?= $filmTerbaru['nama_genre'] ?></a></span>
		    				</div>
		    				<h6><a href="<?php echo base_url('film/detail/'.$filmTerbaru['id_film']) ?>"><?= $filmTerbaru['nama_film'] ?></a></h6>
		    				<p><i class="ion-android-star"></i><span><?= $filmRating ?></span> /10</p>
		    			</div>
		    		</div>
	    		<?php endforeach; ?>
		
	    	</div>
	    </div>
	</div>
</div>
<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<div class="title-hd">
					<h2>Film Popular</h2>
					<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					
				    <div class="tab-content">
				        <div id="tab1" class="tab active">
				            <div class="row">
				            	<div class="slick-multiItem">
				            		<?php foreach($filmpopular as $fp):?>

			            			<?php 
	    							   	$ratingFp = $m_rating->getFilmRating($fp['id_film']); 
	    	   							$fpRating = (isset($ratingFp['average'])) ? round($ratingFp['average'], 1) : 0;

	    						   	?>

				            		<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="<?php echo base_url('assets/upload/image/'.$fp['gambar_film']) ?>" alt="" width="185" height="284">
					            			</div> 
					            			<div class="hvr-inner">
					            				<a  href="<?php echo base_url('film/detail/'.$fp['id_film']) ?>"> Read more <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="<?php echo base_url('film/detail/'.$fp['id_film']) ?>"><?php echo $fp['nama_film'] ?></a></h6>
					            				<p><i class="ion-android-star"></i><span><?= $fpRating ?></span> /10</p>
					            			</div>
					            		</div>
				            		</div>
				            	<?php endforeach; ?>
						
				            	</div>
				            </div>
				        </div>
				       
				      
			       	 	
				    </div>
				</div>


				
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					
					<div class="celebrities">
						<h4 class="sb-title">10 Subscriber Terbaru</h4>
						<?php foreach($subscriberterbaru as $st):?>
						<div class="celeb-item">
							<a href="#"><img src="<?php echo base_url('assets/upload/user/user_default.png') ?>" alt="" width="70" height="70"></a>
							<div class="celeb-author">
								<h6><a href="#"><?= $st['name'] ?></a></h6>
								<span><?= $st['role'] ?></span>
							</div>
						</div>
						<?php endforeach; ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--end of latest new v1 section-->


