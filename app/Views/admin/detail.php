<?= $this->extend('templates/index') ?>
  <!-- Content Wrapper. Contains page content -->
<?= $this->section('content') ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
       
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('/uploads/' . $user->user_image); ?>" class="card-img" alt="<?= $user->fullname; ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> 
                                        <h4><?=  $user->username; echo ($user->status_message == 'verified')? "<small style='margin-left:10px'>✅</small>" : ""; 
                                        ?> </h4>
                                    </li>

                                    <?php if($user->fullname) : ?>
                                        <li class="list-group-item"><?= $user->fullname; ?></li>
                                    <?php endif; ?>
                                    
                                    <li class="list-group-item"><?= $user->email; ?></li>
                                    <li class="list-group-item">
                                        <span style="height: 100% ; wight: 50%;" class="badge badge-<?php
                                        if ($user->name == 'admin') {
                                            echo('danger');
                                        } elseif($user->name == 'staff') {
                                            echo('warning');
                                        } elseif($user->name == 'user') {
                                            echo('success');
                                        } elseif($user->name == 'mitra') {
                                            echo('info');
                                        } else{
                                            echo('secondary');
                                        }
                                         ?>"><?= $user->name; ?></span>
                                    </li>
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
 