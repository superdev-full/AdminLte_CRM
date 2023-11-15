<?php 
include ("connect.php");
require_once 'authentication.php';

if(isset($_POST['submit']))
  {
      $name=$_POST['name'];
      $description=$_POST['description'];
      $customSwitch1 = isset($_POST['customSwitch1']) ? $_POST['customSwitch1'] : 0;
      $date=date('Y-m-d');
      
      $sqli=mysqli_query($conn,"INSERT INTO `role`(`roll_name`, `description`, `active`, `date`) VALUES ('$name','$description','$customSwitch1','$date')");
  }

if(isset($_GET['id']) && isset($_GET['dele']))
{
    
  $id=$_GET['id'];
  
  $quer="delete from role where id='$id' ";
  $sql=mysqli_query($conn,$quer);

  if($sql)
  {
      
    header("location:user_access.php");
  }
}

if(isset($_POST['add_user']))
  {
      $uname=$_POST['uname'];
      $uemail=$_POST['uemail'];
      $upassword=$_POST['upassword'];
      $uroll=$_POST['uroll'];
      $ustatus=$_POST['ustatus'];
      $date=date('Y-m-d');
      
      $add_user=mysqli_query($conn,"INSERT INTO `user_details`(`user_name`, `user_email`, `user_password`, `user_role`, `status`,`date`) VALUES ('$uname','$uemail','$upassword','$uroll','$ustatus','$date')");
  }

  if(isset($_GET['id']) && isset($_GET['userdele']))
{
    
  $userid=$_GET['id'];
  
  $quer="delete from user_details where id='$userid' ";
  $sql=mysqli_query($conn,$quer);

  if($sql)
  {
      
      header("location:user_access.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM - User Access</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="dist/img/logo.png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="stylesheet" href="docs/assets/css/adminlte.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.css">
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">

<style>
    tbody tr:hover {
        cursor: pointer; /* Change cursor to a pointer */
        background-color: #f0f0f0; /* Change background color on hover */
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include ('sidebar.php'); ?>

  <div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
          <!-- /.row -->
          <div class="row">
           <div class="col-md-12">
             
           <div class="card card-primary card-outline card-outline-tabs mt-2">
                 <div class="card-header p-0">
                        <div class="row p-3">
                            <div class="col-md-6">
                              <h3>Users & Roles</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right"> <!-- Align buttons to the right -->
                                    <a href="#" id="invite_user" class="btn btn-primary">Add user</a>
                                    <a href="#" id="new_role" class="btn btn-primary">New Role</a>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                          <li class="nav-item ">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">User</a>
                          </li>
                          <li class="nav-item ">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Roles</a>
                          </li>
                        </ul>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                       
                       <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <!-- <th>USER ID</th> -->
                                <th>USER DETAILS</th>
                                <th>ROLE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $user_sql = $conn->query("SELECT user_details.*, role.roll_name
                                                FROM user_details
                                                LEFT JOIN role ON user_details.user_role = role.id");

                                while ($user_row = $user_sql->fetch_assoc()) {
                                ?>
                                <td>
                                      <div class="form-group">
                                          <div class="form-check d-flex align-items-center">
                                              <label class="form-check-label d-flex justify-content-center align-items-center">
                                                  <!-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
                                                  <div>
                                                      <span class="text-up"><?php echo $user_row['user_name']; ?></span><br>
                                                      <span class="text-down"><?php echo $user_row['user_email']; ?></span>
                                                  </div>
                                              </label>
                                          </div>
                                      </div>
                                </td>
                                <td class="align-middle"><?php echo $user_row['roll_name']; ?></td>
                                <td class="align-middle">
                                  <div class="d-flex justify-content-between">
                                    <div>
                                      <?php
                                      if($user_row['status'] == '1')
                                      { ?>
                                      <span>Active</span>
                                      <?php }
                                      else
                                      {   ?>
                                        <span>Inactive</span>
                                     <?php } ?>
                                    </div>
                                  </div>
                                  </td>
                                <td class="align-middle">
                                    <div>
                                       <a href="user_access.php?id=<?php echo $user_row['id']?>&userdele=delete"onClick="return confirm('Are you sure delete user?')"><button type="button" class="btn btn-sm btn-soft-danger btn-circle mr-2" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i></button></a>

                                       <a href="update_user.php?id=<?php echo $user_row['id']?>"><button type="button" class="btn btn-sm btn-soft-danger btn-circle mr-2" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-edit"></i></button></a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                       </div>

                       <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>ROLE NAME</th>
                                <th>DESCRIPTION</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Assuming $conn is your MySQLi connection
                                $sql = mysqli_query($conn, "SELECT * FROM `role`");
                                if (!$sql) {
                                    die("Error: " . mysqli_error($conn));
                                }
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td class="align-middle"><?php echo $row['roll_name']; ?></td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span><?php echo $row['description']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span><?php echo ($row['active'] == '0') ? 'Active' : 'Inactive'; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="user_access.php?id=<?php echo $row['id']; ?>&dele=delete" onClick="return confirm('Are you sure?')">
                                                    <button type="button" class="btn btn-sm btn-soft-danger btn-circle mr-2" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i></button>
                                                </a>
                                                <a href="update_role.php?id=<?php echo $row['id']; ?>">
                                                    <button type="button" class="btn btn-sm btn-soft-danger btn-circle mr-2" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-edit"></i></button>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                       </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
             </div>
             
           </div>
        </div>
        <!-- /.row -->
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="http://172.105.39.184/crm/">CRM</a>.</strong> All rights reserved.
  </footer>

  <!-- Bootstrap Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">
                <div class="modal-body">
                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="uname">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="uemail">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input type="password" class="form-control" id="Password" placeholder="Password" name="upassword">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                                <label for="portalstatus">Role</label>
                                <select class="form-control" name="uroll">
                                  <option value="" >Select Roal...</option>
                                  <?php
                                  $sqli=mysqli_query($conn,"select * from role ");
                                  while($row=mysqli_fetch_array($sqli)){
                                  ?>
                                  <option value="<?php echo $row['id']; ?>"><?php echo $row['roll_name']; ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                                <label for="portalstatus">Status</label>
                                <select class="form-control" name="ustatus">
                                  <option value="" >Select Status...</option>
                                  <option value="1" >Active </option>
                                  <option value="0" >Inactive</option>
                                 
                                </select>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer">
                <button type="submit" name="add_user" class="btn btn-primary" >Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
  </div>


  <!-- Bootstrap Modal -->
  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">
                <div class="modal-body">
                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="uname">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="uemail">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input type="password" class="form-control" id="Password" placeholder="Password" name="upassword">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                                <label for="portalstatus">Role</label>
                                <select class="form-control" name="uroll">
                                  <option value="" >Select Roal...</option>
                                  <?php
                                  $sqli=mysqli_query($conn,"SELECT * FROM `role` ");
                                  while($row=mysqli_fetch_array($sqli)){
                                  ?>
                                  <option value="<?php echo $row['id']; ?>"><?php echo $row['roll_name']; ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                                <label for="portalstatus">Status</label>
                                <select class="form-control" name="ustatus">
                                  <option value="" >Select Status...</option>
                                  <option value="Active" >Active </option>
                                  <option value="Inactive" >Inactive</option>
                                 
                                </select>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer">
                <button type="submit" name="add_user" class="btn btn-primary" >Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
  </div>

  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Roll Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" maxlength="30">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Description</label>
                                <!-- <input type="text" class="form-control" id="name" placeholder="Name"> -->
                                <textarea id="w3review" name="description" rows="6" cols="50" maxlength="100"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 table-responsive">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th class="align-middle"><b>Inactive</b> (check the box if inactive)</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="align-middle">
                                  <div class="form-group mb-0">
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" class="custom-control-input" id="customSwitch1" name="customSwitch1">
                                      <label class="custom-control-label" for="customSwitch1"></label>
                                    </div>
                                  </div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td>FULL ACCESS </td>
                                <td>VIEW</td>
                                <td>CREATE  </td>
                                <td>EDIT</td>
                              </tr>
                              <tr>
                                <td>Basic And Personal Details</td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="basicPersonalFullAccess">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="basicPersonalView">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="basicPersonalCreate">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="basicPersonalEdit">
                                        </div>
                                    </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Salary Details</td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Employee Payment Information</td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Employee Declarations</td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Salary Revision</td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Employee Reimbursement Summary</td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                              </tr>

                              <tr>
                                <td>Employee Loan</td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                      </div>
                                    </div>
                                </td>
                                <td>
                                <button class="btn btn-primary btn-lg w-100" type="submit" name="submit" style="margin-top: 60px;"> Submit </button></a>
                                <br/>
                              </td>
                              
                              </tr>
                              
                            </tbody>

                          </table>
                        </div>
                    </div>
                  </form>
                </div>
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Invite</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div> -->
            </div>
        </div>
  </div>


</div> 
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="lugins/dropzone/min/dropzone.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })



    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

  

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })

  $("#invite_user").click(function() {
        $("#myModal").modal("show");
    });
    $("#invite_user1").click(function() {
        $("#myModal1").modal("show");
    });

    $("#new_role").click(function() {
        $("#myModal2").modal("show");
    });

  // function lettersOnly(input) {
  //   var regex=/[^a-z]/gi;
  //   input.value=input.value.replace(regex,"")
  // }
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
<script>
  // Add a JavaScript event listener to update the hidden input
  document.getElementById('customSwitch1').addEventListener('change', function() {
    // Set the value of the hidden input to 1 if the checkbox is checked, otherwise 0
    document.getElementById('hiddenCheckboxState').value = this.checked ? 1 : 0;
  });
</script>
</body>
</html>