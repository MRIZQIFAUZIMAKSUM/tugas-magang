<?= $this->extend('templates/index') ?>
  <!-- Content Wrapper. Contains page content -->
<?= $this->section('content') ?>
<input id="selectedrole" style="display: none" value="<?= $user->name ?>">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/"> Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
       
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="row no-gutters ">

                        <div class="col-md-2 ml-2 mt-2">
                            <img src="<?= base_url('/uploads/' . $user->user_image); ?>" class="card-img" alt="<?= $user->fullname; ?>">
                        </div>
                        <div class="col-md-4 ml-2 me-2">
                          <h5 style="margin-top: 60px;">ubah foto profile</h5>
                          <input type="file" placeholder="ubah foto profile"> 
                          
                        </div>
                        
          <div class="input-group mb-3" style=" margin: 10px;">
            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?=  $user->username; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3"style=" margin: 10px;">
            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= $user->email; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3" style=" margin: 10px;">
            <input type="fullname" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="fullname" aria-describedby="emailHelp" placeholder="fullname" 
            value="<?php if($user->fullname) : ?><?= $user->fullname; ?><?php endif; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>


          <div class="input-group mb-3" style=" margin: 10px;">
            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3" style=" margin: 10px;">
            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3" style=" margin: 10px;">
          <p> Role: </p><br><br>
          <select class="browser-default custom-select" id="role">
                                        <option value="admin">admin</option>
                                        <option value="staff">staff</option>
                                        <option value="mitra">mitra</option>
                                        <option value="user">user</option>
                                      </select>
          </div>

                       
                                      
                                    <li class="list-group-item">
                                        <small><a href="<?= base_url('/') ?>">&laquo; back</a> </small> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <h1></h1>
    <!-- /.content -->
  </div>
  <?= $this->endSection(); ?>

  <?= $this->section('myjs') ?>
  <script>
    let role= document.getElementById("selectedrole").value;
           document.getElementById("role").value=role;
           
  </script>
  <?= $this->endSection(); ?> 