<?php
include ('connect.php');
require_once 'authentication.php';

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['customSwitch1']; // Changed variable name to 'status'

    $query = "UPDATE role SET roll_name='$name', description='$description', active='$status' WHERE id='$id'"; // Updated 'customSwitch1' to 'active'
    $sql = mysqli_query($conn, $query); 

    if ($sql) {
        $_SESSION['msg'] = "Role updated successfully.";
        header('location:user_access.php'); // Redirect to role management page
    } else {
        $_SESSION['msg'] = "Role not updated!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM - Add Client</title>

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
                .step-links {
              display: flex;
              align-items: center;
              padding-left:0px;
              list-style:none;
            }

            .step-link {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-decoration: none;
                padding: 10px;
                color: #333;
                background-color: #f4f4f4;
                border-radius: 4px;
                font-weight: bold;
                margin-right: 5px;
                text-align: center;
            }

            .step-link.active {
              background-color: #007bff;
              color: #fff;
            }

            @media (max-width: 730px)
            {
                .step-link {
                padding: 0px;
                font-size: 8px;
                font-weight: none;
                margin-right: 0px;
            }

            .bs-stepper .line{
                flex: 1 0 20px;
            }
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
           <div class="col-md-12 bs-stepper">
           <form method="post" action="">
                <?php
                 $id = $_GET['id'];
                 $role_sql = mysqli_query($conn, "SELECT * FROM `role` WHERE id='$id'");
                 while ($role_row = mysqli_fetch_array($role_sql)) {
                     $roleName = $role_row['roll_name'];
                     $roleDescription = $role_row['description'];
                     $selected = $role_row['active'];
                 }
                 ?>
                <div class="step" data-step="1">
                    <h2>Update Role</h2>
                    <br>

                    <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                          <label for="Rolename">Name</label>
                          <input type="text" class="form-control" id="Rolename" placeholder="Role Name" value="<?php echo $roleName; ?>" name="name">
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="Roleid">Description</label>
                            <textarea class="form-control" placeholder="Description" name="description"><?php echo $roleDescription; ?></textarea>
                          </div>
                        </div>

                        <div class="col-sm-12">
                        <div class="form-group">
                            <label for="customSwitch1">Status</label>
                            <select class="form-control" name="customSwitch1">
                                <option value="">Select Status.....</option>
                                <option value="0" <?php if ($selected == 0) echo 'selected'; ?>>Active</option>
                                <option value="1" <?php if ($selected == 1) echo 'selected'; ?>>Inactive</option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <button class="btn btn-primary next-step" type="submit" name="update" data-step="2">Update</button>
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

  $(document).ready(function () {
    var currentStep = 1;

    function showStep(step) {
        $('.step').hide();
        $('[data-step="' + step + '"]').show();
        // Update the active link in the top navigation
        $('.step-link').removeClass('active');
        $('.step-link[data-step="' + step + '"]').addClass('active');
    }

    $('.step-link').click(function (e) {
        e.preventDefault();
        currentStep = parseInt($(this).data('step'));
        showStep(currentStep);
    });

    $('.next-step').click(function () {
        currentStep = parseInt($(this).data('step'));
        showStep(currentStep);
    });

    $('.prev-step').click(function () {
        currentStep = parseInt($(this).data('step'));
        showStep(currentStep);
    });

    $('#multi-step-form').submit(function (e) {
        e.preventDefault();
        // alert('Form submitted successfully!');
        // Here, you can send the form data to the server or perform any other action.
    });

    showStep(currentStep);
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
