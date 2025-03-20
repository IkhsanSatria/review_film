<?php 
use App\Models\User_model;

$session = \Config\Services::session();

$m_user 	= new User_model();
$user 		= $m_user->detail($session->get('id_user'));
    
?>
  <!-- Sidebar -->
  <div class="sidebar" data-background-color="dark">
              <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                  <a href="<?php echo base_url('admin/dasbor');?>" class="logo">
                   
                    <span class="text-white">ReviewFilm</span>
                  </a>
                  <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                      <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                      <i class="gg-menu-left"></i>
                    </button>
                  </div>
                  <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                  </button>
                </div>
                <!-- End Logo Header -->
              </div>
              <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                  <ul class="nav nav-secondary">
                    <li class="nav-item active">
                      <a
                       
                        href="<?php echo base_url('admin/dasbor');?>"
                       
                      >
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                      </a>
                    
                    </li>
                    <li class="nav-section">
                      <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                      </span>
                      <h4 class="text-section">Menu Aplikasi</h4>
                    </li>
                    
                    <li class="nav-item">
                      <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-users"></i>
                        <p>Master Data</p>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                          <li>
                            <a href="<?php echo base_url('admin/genre/');?>">
                              <span class="sub-item">Data Genre</span>
                            </a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('admin/negara');?>">
                              <span class="sub-item">Data Negara</span>
                            </a>
                          </li>
                         
                                             
                        
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a  href="<?php echo base_url('admin/film'); ?>">
                        <i class="fas fa-newspaper"></i>
                        <p>Kelola Film</p>
                      </a>
                      
                    </li>
                     <li class="nav-item">
                      <a  href="<?php echo base_url('admin/komentar'); ?>">
                        <i class="fas fa-comment"></i>
                        <p>Kelola Komentar</p>
                      </a>
                      
                    </li>
                     <li class="nav-item">
                      <a  href="<?php echo base_url('admin/rating'); ?>">
                        <i class="fas fa-star"></i>
                        <p>Kelola Rating</p>
                      </a>
                      
                    </li>
                      <li class="nav-item">
                      <a data-bs-toggle="collapse" href="#base2">
                        <i class="fas fa-users"></i>
                        <p>Manajemen Pengguna</p>
                        <span class="caret"></span>
                      </a>
                      <div class="collapse" id="base2">
                        <ul class="nav nav-collapse">
                        <li>
                            <a href="<?php echo base_url('admin/user');?>">
                              <span class="sub-item">Semua User</span>
                            </a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('admin/user/admin');?>">
                              <span class="sub-item">Admin</span>
                            </a>
                          </li>
                          <li>
                            <a href="<?php echo base_url('admin/user/subscriber');?>">
                              <span class="sub-item">Subscriber</span>
                            </a>
                          </li>
                         
                          <li>
                            <a href="<?php echo base_url('admin/user/author');?>">
                              <span class="sub-item">Author</span>
                            </a>
                          </li>
                          
                          
                        
                        </ul>
                      </div>
                    </li>

                   
                   
                   
                   
                    <li class="nav-item">
                      <a href="<?php echo base_url('adminlogin/logout');?>">
                      <i class="fas fa-sign-out-alt"></i>
                      <p>Logout</p>
                      </a>
                    </li>
                  
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Sidebar -->


<?php 
$validation = \Config\Services::validation();
    $errors = $validation->getErrors();
    if(!empty($errors))
    {
        echo '<span class="text-danger">'.$validation->listErrors().'</span>';
    }
?>

<?php if (session('msg')) : ?>
     <div class="alert alert-info alert-dismissible">
         <?= session('msg') ?>
         <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
     </div>
 <?php endif ?>