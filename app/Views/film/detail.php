<style type="text/css">
/* Modal background */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
  padding: 20px;
}

/* Modal content */
.modal-content {
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  width: 40%;
  max-width: 500px; /* Maksimum lebar modal */
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  text-align: center;
  position: relative;
}

/* Tombol close (X) */
.close {
  position: absolute;
  right: 15px;
  top: 10px;
  font-size: 24px;
  cursor: pointer;
}

/* Style input dan textarea */
.modal-content input,
.modal-content textarea {
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Style tombol */
button {
  padding: 10px 15px;
  margin-top: 10px;
  border: none;
  cursor: pointer;
  background-color: #007bff;
  color: white;
  border-radius: 5px;
}

button:hover {
  background-color: #0056b3;
}

/* 🔹 RESPONSIVE DESIGN */
@media (max-width: 768px) {
  .modal-content {
    width: 80%; /* Perbesar modal pada layar kecil */
    max-width: 400px;
  }
}

@media (max-width: 480px) {
  .modal-content {
    width: 90%;
    max-width: 350px;
  }

  .close {
    font-size: 20px;
    right: 10px;
    top: 5px;
  }
}

</style>      
<div class="hero mv-single-hero">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- <h1> movie listing - list</h1>
        <ul class="breadcumb">
          <li class="active"><a href="#">Home</a></li>
          <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
        </ul> -->
      </div>
    </div>
  </div>
</div>
<div class="page-single movie-single movie_single">
  <div class="container">
    <div class="row ipad-width2">
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="movie-img ">
          <img src="<?php echo base_url('assets/upload/image/'.$film['gambar_film']) ?>" alt="">
          <div class="movie-btn"> 
              <div> <span style="color: #fff;">Nonton Trailer</span></div>
             
          
          </div>

          <!-- Trailer Film (Embed YouTube) -->
                  <?php if (!empty($film['trailer'])): ?>
                      <div class="movie-trailer mt-3">
                          <iframe width="100%" height="250" 
                                  src="https://www.youtube.com/embed/<?= $film['trailer']; ?>" 
                                  frameborder="0" allowfullscreen>
                          </iframe>
                      </div>
                  <?php else: ?>
                      <p class="text-muted">Trailer belum tersedia.</p>
                  <?php endif; ?>
        </div>
         
      </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="movie-single-ct main-content">
          <h1 class="bd-hd"><?php echo $film['nama_film'] ?> <span><?php echo $film['tahun_rilis'] ?></span></h1>
          <div class="social-btn">
            <a href="#" class="parent-btn" id="favorite"><i class="ion-heart"  ></i> Add to Favorite</a>
            <div class="hover-bnt">
              <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
              <div class="hvr-item">
                <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
              </div>
            </div>    
          </div>

          <?php
            $filmRating = (isset($rating['average'])) ? round($rating['average'], 1) : 0;
            $totalReviews = (isset($rating['total'])) ? $rating['total'] : 0;
            $userRating = isset($user_rating['nilai_rating']) ? $user_rating['nilai_rating'] : 0;
          ?>


         <div class="movie-rate">
            <div class="rate">
                <i class="ion-android-star"></i>
                <p><span><?= $filmRating ?></span> /10<br>
                    <a href="<?php echo base_url('film/userRate/'.$film['id_film']);?>"><span class="rv"><?= $totalReviews ?> Rate</span> </a>
                </p>
            </div>
            <div class="rate-star">
                <p>Rate This Movie:</p>
                <div id="rating-stars">
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <i class="ion-ios-star<?= ($i <= $userRating) ? '' : '-outline' ?>" data-value="<?= $i ?>"></i>
                    <?php endfor; ?>

                </div>
            </div>
        </div>
          <div class="movie-tabs">
            <div class="tabs">
              <ul class="tab-links tabs-mv">
                <li class="active"><a href="#overview">Overview</a></li>
                <li><a href="#sinopsis">Sinopsis </a></li>
                <li><a href="#reviews"> Reviews</a></li>
                
              </ul>
                <div class="tab-content">
                <div id="overview" class="tab active">
                        <div class="row">
                          <div class="col-md-8 col-sm-12 col-xs-12">
                          <p> <?php echo $film['deskripsi'] ?></p>
                           <h2 style="font-size: 17px;"><u>Detail Film</u></h2>
                            <table class="table" style="color:#fff">
                                <tr>
                                  <td><b>Genre</b></td>
                                  <td><?php echo $film['nama_genre'] ?></td>
                                </tr>
                                <tr>
                                  <td><b>Negara</b></td>
                                  <td><?php echo $film['nama_negara'] ?></td>
                                </tr>
                                <tr>
                                  <td><b>Durasi</b></td>
                                  <td><?php echo $film['durasi'] ?> Menit</td>
                                </tr>
                                <tr>
                                  <td><b>Kategori Umur</b></td>
                                  <td><?php echo $film['kategori_umur'] ?></td>
                                </tr>
                                <tr>
                                  <td><b>Diupload Oleh</b></td>
                                  <td><?php echo $film['nama_user'] ?> (<?= $film['role'] ?>)</td>
                                </tr>
                              </table>
                       
                          </div>
                        </div>
                     </div>
                     


                    <div id="reviews" class="tab review">
                       <div class="row">
                          <div class="rv-hd">
                            <div class="div">
                              <h3>Komentar Tentang film</h3>
                            <h2><?= $film['nama_film'] ?></h2>
                            </div>
                            <?php if(!empty($id_user)){ ?>
                            <button class="redbtn" id="btnWrite">Write Review</button>
                          <?php } ?>
                          </div>
                          <div class="topbar-filter">
                      <p>Ada <span><?= $totalKomentar ?> reviews</span> </p>
                     
                    </div>
                    <?php foreach($review as $review): ?>
                    <div class="mv-user-review-item">
                      <div class="user-infor">
                        <img src="<?php echo base_url('assets/upload/user/')?>/<?php echo $review['gambar']==""?"user.jpg":$review['gambar'];?>" alt="Avatar User" style="border-radius:50%">
                        <div>
                          <h3><?php echo $review['nama_user'] ?></h3>
                          <p class="time">
                            <?php echo tgl_indo($review['created_at']) ?>
                          </p>
                        </div>
                      </div>
                      <p>
                      <?= $review['komentar'] ?>
                      </p>
                    </div>

                   <?php endforeach; ?>
                    <div class="topbar-filter">
                      
                    </div>
                        </div>
                    </div>
                    
                    <div id="media" class="tab">
                      <div class="row">
                        <div class="rv-hd">
                            <div>
                              <h3>Gambar-gambar Film</h3>
                            <h2><?= $film['nama_film'] ?></h2>
                            </div>
                         </div>
                         
                    <div class="title-hd-sm">
                      <h4>Gambar <span> (2)</span></h4>
                    </div>
                    <div class="mvsingle-item">
                      <a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image11.jpg" ><img src="images/uploads/image1.jpg" alt=""></a>
                      <a class="img-lightbox"  data-fancybox-group="gallery"  href="images/uploads/image21.jpg" ><img src="images/uploads/image2.jpg" alt=""></a>
                     
                    </div>
                      </div>
                    </div>
                    <div id="sinopsis" class="tab">
                      <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                          <?php if($film['sinopsis'] !=""){ ?>
                            <p><?php echo $film['sinopsis'] ?></p>
                          <?php }else{ ?>
                            <p>Belum Ada Sinopsis</p>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- <script>
document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll("#rating-stars i");

    stars.forEach(star => {
        star.addEventListener("click", function() {
            let rating = this.getAttribute("data-value");
            let filmId = <?= $film['id_film'] ?>;

            fetch("<?= base_url('film/simpan_rating') ?>", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_film=${filmId}&nilai_rating=${rating}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    updateStars(rating);
                } else {
                    alert(data.message);
                }
            });
        });
    });

    function updateStars(rating) {
        stars.forEach((star, index) => {
            star.classList.toggle("ion-ios-star", index < rating);
            star.classList.toggle("ion-ios-star-outline", index >= rating);
        });
    }
});
</script> -->
<!-- Modal untuk Menulis Review -->
<!-- Modal -->
<div id="reviewModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Beri Review</h2>
    
    <form id="reviewForm">
      <input type="hidden" id="filmId" name="id_film" value="<?= $film['id_film'] ?>">
      <label for="reviewText">Tulis Review Anda:</label>
      <textarea id="reviewText" name="review_text" rows="10" required></textarea>

      <button type="submit" class="redbtn">Kirim Review</button>
    </form>
  </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll("#rating-stars i");
    const favorite = document.getElementById("favorite");
    let filmId = <?= $film['id_film'] ?>;

    // Ambil rating user saat halaman dimuat
    fetch("<?= base_url('film/get_user_rating/') ?>" +"/"+ filmId)
    .then(response => response.json())
    .then(data => {
        if (data.rating > 0) {
            updateStars(data.rating);
        }
    });

    stars.forEach(star => {
        star.addEventListener("click", function() {
            let rating = this.getAttribute("data-value");

            fetch("<?= base_url('film/simpan_rating') ?>", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_film=${filmId}&nilai_rating=${rating}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    updateStars(rating);
                    alert("Terimakasih Telah Memberi Rating");
                } else {
                    alert(data.message);
                }
            });
        });
    });

    function updateStars(rating) {
        stars.forEach((star, index) => {
            star.classList.toggle("ion-ios-star", index < rating);
            star.classList.toggle("ion-ios-star-outline", index >= rating);
        });
    }
   
    favorite.addEventListener("click",function(){

      fetch("<?= base_url('akun/simpan_favorite') ?>", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_film=${filmId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'hapus') {
                    alert('Data Film telah dihapus dari daftar Favorite');
                } 
                else (data.status === 'success') 
                {
                    alert('Film berhasil ditambahkan ke favorite');
                }
            });
        });

  
    
    
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("reviewModal");
    const btnWrite = document.getElementById("btnWrite");
    const closeModal = document.querySelector(".close");

    // Tampilkan modal saat tombol diklik
    btnWrite.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    // Sembunyikan modal saat tombol (X) diklik
    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Sembunyikan modal saat klik di luar modal
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    // Kirim review via AJAX
    document.getElementById("reviewForm").addEventListener("submit", function (e) {
        e.preventDefault();
        
        let formData = new FormData(this);
        
        fetch("<?= base_url('film/simpanReview') ?>", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert("Review berhasil disimpan!");
                modal.style.display = "none";
                location.reload();
            } else {
                alert("Terjadi kesalahan, coba lagi.");
            }
        });
    });
});
</script>

