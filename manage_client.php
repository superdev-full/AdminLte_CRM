<?php
include("connect.php");
require_once 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM - Manage Client</title>

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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
 #searchIcon:hover, #dropdownIcon:hover {
        cursor: pointer;
    }
    tbody tr:hover {
        cursor: pointer; /* Change cursor to a pointer */
        background-color: #f0f0f0; /* Change background color on hover */
    }

  
     .modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.close {
  color: #aaa;
  float: right;
  font-size: 20px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
}

button {
  padding: 10px;
  margin-top: 10px;
  background-color: #f44336;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #d32f2f;
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
           <div id="deleteConfirmationModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeDeleteConfirmationModal()">&times;</span>
    <p>Are you sure you want to delete?</p>
    <button onclick="deleteItem()">Yes, Delete</button>
  </div>
</div>
<form id="deleteForm" action="delete_contract.php" method="post">
  <input type="hidden" id="siteIdInput" name="site_id" value="">
</form>
           <div class="card">
                 <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" id="searchIcon">
                                    <span class="input-group-text"><i class="fas fa-search"></i> <i class="fas fa-caret-down"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right"> <!-- Align buttons to the right -->
                                    <a href="add_client.php" class="btn btn-primary">Add</a>
                                    <a href="" class="btn btn-primary">Import</a>
                                    <a href="" class="btn btn-primary">Export</a>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>CLIENT ID</th>
                          <th>
                          CLIENT NAME
                          </th>
                          <th>CONTRACTOR NAME</th>
                          <th>NUMBER OF SITES</th>
                          <th>MOBILE</th>
                          <th>EMAIL</th>
                          <th>OPERATIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $sql="SELECT clients.*, contractor_details.*, clients.id as client_id, COUNT(sites.client_id) AS total_sites FROM clients INNER JOIN contractor_details ON clients.contractor_id = contractor_details.id LEFT JOIN sites ON clients.id = sites.client_id GROUP BY clients.id ORDER BY `clients`.`client_name` ASC
                          ";
                          $result=mysqli_query($conn,$sql);
                          while($row=mysqli_fetch_assoc($result)){
                          
                          ?>
                        
                      <tr>
                        <td><?php echo $row['client_id'] ?></td>
                          <td>
                              <?php echo $row['client_name'] ?>
                          </td>
                          <td><?php echo $row['contractorname'] ?></td>
                     
                          <td><?php echo $row['total_sites'] ?></td>
                          <td><?php echo $row['contact_mobile'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td>
                                            <a href="edit_contractor.php?id=<?php echo $row['id'] ?>"><i class="material-icons">edit</i> </a> 

                                     <a href="#" onclick="showDeleteConfirmation(<?php echo $row['client_id'] ?>)">
  <i class="material-icons">delete</i>
</a>    
                                     </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                    </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Search Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employeename">Employee Name</label>
                                <input type="text" class="form-control" id="employeename" placeholder="Employee Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employeeid">Employee Id</label>
                                <input type="text" class="form-control" id="employeeid" placeholder="Employee Id">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="workemail">Work Email</label>
                                <input type="text" class="form-control" id="workemail" placeholder="Work Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobilenumber">Mobile Number</label>
                                <input type="text" class="form-control" id="mobilenumber" placeholder="Mobile Number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                      <label for="portalstatus">Portal Status</label>
                                      <select class="form-control">
                                        <option>Active</option>
                                        <option>Exited</option>
                                      </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                                      <label for="employeestatus">Employee Status</label>
                                      <select class="form-control">
                                        <option>Active</option>
                                        <option>Exited</option>
                                      </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doj">Date of Joining</label>
                                <input type="date" class="form-control" id="doj" placeholder="Date of Joining">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lwd">Last Working Date</label>
                                <input type="date" class="form-control" id="lwd" placeholder="Last Working Date">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                      <label for="paymentmode">Payment Mode</label>
                                      <select class="form-control">
                                        <option>Cheque</option>
                                        <option>Bank Transfer</option>
                                        <option>Direct Deposit</option>
                                      </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                                      <label for="department">Department</label>
                                      <select class="form-control">
                                        <option>Janitor</option>
                                      </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                      <label for="designation">Designation</label>
                                      <select class="form-control">
                                        <option>janitor</option>
                                        <option>abc</option>
                                      </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                                      <label for="worklocation">Work Location</label>
                                      <select class="form-control">
                                        <option>Head Office</option>
                                      </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div> 
<!-- ./wrapper -->
<script>
var currentSiteId;

// Function to display the modal and set site ID
function showDeleteConfirmation(siteId) {
  // Set the current site ID
  currentSiteId = siteId;

  var modal = document.getElementById('deleteConfirmationModal');
  modal.style.display = 'block';
}

// Function to close the modal
function closeDeleteConfirmationModal() {
  var modal = document.getElementById('deleteConfirmationModal');
  modal.style.display = 'none';
}

// Function to handle delete action
function deleteItem() {
  // Check if the site ID is set
  if (!currentSiteId) {
    alert('Error: Site ID is not set.');
    return;
  }

  // Set the site ID in the hidden form input
  document.getElementById('siteIdInput').value = currentSiteId;

  // Submit the hidden form to delete_site.php
  document.getElementById('deleteForm').submit();

  // Close the modal after submission
  closeDeleteConfirmationModal();
}
</script>
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
  
  $("#searchIcon").click(function() {
        $("#myModal").modal("show");
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

</body>
</html>
