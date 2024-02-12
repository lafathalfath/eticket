

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="card-img text-center">
                <!-- <img class="img-fluid" alt="Responsive image" src="<?= base_url('assets/login/img/login.png');?>"> -->
                <img class="img-fluid" height="350" width="350" alt="eTicketing" src="<?= base_url('assets/login/img/logo.png');?>">
              </div>
           
              <div class="col-lg">
                <div class="p-4">                  
                  <?= $this->session->flashdata('message'); ?>

                  <form class="user" method="post" action="<?= base_url('masuk') ?>">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Username" value="<?= set_value('email')?>">
                            <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">@bsn.go.id</span>
                      </div>
                    </div>
                    <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?> 
                      
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                   
                   
                  </form>
                  <hr>
                
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  