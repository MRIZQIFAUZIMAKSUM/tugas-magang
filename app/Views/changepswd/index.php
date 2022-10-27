<?= $this->extend('templates/index') ?>
  <!-- Content Wrapper. Contains page content -->
<?= $this->section('content') ?>
  <div class="login-logo">
    <a href="AdminLTE/index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ganti Password</p>

      <form action="/changepswd" method="post">
      <div class="input-group mb-3">
          <input type="text" name="userid" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="old_pswd" class="form-control" placeholder="Old Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="new_pswd" class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <div class="col-2">
            <button type="button" class="btn btn-danger btn-block">batal</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
<!-- /.login-box -->

<?= $this->endSection()?>
