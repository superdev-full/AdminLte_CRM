<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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
      <form id="multi-step-form">
          <!-- /.row -->
          <div class="row">
           <div class="col-md-12 bs-stepper">
            
           
            

                <div class="step" data-step="1">
                

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                   <div class="row p-3">
                                        
                                        <div class="col-sm-9">
                                          <h3>Add Salary Template</h3>
                                          <hr>
                                        </div>
                                           <div class="col-sm-3">
                                            <div class="form-group" style="text-align: right;">
                                        
                                            <button class="btn btn-primary" name="submit" >Save Template</button>
                                          
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                              <label>Template name</label>
                                             <input class="form-control" autocomplete="off" class="input" name="temp_nam" type="text" placeholder="Enter template name" data-items="8"  />
                                            </div>
                                        </div>
                                        
                                          <div class="col-sm-3">
                                            <div class="form-group">
                                              
                                              <button type="" id="allowance_data_modal_btn" class="btn btn-primary">Add Component</button>
                                            </div>
                                        </div>

                                        
                                  </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                              <table class="table table-head-fixed text-nowrap" id="allowances_table">
                                <thead>
                                  <tr>
                                    <th>Type</th>
                                    <th>Component</th>
                                    <th>Percentage</th>
                                    <th>Amount</th>
                                    <td>Actions</td>
                                  </tr>
                                </thead>
                                <tbody>

                                 <tr>
                                    <td>Allowance</td>
                                    <td>asdasdasd</td>
                                    <td></td>
                                   <td>20</td>
                                   <td>
                                      <button onclick="editAllowances(`<?=base64_encode($result['allowance_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                       <button onclick="deleteAlert(`<?=base64_encode($result['allowance_id'])?>`,'allowances','allowance_id','allowances_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                                  
                                     <tr>
                                    <td>Allowance</td>
                                    <td>asdasdasd</td>
                                    <td>10</td>
                                   <td></td>
                                   <td>
                                      <button onclick="editAllowances(`<?=base64_encode($result['allowance_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                       <button onclick="deleteAlert(`<?=base64_encode($result['allowance_id'])?>`,'allowances','allowance_id','allowances_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                                  
                                     <tr>
                                    <td>Deduction</td>
                                    <td>asdasdasd</td>
                                    <td></td>
                                   <td>25</td>
                                   <td>
                                      <button onclick="editAllowances(`<?=base64_encode($result['allowance_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                       <button onclick="deleteAlert(`<?=base64_encode($result['allowance_id'])?>`,'allowances','allowance_id','allowances_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                                <tr>
                                    <td>Allowance</td>
                                    <td>asdasdasd</td>
                                    <td></td>
                                   <td>20</td>
                                   <td>
                                      <button onclick="editAllowances(`<?=base64_encode($result['allowance_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                       <button onclick="deleteAlert(`<?=base64_encode($result['allowance_id'])?>`,'allowances','allowance_id','allowances_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                                  
                                     <tr>
                                    <td>Allowance</td>
                                    <td>asdasdasd</td>
                                    <td>10</td>
                                   <td></td>
                                   <td>
                                      <button onclick="editAllowances(`<?=base64_encode($result['allowance_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                       <button onclick="deleteAlert(`<?=base64_encode($result['allowance_id'])?>`,'allowances','allowance_id','allowances_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                                  
                                     <tr>
                                    <td>Deduction</td>
                                    <td>asdasdasd</td>
                                    <td></td>
                                   <td>25</td>
                                   <td>
                                      <button onclick="editAllowances(`<?=base64_encode($result['allowance_id'])?>`)" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                       <button onclick="deleteAlert(`<?=base64_encode($result['allowance_id'])?>`,'allowances','allowance_id','allowances_table')" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                  </tr>
                        
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      </div>
                    </div>

                   
                </div>

               


               
            
           </div>
        </div>
        </form>
      
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
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="form-check pr-5">
                                    <input class="form-check-input" type="radio"  checked  name="type" value="allowance">
                                    <label class="form-check-label" for="office">Allowance</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="type" value="deduction">
                                    <label class="form-check-label"  for="site">Deduction</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                         <div class="col-sm-12">
                      <div class="form-group">
                        <label for="contractor">Select Earnings</label>
                        <select class="form-control" id="allowance" name="allowance" style="width: 100%;" required>
                          <?php
                          $query = "SELECT allowance_id, allowance_name FROM allowances";
                          $result = $conn->query($query);
                          if ($result->num_rows > 0) {
                            while ($allowances = $result->fetch_assoc()) {
                              $allowance_name = $allowances['allowance_name'];
                              $allowance_id = $allowances['allowance_id'];
                          ?>
                              <option value="<?php echo $allowance_id; ?>"><?php echo $allowance_name; ?> </option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="form-check pr-5">
                                    <input class="form-check-input" type="radio"  checked  name="type" value="percentage">
                                   <label class="form-check-label"  for="percentage">Percentage</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="type" value="Amount">
                                    <label class="form-check-label"  for="amount">Amount</label>
                                </div>
                            </div>
                        </div>
                   
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="notes">Percentage</label>
                                <input type="text" class="form-control" name="percentage" placeholder="Percentage" >
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
