<div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Aplikasi Review Film </h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="<?php echo base_url('admin/film') ?>" class="btn btn-label-info btn-round me-2"><i class="fa fa-film"></i> Kelola Film</a>
                <a href="<?php echo base_url('admin/user'); ?>" class="btn btn-primary btn-round"><i class="fa fa-users"></i> Kelola User</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-danger bubble-shadow-small"
                        >
                        <i class="fa fa-film"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Semua Film</p>
                          <h4 class="card-title"><?php echo $totalfilm; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                        <i class="fas fa-envelope"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Subscriber</p>
                          <h4 class="card-title"><?php echo $totalsubscriber; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                        <i class="fa fa-paper-plane"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Author</p>
                          <h4 class="card-title"><?php echo $totalauthor; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-warning bubble-shadow-small"
                        >
                        <i class="fa fa-list"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Genre</p>
                          <h4 class="card-title"><?php echo $totalgenre; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                            <i class="fa fa-comment"></i>      
                          </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Jumlah Komentar</p>
                          <h4 class="card-title"><?php echo $totalkomentar; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-danger bubble-shadow-small"
                        >
                        <i class="fas fa-star"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total Rating</p>
                          <h4 class="card-title"><?php echo $totalrating; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>

        
        
          </div>
        </div>
