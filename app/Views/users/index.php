<?= $this->extend('templates/index') ?>
  <!-- Content Wrapper. Contains page content -->
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User list</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="content-wrapper">
        <div class="container-fluid">
              <div class="row">
                <div class="col-md-3"></div>
              </div>
        </div>
      </div>
    </section>
</div>
  <?= $this->endSection(); ?>
 