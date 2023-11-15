<?php
include("connect.php");
require_once 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'inc/head.php'; ?>
<<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include ('sidebar.php'); ?>

  <div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
          <!-- /.row -->
          <div class="row">
           <div class="col-md-12 bs-stepper">
            <ul class="step-links">
                <li><a href="#" class="step-link  " data-step="1">
                <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Allowances</span>
                </a></li><div class="line"></div>
                <li><a href="#" class="step-link  " data-step="2">
                <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Deductions</span>
                </a></li><div class="line"></div>
                <li><a href="#" class="step-link  " data-step="3">
                <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Loans and <br>Advances</span>
                </a></li><div class="line"></div>
                <li><a href="#" class="step-link  " data-step="4">
                <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Leaves</span>
                </a></li>
            </ul>
           
            <form id="multi-step-form">

                <div class="step" data-step="1">
                    <h2>Step 1: Allowances</h2>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-6">
                                      </div>
                                      <div class="col-md-6">
                                          <div class="text-md-right"> <!-- Align buttons to the right -->
                                              <button type="" id="allowance_data_modal_btn" class="btn btn-primary">Add</button>
                                              <button type="" class="btn btn-primary">Import</button>
                                              <button type="" class="btn btn-primary">Export</button>
                                          </div>
                                      </div>
                                  </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                              <table class="table table-head-fixed text-nowrap" id="allowances_table">
                                <thead>
                                  <tr>
                                    <th>Pre-selected</th>
                                    <th> NAME</th>
                                    <th>DATE</th>
                                    <th>NOTES</th>
                                    <td>More</td>
                                  </tr>
                                </thead>
                                <tbody>

                                  <?php
                                    $allowances=getByStatus($conn,'allowances');
                                    if (mysqli_num_rows($allowances)>0) {
                                   while ($result=mysqli_fetch_assoc($allowances)) {
                                     // code...
                                   
                                   ?>
                                
                                <tr>
                                    <td>
                                      <div class="form-check">
                                          <input <?=($result['pre_selected']==1)?"checked":""?> type="checkbox" class="form-check-input" id="exampleCheck1" >
                                          <label class="form-check-label" for="exampleCheck1"></label>
                                      </div>
                                    </td>
                                    <td><?=$result['allowance_name']?></td>
                                    <td><?=getDateFormat('d-m-Y',$result['created_at'])?></td>
                                    <td><?=$result['allowance_notes']?></td>
                                    <td>
                                      <button onclick="editAllowances(`<?=base64_encode($result['allowance_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                       <button onclick="deleteAlert(`<?=base64_encode($result['allowance_id'])?>`,'allowances','allowance_id','allowances_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                                <?php }} ?>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      </div>
                    </div>

                    <button class="btn btn-primary next-step" data-step="2">Next</button>
                </div>

                <div class="step" data-step="2">
                    <h2>Step 2: Deductions</h2>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-6">
                                      </div>
                                      <div class="col-md-6">
                                          <div class="text-md-right"> <!-- Align buttons to the right -->
                                              <button type="" id="Deductions_modal_btn" class="btn btn-primary">Add</button>
                                              <button type="" class="btn btn-primary">Import</button>
                                              <button type="" class="btn btn-primary">Export</button>
                                          </div>
                                      </div>
                                  </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                              <table class="table table-head-fixed text-nowrap" id="deductions_table">
                                <thead>
                                  <tr>
                                    <th>Pre-selected</th>
                                    <th> NAME</th>
                                    <th>DATE</th>
                                    <th>NOTES</th>
                                    <td>More</td>
                                  </tr>
                                </thead>
                                <tbody>

                                  <?php
                                    $allowances=getByStatus($conn,'deductions');
                                    if (mysqli_num_rows($allowances)>0) {
                                   while ($result=mysqli_fetch_assoc($allowances)) {
                                     // code...
                                   
                                   ?>
                                
                                <tr>
                                    <td>
                                      <div class="form-check">
                                          <input <?=($result['pre_selected']==1)?"checked":""?> type="checkbox" class="form-check-input" id="exampleCheck1" >
                                          <label class="form-check-label" for="exampleCheck1"></label>
                                      </div>
                                    </td>
                                    <td><?=$result['deduction_name']?></td>
                                    <td><?=getDateFormat('d-m-Y',$result['created_at'])?></td>
                                    <td><?=$result['deduction_notes']?></td>
                                    <td>
                                      <button onclick="editDeduction(`<?=base64_encode($result['deduction_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                      <button onclick="deleteAlert(`<?=base64_encode($result['deduction_id'])?>`,'deductions','deduction_id','deductions_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                                <?php }} ?>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      </div>
                    </div>

                    <button class="btn btn-primary prev-step" data-step="1">Previous</button>
                    <button class="btn btn-primary next-step" data-step="3">Next</button>
                </div>

                <div class="step" data-step="3">
                  <h2>Step 3: Loans and Advances</h2>
                        <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">show/hide balance in payslip</label>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-12">
                              <div class="card">
                                  <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-md-right"> <!-- Align buttons to the right -->
                                                    <button type="" id="loans_advances_md_btn" class="btn btn-primary">Add</button>
                                                    <button type="" class="btn btn-primary">Import</button>
                                                    <button type="" class="btn btn-primary">Export</button>
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                                  <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed text-nowrap" id="loans_advances_table">
                                <thead>
                                  <tr>
                                    <th>Pre-selected</th>
                                    <th> NAME</th>
                                    <th>DATE</th>
                                    <th>NOTES</th>
                                    <td>More</td>
                                  </tr>
                                </thead>
                                <tbody>

                                  <?php
                                    $loans_advances=getByStatus($conn,'loans_advances');
                                    if (mysqli_num_rows($allowances)>0) {
                                   while ($result=mysqli_fetch_assoc($loans_advances)) {
                                     // code...
                                   
                                   ?>
                                
                                <tr>
                                    <td>
                                      <div class="form-check">
                                          <input <?=($result['pre_selected']==1)?"checked":""?> type="checkbox" class="form-check-input" id="exampleCheck1" >
                                          <label class="form-check-label" for="exampleCheck1"></label>
                                      </div>
                                    </td>
                                    <td><?=$result['name']?></td>
                                    <td><?=getDateFormat('d-m-Y',$result['created_at'])?></td>
                                    <td><?=$result['notes']?></td>
                                    <td>
                                      <button onclick="editloans_advance(`<?=base64_encode($result['loans_advances_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                       <button onclick="deleteAlert(`<?=base64_encode($result['loans_advances_id'])?>`,'loans_advances','loans_advances_id','loans_advances_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                                <?php }} ?>
                                </tbody>
                              </table>
                                  </div>
                                  <!-- /.card-body -->
                              </div>
                            </div>
                        </div>

                    <button class="btn btn-primary prev-step" data-step="2">Previous</button>
                    <button class="btn btn-primary next-step" data-step="4">Next</button>
                    
                </div>

                <div class="step" data-step="4">
                  <h2>Step 4: Leaves</h2>
                        <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">show/hide balance in payslip</label>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-12">
                              <div class="card">
                                  <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-md-right"> <!-- Align buttons to the right -->
                                                    <button type="" id="Leaves_modal_btn" class="btn btn-primary">Add</button>
                                                    <button type="" class="btn btn-primary">Import</button>
                                                    <button type="" class="btn btn-primary">Export</button>
                                                </div>
                                            </div>
                                        </div>
                                  </div>
                                  <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed text-nowrap" id="leaves_table">
                                <thead>
                                  <tr>
                                    <th>Pre-selected</th>
                                    <th> NAME</th>
                                    <th>Pecentage cut Per Salary Day</th>
                                    <th>DATE</th>
                                    <th>NOTES</th>
                                    <td>More</td>
                                  </tr>
                                </thead>
                                <tbody>

                                  <?php
                                    $loans_advances=getByStatus($conn,'leaves');
                                    if (mysqli_num_rows($allowances)>0) {
                                   while ($result=mysqli_fetch_assoc($loans_advances)) {
                                     // code...
                                   
                                   ?>
                                
                                <tr>
                                    <td>
                                      <div class="form-check">
                                          <input <?=($result['pre_selected']==1)?"checked":""?> type="checkbox" class="form-check-input" id="exampleCheck1" >
                                          <label class="form-check-label" for="exampleCheck1"></label>
                                      </div>
                                    </td>
                                    <td><?=$result['leave_name']?></td>
                                    <td><?=$result['percentage_cut_per_day']?></td>
                                    <td><?=getDateFormat('d-m-Y',$result['created_at'])?></td>
                                    <td><?=$result['leave_notes']?></td>
                                    <td>
                                      <button onclick="editLeaves(`<?=base64_encode($result['leave_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                      <button onclick="deleteAlert(`<?=base64_encode($result['leave_id'])?>`,'leaves','leave_id','leaves_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                                <?php }} ?>
                                </tbody>
                              </table>
                                  </div>
                                  <!-- /.card-body -->
                              </div>
                            </div>
                        </div>

                  <button class="btn btn-primary prev-step" data-step="3">Previous</button>
                  
                </div>
            </form>
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
    <div class="modal fade" id="allowance_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               <form action="php_action/custom_action.php" id="allowances_fm" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Manage Allowances</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check">
                              <input type="hidden" name="pre_selected" value="0">
                                <input name="pre_selected" value="1" type="checkbox" class="form-check-input" id="allowances_pre_selected" >
                                <label class="form-check-label" for="pre_selected">Pre-select Item to Include in Salary Slabs</label>
                             </div>
                        </div>
                        <input type="hidden" name="allowance_id" value="">
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="allowance_name_new" placeholder="Name" >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <input type="text" class="form-control" name="allowance_notes" placeholder="Notes" >
                            </div>
                        </div>
                    </div>

                 
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="allowances_btn" >Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                 </form>
            </div>
        </div>
    </div>

        <!-- Bootstrap Modal -->
      <div class="modal fade" id="Deductions_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="php_action/custom_action.php" id="deductions_fm" method="POST">
                  <input type="hidden" name="deduction_id" value="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deductions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check">
                              <input type="hidden" name="pre_selected" value="0">
                              <input type="checkbox" class="form-check-input" value="1" name="pre_selected" id="pre_selected" >
                              <label class="form-check-label" for="pre_selected">Pre-select Item to Include in Salary Slabs</label>
                             </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="deduction_name_new" placeholder="Name" >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <input type="text" class="form-control" name="deduction_notes" placeholder="Notes" >
                            </div>
                        </div>
                    </div>

                  
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="deductions_btn">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
      </div>

      <!-- Bootstrap Modal -->
      <div class="modal fade" id="loans_advances_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               <form action="php_action/custom_action.php" id="loans_advances_fm" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Loans and Advances</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  
                    <input type="hidden" name="loans_advances_id" value="">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="loans_pre_selected" value="0">
                            <div class="form-check">
                            <input type="checkbox" value="1" name="loans_pre_selected" class="form-check-input" id="exampleCheck1" >
                            <label class="form-check-label" for="exampleCheck1">Pre-select Item to Include in Salary Slabs</label>
                             </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="loans_name_new" placeholder="Name" >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <input type="text" class="form-control" name="loans_notes" placeholder="Notes" >
                            </div>
                        </div>
                    </div>

                  
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="loans_advances_btn">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
      </div>

      <!-- Bootstrap Modal -->
      <div class="modal fade" id="Leaves_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               <form action="php_action/custom_action.php" id="leaves_fm" method="POST">
                <input type="hidden" name="leave_id" value="">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Leaves</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check">
                              <input type="hidden" name="leaves_pre_selected" value="0">
                                          <input value="1" name="leaves_pre_selected" type="checkbox" class="form-check-input" id="exampleCheck1" >
                                          <label class="form-check-label" for="exampleCheck1">Pre-select Item to Include in Salary Slabs</label>
                             </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="leave_name_new" placeholder="Name" >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="percentage">Percentage Cut from Salary per day</label>
                                <input type="number" class="form-control" name="percentage_cut_per_day" placeholder="Percentage Cut from Salary per day" >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <input type="text" class="form-control" name="leave_notes" placeholder="Notes" >
                            </div>
                        </div>
                    </div>

                 
                </div>
                <div class="modal-footer">
                <button type="submit" id="leaves_btn" class="btn btn-primary" >Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                 </form>
            </div>
        </div>
      </div>

</div> 
<!-- ./wrapper -->
<?php include 'inc/foot.php'; ?>
<script type="text/javascript" src="js/salary_components.js"></script>
<!-- Page specific script -->

</body>
</html>
