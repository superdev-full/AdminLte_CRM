<?php
include("connect.php");
require_once 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM - Reports</title>

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

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
<?php include ('sidebar.php'); ?>

<div class="content-wrapper">
 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
           <div class="col-sm-12">
           <h3>Generate Reports</h3>
                <div class="card">
                    <div class="card-body" >
                        <h5 class="text-center">Common Reprts</h5>
                        <form>

                            <div class="row justify-content-center">
                                <div class="form-check pr-5">
                                    <input class="form-check-input" type="radio" id="monthly" name="radio1" value="monthly">
                                    <label class="form-check-label" for="monthly">Monthly</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="datewise" name="radio1" value="datewise">
                                    <label class="form-check-label" for="datewise">Datewise</label>
                                </div>
                            </div>

                            <div class="row" id="monthlyOptions" style="display: none;">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>From</label>
                                        <select name="month1" class="form-control">
                                                <option value="January">January</option>
                                                <option   value="February">February</option>
                                                <option  value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>To</label>
                                        <select name="month2" class="form-control">
                                                <option value="January">January</option>
                                                <option   value="February">February</option>
                                                <option  value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Report Type</label>
                                        <select name="reporttype" class="form-control">
                                            <option value="type1">Type1</option>
                                            <option value="type2">Type2</option>
                                            <!-- Add options for other months -->
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row" id="datewiseOptions" style="display: none;">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>From</label>
                                        <input type="date" name="startDate" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="date" name="endDate" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Report Type</label>
                                        <select name="reporttype" class="form-control">
                                            <option value="type1">Type1</option>
                                            <option value="type2">Type2</option>
                                            <!-- Add options for other months -->
                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="button" id="generateButton" class="btn btn-primary" style="display: none;">Generate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card">
                    <div class="card-body">
                        <!-- <div class="row">
                          <div class="col-sm-6">
                            <h5 class="text-center">Custom Reports</h5>
                          </div>

                          <div class="col-sm-6">
                          <button class="btn btn-primary toggle-add-remove">+</button>
                          </div>
                        </div> -->
                        <h5 class="text-center">Custom Reports</h5>
                        <form>

                            <div class="row justify-content-center">
                                <div class="form-check pr-5">
                                    <input class="form-check-input" type="radio" id="monthly2" name="reportOption" value="monthly">
                                    <label class="form-check-label" for="monthly2">Monthly</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="datewise2" name="reportOption" value="datewise">
                                    <label class="form-check-label" for="datewise2">Datewise</label>
                                </div>
                            </div>

                            <div class="row" id="monthlyOptions2" style="display: none;">

                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <label>From</label>
                                                <select name="month1" class="form-control">
                                                        <option value="January">January</option>
                                                        <option   value="February">February</option>
                                                        <option  value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                </select>
                                               </div>
                                            </div>
                                              
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <label>To</label>
                                                <select name="month2" class="form-control">
                                                        <option value="January">January</option>
                                                        <option   value="February">February</option>
                                                        <option  value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                </select>
                                              </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <input type="hidden" name="monthlyCount" value="1" />
                                                <div class="control-group" id="monthlyFields">
                                                    <div class="controls" id="monthlyProfs">
                                                        <div class="field-row">
                                                            <div class="input-append">
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Report Type</label>
                                                                            <select name="reporttype" id="reporttypeMonthly" class="form-control">
                                                                                <option value="type1">Type1</option>
                                                                                <option value="type2">Type2</option>
                                                                                <!-- Add options for other report types -->
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6" style="padding-top: 2rem;">
                                                                        <button class="btn btn-primary toggle-add-remove">+</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            </div>

                            <div class="row" id="datewiseOptions2" style="display: none;">
                            
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>From</label>
                                                        <input type="date" name="startDate" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>To</label>
                                                        <input type="date" name="endDate" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <input type="hidden" name="datewiseCount" value="1" />
                                                    <div class="control-group" id="datewiseFields">
                                                        <div class="controls" id="datewiseProfs">
                                                            <div class="field-row">
                                                                <div class="input-append">
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Report Type</label>
                                                                                <select name="reporttype" id="reporttypeDatewise" class="form-control">
                                                                                    <option value="type1">Type1</option>
                                                                                    <option value="type2">Type2</option>
                                                                                    <!-- Add options for other report types -->
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6" style="padding-top: 2rem;">
                                                                            <button class="btn btn-primary toggle-add-remove">+</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="button" id="generateButton2" class="btn btn-primary" style="display: none;">Generate</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                
           </div>
       </div>
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
        alert('Form submitted successfully!');
        // Here, you can send the form data to the server or perform any other action.
    });

    showStep(currentStep);
});

document.addEventListener("DOMContentLoaded", function () {
        const monthlyRadio = document.getElementById("monthly");
        const datewiseRadio = document.getElementById("datewise");
        const monthlyOptions = document.getElementById("monthlyOptions");
        const datewiseOptions = document.getElementById("datewiseOptions");
        const generateButton = document.getElementById("generateButton");

        // Function to show monthly options and hide datewise options
        function showMonthlyOptions() {
            monthlyOptions.style.display = "flex";
            datewiseOptions.style.display = "none";
            generateButton.style.display = "block";
        }

        // Function to show datewise options and hide monthly options
        function showDatewiseOptions() {
            datewiseOptions.style.display = "flex";
            monthlyOptions.style.display = "none";
            generateButton.style.display = "block";
        }

        // Event listener for monthly radio button
        monthlyRadio.addEventListener("change", function () {
            if (monthlyRadio.checked) {
                showMonthlyOptions();
            }
        });

        // Event listener for datewise radio button
        datewiseRadio.addEventListener("change", function () {
            if (datewiseRadio.checked) {
                showDatewiseOptions();
            }
        });

        // Initial check to see which radio button is selected on page load
        if (monthlyRadio.checked) {
            showMonthlyOptions();
        } else if (datewiseRadio.checked) {
            showDatewiseOptions();
        }

        // Event listener for the "Generate" button
        generateButton.addEventListener("click", function () {
            // Add your code here to generate data or perform an action
            alert("Generating data...");
        });
});

document.addEventListener("DOMContentLoaded", function () {
        const monthlyRadio2 = document.getElementById("monthly2");
        const datewiseRadio2 = document.getElementById("datewise2");
        const monthlyOptions2 = document.getElementById("monthlyOptions2");
        const datewiseOptions2 = document.getElementById("datewiseOptions2");
        const generateButton2 = document.getElementById("generateButton2");

        // Function to show monthly options and hide datewise options
        function showMonthlyOptions2() {
            monthlyOptions2.style.display = "flex";
            datewiseOptions2.style.display = "none";
            generateButton2.style.display = "block";
        }

        // Function to show datewise options and hide monthly options
        function showDatewiseOptions2() {
            datewiseOptions2.style.display = "flex";
            monthlyOptions2.style.display = "none";
            generateButton2.style.display = "block";
        }

        // Event listener for monthly radio button
        monthlyRadio2.addEventListener("change", function () {
            if (monthlyRadio2.checked) {
                showMonthlyOptions2();
            }
        });

        // Event listener for datewise radio button
        datewiseRadio2.addEventListener("change", function () {
            if (datewiseRadio2.checked) {
                showDatewiseOptions2();
            }
        });

        // Initial check to see which radio button is selected on page load
        if (monthlyRadio2.checked) {
            showMonthlyOption2s();
        } else if (datewiseRadio2.checked) {
            showDatewiseOptions2();
        }

        // Event listener for the "Generate" button
        generateButton2.addEventListener("click", function () {
            // Add your code here to generate data or perform an action
            alert("Generating data...");
        });
});

$(document).ready(function () {
    $(document).on('click', '.toggle-add-remove', function (e) {
        e.preventDefault();
        var button = $(this);
        var fieldRow = $(this).closest('.field-row');

        if (button.text() === "+") {
            var clone = fieldRow.clone();
            clone.find('input').val('');

            // Clone and append the select field with options
            var selectField = clone.find('select[name="reporttype"]');
            var newSelectField = selectField.clone();

            // You can add options to the new select field here
            newSelectField.find('option').remove(); // Remove existing options if any
            newSelectField.append('<option value="type1">Type1</option>');
            newSelectField.append('<option value="type2">Type2</option>');

            selectField.remove();
            
            // Append the newSelectField inside the 'form-group' div
            clone.find('.form-group').append(newSelectField);

            fieldRow.after(clone);
            button.text("-");
            button.removeClass('btn-primary').addClass('btn-danger');
        } else {
            fieldRow.remove();
        }
    });
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
