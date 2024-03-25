<?php
include("connect.php");
require_once 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM - ARM Assign Employees</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="dist/img/logo.png" />
//
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

            <form>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                              <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <h2>Assign Employees</h2>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-md-right"> <!-- Align buttons to the right -->
                                                <button type="" id="assign" class="btn btn-primary">Assign</button>
                                                <button type="" class="btn btn-primary">Import</button>
                                                <button type="" class="btn btn-primary">Export</button>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                              <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                  <thead>
                                    <tr>
                                      <th>EMPLOYEE ID</th>
                                      <th>EMPLOYEE NUMBER</th>
                                      <th>TIME IN</th>
                                      <th>TIME OUT</th>
                                      <th>SITE ID</th>
                                      <th>SITE NAME</th>
                                      <th>STATUS</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                      <td>123</td>
                                      <td>ABC</td>
                                      <td>1-1-2020</td>
                                      <td>1-1-2022</td>
                                      <td>1</td>
                                      <td>ABC</td>
                                      <td>
                                        <div class="form-group mb-0">
                                            <div class="custom-control custom-switch">
                                              <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                              <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->
                      </div>
                      
                    </div>
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit ARM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                                    <label>Select Employee</label>
                                    <select class="form-control select2bs4" style="width: 100%;">
                                        <option selected="selected">Employee 1</option>
                                        <option>Employee 2</option>
                                        <option>Employee 3</option>
                                    </select>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group ">
                                    <label>Select Sites</label>
                                    <select class="form-control select2bs4" style="width: 100%;">
                                        <option selected="selected">Site 1</option>
                                        <option>Site 2</option>
                                        <option>Site 3</option>
                                    </select>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="date">Date</label>
                              <input type="date" class="form-control" id="date" placeholder="Date">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                          <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Time In:</label>
                                <div class="input-group date" id="timepickerIn" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#timepickerIn"/>
                                    <div class="input-group-append" data-target="#timepickerIn" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Time Out:</label>
                                <div class="input-group date" id="timepickerOut" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#timepickerOut"/>
                                    <div class="input-group-append" data-target="#timepickerOut" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                  </form>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Assign</button>
                </div>
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

        // Get the current date in the "YYYY-MM-DD" format
        const currentDate = new Date().toISOString().split('T')[0];

        // Set the input field's value to the current date
        document.getElementById('date').value = currentDate;


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

    // Timepicker for Time In
    $('#timepickerIn').datetimepicker({
        format: 'LT'
    });

    // Timepicker for Time Out
    $('#timepickerOut').datetimepicker({
        format: 'LT'
    });


    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

  

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

              const schemeCheckboxes = document.getElementsByName("scheme-checkbox");
          const epfCheckbox = document.getElementById("epf-checkbox");
          const esiCheckbox = document.getElementById("esi-checkbox");
          const epfForm = document.getElementById("epf-form");
          const esiForm = document.getElementById("esi-form");

          epfCheckbox.addEventListener("change", function () {
              if (this.checked) {
                  epfForm.style.display = "block";
                  esiForm.style.display = "none";
                  esiCheckbox.checked = false;
              } else {
                  epfForm.style.display = "none";
              }
          });

          esiCheckbox.addEventListener("change", function () {
              if (this.checked) {
                  esiForm.style.display = "block";
                  epfForm.style.display = "none";
                  epfCheckbox.checked = false;
              } else {
                  esiForm.style.display = "none";
              }
          });


})

$("#assign").click(function(e) {
    e.preventDefault(); // Prevent the default form submission
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
