<?php 
use App\Models\Genre_model;
use App\Models\Negara_model;

$m_negara = new Negara_model();
$m_genre = new Genre_model();
$genre = $m_genre->listing();
$negara = $m_negara->listing();
$session = \Config\Services::session();

?>
<!-- BEGIN | Header -->
<header class="ht-header">
  <div class="container">
    <nav class="navbar navbar-default navbar-custom">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header logo">
            <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <div id="nav-icon1">
              <span></span>
              <span></span>
              <span></span>
            </div>
            </div>
            <a href="index-2.html"><img class="logo" src="<?php echo base_url('assets/upload/image/logoR.png') ?>" alt="" width="119" height="58"></a>
          </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav flex-child-menu menu-left">
            <li class="hidden">
              <a href="#page-top"></a>
            </li>
            <li class="dropdown first">
              <a href="<?php echo base_url('home'); ?>" class="btn btn-default dropdown-toggle lv1">
              Home 
              </a>
              
            </li>
            <li class="dropdown first">
              <a href="<?php echo base_url('film')?>" class="btn btn-default dropdown-toggle lv1">
              movies
              </a>
              
            </li>
            <li class="dropdown first">
              <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
              Genre <i class="fa fa-angle-down" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu level1">
                <?php foreach ($genre as $g): ?>
              
                <li><a href="<?php echo base_url('film/genre/'.$g['id_genre']) ?>"><?= $g['nama_genre'] ?></a></li>
                
                <?php endforeach; ?>
              </ul>
            </li>
            <li class="dropdown first">
              <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
              Negara <i class="fa fa-angle-down" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu level1">
                <?php foreach ($negara as $n): ?>
              
                <li><a href="<?php echo base_url('film/negara/'.$n['id_negara']) ?>"><?= $n['nama_negara'] ?></a></li>
                
                <?php endforeach; ?>
              </ul>
            </li>
            
          </ul>
          <ul class="nav navbar-nav flex-child-menu menu-right">
          <!-- cek apakah ada session atau tidak, jika ada maka hidden login dan tampilkan loagout -->
          <?php if($session->get('id_user')){ ?>
            <li style="margin-right: 10px;color: #fff;">Selamat Datang, <?php echo $session->get('name') ?> (<?= $session->get('role') ?>)</li>
                        <li><a href="<?php echo base_url('akun/index') ?>">My Profile</a></li>

            <li class="btn"><a href="<?php echo base_url('login/logout') ?>">Logout</a></li>

          <?php }else{ ?>
            <li class="loginLink"><a href="#">Login</a></li>
            <li class="btn signupLink"><a href="#">Registrasi</a></li>
          <?php } ?>
          </ul>
        </div>
      <!-- /.navbar-collapse -->
      </nav>
      
      <!-- top search form -->
      <form action="<?php echo base_url('film/cariFilm') ?>" method="GET">

      <div class="top-search">
        <select name="genre">
          <option value="">Semua Genre</option>
          <?php foreach($genre as $gs): ?>
        <option value="<?php echo $gs['id_genre'] ?>" <?php if(isset($genre_header)){if($gs['id_genre']===$genre_header){ echo "selected";}} ?>><?= $gs['nama_genre'] ?></option>
        <?php endforeach; ?>
        </select>
          <input type="text" id="carifilm" name="keyword" placeholder="Masukan Nama Film atau Judul Film" <?php if(isset($keyword_header)){?>value="<?= $keyword_header; ?>"<?php } ?>>
          <input type="hidden" name="tahun" value="">
          <button type="submit" style="height:50px;width:50px"><i class="fa fa-search"></i></button>

      </div>
      </form>
  </div>
</header>
<!-- END | Header -->