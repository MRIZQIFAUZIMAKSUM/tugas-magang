
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('AdminLTE/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('/uploads/'. user()->user_image ) ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/profile" class="d-block"> <?= user()->username; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
               </li>
        <?php if(in_groups(['admin','super admin'])) : ?>
          <li class="nav-header">USER MANAGEMENT</li>
          <li class="nav-item">
            <a href="/mitra-list" class="nav-link">
            <ion-icon name="people-outline"></ion-icon>
            <i class="nav-icon fas fa-users" >
            </i>  
            <p>
              Mitra List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/staff-list" class="nav-link">
            <ion-icon name="people-outline"></ion-icon>
            <i class="nav-icon fas fa-users" >
            </i>  
            <p>
              Staff List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user-list" class="nav-link">
            <ion-icon name="people-outline"></ion-icon>
            <i class="nav-icon fas fa-users" >
            </i>  
            <p>
              User List
              </p>
            </a>
          </li>
        <?php endif ?>
          
        <?php if(in_groups('super admin')) : ?>
          <li class="nav-item">
            <a href="/admin-list" class="nav-link">
            <ion-icon name="people-outline"></ion-icon>
            <i class="nav-icon fas fa-users" >
            </i>  
            <p>
              Admin List
              </p>
            </a>
          </li>
        <?php endif ?>
          <li class="nav-header">USER PROFILE</li>
          <li class="nav-item">
            <a href="/profile" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>My Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/uploadktp" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Upload Data Diri</p>
            </a>
          </li>

          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="text">logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>