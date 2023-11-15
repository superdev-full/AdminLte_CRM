<?php
include("connect.php");
require_once 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM - Add Sites</title>

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
      padding-left: 0px;
      list-style: none;
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

    @media (max-width: 730px) {
      .step-link {
        padding: 0px;
        font-size: 8px;
        font-weight: none;
        margin-right: 0px;
      }

      .bs-stepper .line {
        flex: 1 0 20px;
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include('sidebar.php'); ?>

    <div class="content-wrapper">


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- /.row -->
          <div class="row">
            <div class="col-md-12 bs-stepper">
              <ul class="step-links">
                <li><a href="#" class="step-link" data-step="1">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Basics</span>
                  </a></li>
                <div class="line"></div>
                <li><a href="#" class="step-link" data-step="2">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Contact Details</span>
                  </a></li>
                <div class="line"></div>
                <li><a href="#" class="step-link" data-step="3">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Tax Information</span>
                  </a></li>
                <div class="line"></div>
                <li><a href="#" class="step-link" data-step="4">
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">ARM</span>
                  </a></li>
              </ul>

              <form id="multi-step-form" action="add_sites_data.php" method="POST">


                <div class="step" data-step="1">
                  <h2>Step 1: Basics</h2>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="contractor">Select Client</label>
                        <select class="form-control select2bs4" id="client" name="client" style="width: 100%;" required>
                          <?php
                          $query = "SELECT id, client_name FROM clients";
                          $result = $conn->query($query);
                          if ($result->num_rows > 0) {
                            while ($clientdata = $result->fetch_assoc()) {
                              $name = $clientdata['client_name'];
                              $id = $clientdata['id'];
                          ?>
                              <option value="<?php echo $id; ?>"><?php echo $name; ?> </option>
                          <?php
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="sitename">Site Name</label>
                        <input type="text" class="form-control" id="sitesname" name="sitesname" placeholder="Site Name" required>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="siteid">Site Id</label>
                        <input type="text" class="form-control" id="sitesid" name="sitesid" placeholder="Site Id" required>
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="startdate">Site Start Date</label>
                        <input type="date" class="form-control" id="startdate" name="startdate" placeholder="Site Start Date" required>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="enddate">Site End Date</label>
                        <input type="date" class="form-control" id="enddate" name="enddate" placeholder="Site End Date" required>
                      </div>
                    </div>

                  </div>

                  <button class="btn btn-primary next-step" data-step="2">Save and Continue</button>
                </div>

                <div class="step" data-step="2">
                  <h2>Step 2: Contact Details</h2>

                  <div class="card">
                    <div class="card-body">
                      <div class="row">

                        <div class="col-sm-12">
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1" style="display: inline-block;">Copy from Client<br>
                              <h5 style="display: inline;">Address</h5>
                            </label>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="address1">Address First Line</label>
                            <input class="form-control" type="text" id="address1" name="address1" placeholder="Address First Line" required>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="address2">Address Second Line</label>
                            <input class="form-control" type="text" id="address2" name="address2" placeholder="Address Second Line" required>
                          </div>
                        </div>
                      </div>

                      <div class="row">

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="state">State</label>
                            <select class="form-control select1" style="width: 100%;" id="state" name="state" required>
                              <option selected="selected">State 1</option>
                              <option>State 2</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control select1" style="width: 100%;" id="country" name="country" required>
                              <option selected="selected">Country 1</option>
                              <option>Country 2</option>
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="row">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Email Id</label>
                            <input type="email" class="form-control email-input" id="emailid" name="emailid" placeholder="Email Id" required>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Website</label>
                            <input type="text" class="form-control" id="website" name="website" placeholder="Website" required>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck2" style="display: inline-block;">Copy from Client<br>
                              <h5 style="display: inline;">Contact</h5>
                            </label>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="personname">Contact Person Name</label>
                            <input class="form-control" type="personname" id="contactname" name="contactname" placeholder="Contact Person Name" required>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="designation">Designation</label>
                            <input class="form-control" type="text" id="designation" name="designation" placeholder="Designation" required>
                          </div>
                        </div>

                      </div>

                      <div class="row">

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="mobilenumber">Mobile Number</label>
                            <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" required>
                          </div>
                        </div>

                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="landlinenumber">Landline Number</label>
                            <input type="text" class="form-control" id="landlinenumber" name="landlinenumber" placeholder="Landline Number" required>
                          </div>
                        </div>

                        <div class="col-sm-1">
                          <div class="form-group">
                            <label for="extn">Extn</label>
                            <input type="text" class="form-control" id="extn" name="extn" placeholder="Extn" required>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="emailid">Email Id</label>
                            <input type="email" class="form-control email-input" id="emailperson" name="emailperson" placeholder="Email Id" required>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <button class="btn btn-primary prev-step" data-step="1">Previous</button>
                  <button class="btn btn-primary next-step" data-step="3">Save and Continue</button>
                </div>

                <div class="step" data-step="3">

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1" style="display: inline-block;">Copy from Client<br>
                      <h2 style="display: inline;">Step 3: Tax Information</h2>
                    </label>
                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>PAN</label>
                        <input type="text" class="form-control" id="pan" name="pan" placeholder="PAN" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>TAN</label>
                        <input type="text" class="form-control" id="tan" name="tan" placeholder="TAN" required>
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>GST</label>
                        <input type="text" class="form-control" id="gst" name="gst" placeholder="GST" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                    </div>

                  </div>

                  <button class="btn btn-primary prev-step" data-step="2">Previous</button>
                  <button type="submit" value="submit" name="submit" class="btn btn-success">Submit</button>

                </div>

                <div class="step" data-step="4">
                  <h2>Step 4: ARM</h2>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <div class="row">
                            <div class="col-md-6">
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
                                <th>ARM NAME</th>
                                <th>PHONE NUMBER</th>
                                <th>EMAIL ID</th>
                                <th>JOINED DATE</th>
                                <th>LEFT DATE</th>
                                <th>REMARKS</th>
                                <th>STATUS</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>abc</td>
                                <td>123</td>
                                <td>abc@gmail.com</td>
                                <td>1-1-2020</td>
                                <td>1-1-2022</td>
                                <td>Good</td>
                                <td>ok</td>
                              </tr>
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
                    <label for="contractor">Select ARM</label>
                    <select class="form-control select2bs4" style="width: 100%;">
                      <option selected="selected">ARM 1</option>
                      <option>ARM 2</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="notes">Assign Date</label>
                    <input type="date" class="form-control" id="assigndate" placeholder="Notes">
                  </div>
                </div>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Assign</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })



      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({
        icons: {
          time: 'far fa-clock'
        }
      });

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
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()



      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

      const schemeCheckboxes = document.getElementsByName("scheme-checkbox");
      const epfCheckbox = document.getElementById("epf-checkbox");
      const esiCheckbox = document.getElementById("esi-checkbox");
      const epfForm = document.getElementById("epf-form");
      const esiForm = document.getElementById("esi-form");

      epfCheckbox.addEventListener("change", function() {
        if (this.checked) {
          epfForm.style.display = "block";
          esiForm.style.display = "none";
          esiCheckbox.checked = false;
        } else {
          epfForm.style.display = "none";
        }
      });

      esiCheckbox.addEventListener("change", function() {
        if (this.checked) {
          esiForm.style.display = "block";
          epfForm.style.display = "none";
          epfCheckbox.checked = false;
        } else {
          esiForm.style.display = "none";
        }
      });


    })

    $(document).ready(function() {
      var currentStep = 1;

      function showStep(step) {
        $('.step').hide();
        $('[data-step="' + step + '"]').show();
        // Update the active link in the top navigation
        $('.step-link').removeClass('active');
        $('.step-link[data-step="' + step + '"]').addClass('active');
      }

      function validateStep(step) {
        var isValid = true;
        $('[data-step="' + step + '"] input[required]').each(function() {
          if ($(this).val() === '') {
            isValid = false;
            $(this).css('border', '1px solid red'); // Highlight empty fields
          } else {
            $(this).css('border', ''); // Remove red border if field is filled
          }

          if ($(this).hasClass('email-input')) {
            // Check if the input is for email and validate its format
            var email = $(this).val();
            var emailFormat = /\S+@\S+\.\S+/;
            if (!emailFormat.test(email)) {
              isValid = false;
              $(this).css('border', '1px solid red');
            }
          }
        });
        return isValid;
      }

      $('.step-link').click(function(e) {
        e.preventDefault();
        var clickedStep = parseInt($(this).data('step'));
        if (validateStep(clickedStep)) {
          currentStep = clickedStep;
          showStep(currentStep);
        } else {
          alert('Please fill in all required fields before proceeding.');
        }
      });

      $('.next-step').click(function() {
        var nextStep = parseInt($(this).data('step'));
        if (validateStep(currentStep)) {
          currentStep = nextStep;
          showStep(currentStep);
        } else {}
      });

      $('.prev-step').click(function() {
        var prevStep = parseInt($(this).data('step'));
        currentStep = prevStep;
        showStep(currentStep);
      });

      $('.next-step, .prev-step').click(function(e) {
        e.preventDefault(); // Prevent the default form submission here
      });

      showStep(currentStep);
    });

    $("#assign").click(function() {
      $("#myModal").modal("show");
    });

    // function lettersOnly(input) {
    //   var regex=/[^a-z]/gi;
    //   input.value=input.value.replace(regex,"")
    // }
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
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
      file.previewElement.querySelector(".start").onclick = function() {
        myDropzone.enqueueFile(file)
      }
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