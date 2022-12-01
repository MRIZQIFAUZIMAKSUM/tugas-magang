<?= $this->extend('templates/index') ?>
  <!-- Content Wrapper. Contains page content -->
<?= $this->section('content') ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?> <a href="<?= base_url("add-user") ?>"> <button class="btn btn-success ml-3">Add</button></a></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <?php if(empty($users)): ?>
            <h1 style="align-items: center; margin-top: 30px;"> Data Kosong </h1>
        <?php else: ?>
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
            <td><a href="<?= base_url("detail/" . $user-> userid); ?>"> <button class="btn btn-primary mb-3">Detail</button></a>
            <a href="<?= base_url("detail/" . $user-> userid . "/edit"); ?>"> <button class="btn btn-warning mb-3">Edit</button></a>
             <form id="delete_<?= $i ?>"  action="<?= base_url("detail/" . $user-> userid . "/delete"); ?>" method="post">
              <input type="hidden" name="_method" value="DELETE" /> 
             <button type="submit" onclick="alert('are you sure?')" class="btn btn-danger mb-3" >Delete</button>
            </form>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <?php endif ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- /.content -->
  </div>
  <?= $this->endSection(); ?>

  <?= $this->section('content') ?>
<script>
  function send($i){
    alert("are you sure? ");
    $('#delete_'+$i).submit() ;
   
  }
</script>
  <?= $this->endSection(); ?>
 