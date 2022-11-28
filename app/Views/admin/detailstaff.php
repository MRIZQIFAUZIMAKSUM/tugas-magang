<?= $this->extend('templates/index') ?>
  <!-- Content Wrapper. Contains page content -->
<?= $this->section('content') ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Staff List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Staff List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ; ?>
          <?php foreach($users as $user ): ?>
          <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $user->username ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->name ?></td>
            <td><a href="<?= base_url("detail/" . $user-> userid); ?>" <button class="btn btn-primary mb-3">Detail</button></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <h1></h1>
    <!-- /.content -->
  </div>
  <?= $this->endSection(); ?>
 