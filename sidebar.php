<?php 
  if (isset($_POST['logout'])) {
      session_destroy();
      header('location: index.php');
      exit;
  }
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light">
    
    <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown user-menu" style="display: flex;">
                  <span class="d-none d-md-inline" style="margin-right: 1rem; font-size: 1.5rem; text-transform: capitalize;"><?php echo $_SESSION['AdminLogin']; ?></span>
                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                      <button type="submit" name="logout" style="background: none; border: none; float: right; font-size: 1.5rem;">
                          <span class="fa fa-sign-out" style="color: black;"><i class="fa fa-power-off"></i></span>
                      </button>
                  </form>
          </li>
      </ul>
   </nav>
    <!-- /.navbar -->

<aside class="main-sidebar">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text text-white font-weight-bold">CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
               Master
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="salary_components.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salary Components</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="designation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="others.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Others</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-light fa-money-bill" style="color: #ffffff;"></i>
            <p>
              Salary Slabs
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_salary.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_salary.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="salary_templates.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salary Templates</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Employees
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_employee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_employee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <!-- <i class="nav-icon fas fa-user"></i> -->
              <p>
              Contractors
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_contractor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_contractor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Clients
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_client.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_client.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="assign_employee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_employees_new.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Employees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="verify_attendance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Verify Attendance</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Sites
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_sites.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_sites.php.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
              
            </ul>
          </li>

          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <!-- <i class="nav-icon fas fa-user"></i> -->
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="company_profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user_access.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Access</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user_profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Profile</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="reports.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Reports
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <!-- <i class="nav-icon fas fa-user"></i> -->
              <p>
              Contractor
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_contractor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_contractor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <!-- <i class="nav-icon fas fa-user"></i> -->
              <p>
              ARM
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="list_of_employees.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Employees </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="arm_assign_employees.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Assign Employees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="arm_attendance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
    $(function () {
var url = window.location;
// for single sidebar menu
$('ul.nav-sidebar a').filter(function () {
return this.href == url;
}).addClass('active');

// for sidebar menu and treeview
$('ul.nav-treeview a').filter(function () {
return this.href == url;
}).parentsUntil(".nav-sidebar > .nav-treeview")
.css({'display': 'block'})
.addClass('menu-open').prev('a')

});
  </script>