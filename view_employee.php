<?php
include("connect.php");
require_once 'authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM - View Employee</title>

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

            .btn_allignment{
              padding-top:2rem;
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
           <ul class="step-links">
                <li>
                  <a href="#" class="step-link  " data-step="1">
                  <span class="bs-stepper-circle">1</span>
                  <span class="bs-stepper-label">Overview</span>
                  </a>
                </li>
                <div class="line"></div>
                <li>
                  <a href="#" class="step-link  " data-step="2">
                  <span class="bs-stepper-circle">2</span>
                  <span class="bs-stepper-label">Salary Details</span>
                  </a>
                </li>
                <div class="line"></div>
                <li>
                  <a href="#" class="step-link  " data-step="3">
                  <span class="bs-stepper-circle">3</span>
                  <span class="bs-stepper-label">Attendance</span>
                  </a>
                </li>
            </ul>
           <div id="multi-step-form">

                <div class="step" data-step="1">
                
                    <div class="row">

                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                </div>
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="dist/img/user2-160x160.jpg" class="img-size-50 rounded-circle mb-2" alt="User Image">
                                    <span class="mb-1">John Doe</span>
                                    <span class="mb-2">Position: Manager</span>
                                </div>
                            </div>
                            <div class="card-body">
                              <p class="mb-0">
                                BASIC INFORMATION<br>
                                <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg> &nbsp;&nbsp; asddas@asddads.com</span><br>
                                <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"> <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>&nbsp;&nbsp; Male</span><br>
                                <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"> <path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>&nbsp;&nbsp; 18/08/2023 (Date of Joining)</span><br>
                                <span><svg  version="1.1"  height="1em"viewBox="0 0 512 512" class="icon icon-xxlg"><path d="M259 197c54 0 98-44 98-98S313 1 259 1s-98 44-98 98 44 98 98 98zm0-164c36.4 0 66 29.6 66 66s-29.6 66-66 66-66-29.6-66-66 29.6-66 66-66zM477 336h-45.3c.2-1 .3-2 .3-3v-66c0-14.3-11.7-26-26-26H106c-14.3 0-26 11.7-26 26v66c0 1 .1 2 .3 3H37c-14.3 0-26 11.7-26 26v124c0 14.3 11.7 26 26 26h124c14.3 0 26-11.7 26-26V362c0-14.3-11.7-26-26-26h-49.3c.2-1 .3-2 .3-3v-60h288v60c0 1 .1 2 .3 3H353c-14.3 0-26 11.7-26 26v124c0 14.3 11.7 26 26 26h124c14.3 0 26-11.7 26-26V362c0-14.3-11.7-26-26-26zM155 480H43V368h112v112zm316 0H359V368h112v112z"></path></svg>&nbsp;&nbsp; janitor</span><br>
                                <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>&nbsp;&nbsp; Head Office</span>
                              </p>
                              <hr>
                              <div class="form-group">
                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                  <label class="custom-control-label" for="customSwitch1">Professional Taxelement</label>
                                </div>
                              </div>
                              <hr>
                               <div class="form-group d-flex justify-content-between">
                                  <div>Portal Access</div>
                                  <div>Disabled <a href="">(Enable)</a></div>
                              </div>

                            </div>
                        </div>

                        </div>

                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div><h5>Personal Information</h5></div>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg></div>
                                  </div>
                            </div>
                            <div class="card-body">
                              <p class="mb-0">
                              Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<br>
                              Father's Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<br>
                              PAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<br>
                              Personal Email Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<br>
                              Mobile Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<br>
                              Residential Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<br>
                              </p>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div><h5>Payment Information</h5></div>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg></div>
                                  </div>
                            </div>
                            <div class="card-body">
                            <div class="form-group d-flex justify-content-between">
                                  <div>Payment Mode</div>
                                  <div>Cheque</div>
                              </div>

                            </div>
                        </div>

                        </div>

                    </div>
                    <!-- <button class="btn btn-primary next-step" data-step="2">Next</button> -->
                </div>

                <div class="step" data-step="2">
                   

                    <div class="row">
                        <div class="col-md-12">
                        <h4>Salary Details <svg xmlns="http://www.w3.org/2000/svg" height="0.7em" viewBox="0 0 512 512"> <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg></h4>
                        </div>
                    </div>

                    <div class="row d-flex mb-1">
                            <div class="col-md-4">
                            ANNUAL CTC<br>
                            <b>₹1,00,000.00 per year</b>
                            </div>
                            <div class="col-md-4">
                            MONTHLY CTC<br>
                            <b>₹8,333.00 per month</b>
                            </div>
                            <div class="col-md-4">
                          
                            </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                        <div class="card-body table-responsive p-0" >
                                  <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>SALARY COMPONENTS</th>
                                            <th>MONTHLY AMOUNT</th>
                                            <th>ANNUAL AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>Earnings<br><br></td>
                                            <td></td>
                                            <td> </td>
                                        </tr>

                                        <tr>
                                            <td>Basic <br>
                                            (50 % of CTC)
                                            </td>
                                            <td class="text-right">₹ 4,167.00</td>
                                            <td class="text-right">₹ 50,004.00</td>
                                        </tr>

                                        <tr>
                                            <td>House Rent Allowance<br>
                                            (50 % of Basic)
                                            </td>
                                            <td class="text-right">₹ 2,084.00</td>
                                            <td class="text-right">₹ 25,008.00</td>
                                        </tr>

                                        <tr>
                                            <td>Fixed Allowance<br><br></td>
                                            <td class="text-right">₹ 2,082.00	</td>
                                            <td class="text-right">₹ 24,984.00	</td>
                                        </tr>

                                        <tr class="bg-secondary">
                                            <td>Cost to Company<br><br></td>
                                            <td class="text-right">₹ 8,333.00	</td>
                                            <td class="text-right">₹ 1,00,000.00</td>
                                        </tr>
                    
                                    </tbody>
                                 </table>
                            </div>
                           <!-- /.card-body -->
                        </div>

                        <div class="card">
                        <div class="card-body d-flex justify-content-between" >
                                  <div><h3>Perquisites ₹0.00</h3></div>
                                    <div><a href="#">VIEW ></a></div>
                            </div>
                           <!-- /.card-body -->
                        </div>
                      </div>
                    </div>

                    <!-- <button class="btn btn-primary prev-step" data-step="1">Previous</button> -->
                    
                </div>

                <div class="step" data-step="3">
                  <form>
                        <div class="row">
                                
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="month">Month</label>
                                    <select id="monthSelect" class="form-control">
                                        <option  value="">Select a month</option>
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

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <select id="yearSelect" class="form-control">
                                        <option  value="">Select a year</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div id="buttons" class="d-none btn_allignment">
                                    <button id="button1" class="btn btn-primary">Import</button>
                                    <button id="button2" class="btn btn-secondary">Export</button>
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">
                              <div class="col-sm-12">
                                <div class="card">
                                <div class="card-body table-responsive p-0" >
                                          <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Day 1</th>
                                                    <th>Day 2</th>
                                                    <th>Day 3</th>
                                                    <th>Day 4</th>
                                                    <th>Day 5</th>
                                                    <th>Day 6</th>
                                                    <th>Day 7</th>
                                                    <th>Day 8</th>
                                                    <th>Day 9</th>
                                                    <th>Day 10</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
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

                        <div class="row">
                              <div class="col-sm-12">
                                <div class="card">
                                <div class="card-body table-responsive p-0" >
                                          <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Day 11</th>
                                                    <th>Day 12</th>
                                                    <th>Day 13</th>
                                                    <th>Day 14</th>
                                                    <th>Day 15</th>
                                                    <th>Day 16</th>
                                                    <th>Day 17</th>
                                                    <th>Day 18</th>
                                                    <th>Day 19</th>
                                                    <th>Day 20</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
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

                        <div class="row">
                              <div class="col-sm-12">
                                <div class="card">
                                <div class="card-body table-responsive p-0" >
                                          <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Day 21</th>
                                                    <th>Day 22</th>
                                                    <th>Day 23</th>
                                                    <th>Day 24</th>
                                                    <th>Day 25</th>
                                                    <th>Day 26</th>
                                                    <th>Day 27</th>
                                                    <th>Day 28</th>
                                                    <th>Day 29</th>
                                                    <th>Day 30</th>
                                                    <th>Day 31</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option  >Select Attendance</option>
                                                              <option    >Full Day</option>
                                                              <option   >Half day</option>
                                                              <option  >Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option >Select Attendance</option>
                                                              <option>Full Day</option>
                                                              <option>Half day</option>
                                                              <option>Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                          <label for="attendance">S A</label>
                                                          <select id="attendance" class="form-control">
                                                              <option>Select Attendance</option>
                                                              <option>Full Day</option>
                                                              <option>Half day</option>
                                                              <option>Absent</option>
                                                          </select>
                                                      </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="intime">In Time </label>
                                                        <input type="text" class="form-control" id="intime" placeholder="In Time">
                                                      </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
                                                      </div>
                                                    </td>
                                                    <td>
                                                      <div class="form-group">
                                                        <label for="outtime">Out Time </label>
                                                        <input type="text" class="form-control" id="outtime" placeholder="Out Time">
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

    $(document).ready(function () {
        // Function to check if both month and year are selected
        function checkSelection() {
            var month = $("#monthSelect").val();
            var year = $("#yearSelect").val();

            if (month && year) {
                $("#buttons").removeClass("d-none");
            } else {
                $("#buttons").addClass("d-none");
            }
        }

        // Initially hide the buttons
        $("#buttons").addClass("d-none");

        // Listen for changes in the select elements
        $("#monthSelect, #yearSelect").change(function () {
            checkSelection();
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
