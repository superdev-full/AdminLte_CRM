<?php
include("connect.php");
require_once 'authentication.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $quer = "SELECT * FROM employees WHERE employee_id = ?";

    $stmt = mysqli_prepare($conn, $quer);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the data
    $row = mysqli_fetch_assoc($result);

    // Check if there is a matching record
    if ($row) {
        // Decode the JSON-encoded relativesName field
        $relativesDataNameArray = json_decode($row['relativesName'], true);
        $relativesDataRelationArray = json_decode($row['relativesRelation'], true);
        $relativesDataDateOfBirthArray = json_decode($row['relativesDateOfBirth'], true);
        $relativesDataoccuptionArray = json_decode($row['occuption'], true);
        $relativesDataSexArray = json_decode($row['Sex'], true);
        $relativesDataAgeArray = json_decode($row['Age'], true);
        $workDetQualifications = json_decode($row['qualification'], true);
        $workDetDegree = json_decode($row['degree'], true);
        $workDetInstitution = json_decode($row['institution'], true);
        $workDetPeriod = json_decode($row['period'], true);
        $workDetClass = json_decode($row['class'], true);
        $workDetYear = json_decode($row['Year'], true);
        $workDetMarks = json_decode($row['Marks'], true);
        $ExperinceCompanyName = json_decode($row['CompanyName'], true);
        $ExperinceDesignation = json_decode($row['Designation'], true);
        $ExperinceSalary = json_decode($row['salary'], true);
        $ExperincedateOfJoining = json_decode($row['dateOfJoining'], true);
        $ExperinceReasonForLeaving = json_decode($row['reasonForLeaving'], true);
        $ExperinceEmployeePeriod = json_decode($row['employeePeriod'], true);
    } else {
        echo json_encode(['error' => 'No employee found with the given ID']);
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRM - Add Employee</title>

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
        /* .bs-stepper-content {
    padding: 3% 10%;
} */

        /* .bg-row{
  background-color: #f6f8ff;
} */

        /* .bs-main-stepper-header {
  position: sticky;
  top: 0;
  background-color: white;
  border-bottom:2px solid rgb(0 0 0 / 10%);
  z-index: 100; 
  ;
}

  .row2 {
            cursor: pointer;
            transition: background-color 0.3s ease;
            padding-bottom: 2%;
    padding-top: 2%;
        }

        .row2:hover {
            background-color: #f0f0f0; 
        }

        .row2.selected {
            background-color: #ccc;
        }

        .form-container {
            display: none;
        } */




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
                        <div class="col-md-12">
                            <!-- <div class="card card-default"> -->
                            <!-- <div class="card-header"> -->


                            <!-- </div> -->
                            <!-- <div class="card-body p-0"> -->
                            <div class="bs-stepper mb-2">
                                <ul class="step-links">
                                    <li><a href="#" class="step-link  " data-step="1">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Basic Information </span>
                                        </a></li>
                                    <div class="line"></div>
                                    <li><a href="#" class="step-link  " data-step="2">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Salary Details</span>
                                        </a></li>
                                    <div class="line"></div>
                                    <li><a href="#" class="step-link  " data-step="3">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Contact Information</span>
                                        </a></li>
                                    <div class="line"></div>
                                    <li><a href="#" class="step-link  " data-step="4">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Work details</span>
                                        </a></li>
                                </ul>

                                <form action="edit_employee_data.php" method="POST">

                                    <div class="step" data-step="1">
                                        <h2>Step 1: Basic Information </h2>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Personal Details </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <input type="hidden" value="<?= $row['employee_id'] ?>" name="employee_id">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="examplefirstname">Employee Name</label>
                                                            <input type="text" class="form-control" id="examplefirstname" placeholder="First Name" name="employeeName" required value="<?= $row['employeeName'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="examplemiddlename"> </label>
                                                            <input type="text" class="form-control mt-2" id="examplemiddlename" placeholder="Middle Name" name="employeeMiddleName" value="<?= $row['employeeMiddleName'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="examplelastname"> </label>
                                                            <input type="text" class="form-control mt-2" id="examplelastname" placeholder="Last Name" name="employeeLastName" value="<?= $row['employeeLastName'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group ">
                                                            <label for="dateofbirth">Date of Birth</label>
                                                            <div class="input-group">
                                                                <input type="date" class="form-control" name="dateOfBirth" value="<?= $row['dateOfBirth'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="placeofbirth"> </label>
                                                            <input type="text" class="form-control mt-2" id="placeofbirth" placeholder="Place of Birth" name="placeOfBirth" value="<?= $row['placeOfBirth'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="mothertongue"> </label>
                                                            <input type="text" class="form-control mt-2" id="mothertongue" placeholder="Mother Tongue" name="motherTongue" value="<?= $row['motherTongue'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="religion">Religion</label>
                                                            <input type="text" class="form-control" id="religion" name="religion" value="<?= $row['religion'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="foodhabbbit">Food Habbit</label>
                                                            <select class="form-control" name="foodHabit" required>
                                                                <option value="option 1">option 1</option>
                                                                <option value="option 2">option 2</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="bloodgroup">Blood Group</label>
                                                            <select class="form-control" name="BloodGroup" required>
                                                                <option value="option 1">option 1</option>
                                                                <option value="option 2">option 2</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div id="actions" class="row">
                                                    <div class="col-lg-6">
                                                        <div class="btn-group w-100">
                                                            <span class="btn btn-success col fileinput-button">
                                                                <i class="fas fa-plus"></i>
                                                                <span>Add files</span>
                                                            </span>
                                                            <button type="submit" class="btn btn-primary col start">
                                                                <i class="fas fa-upload"></i>
                                                                <span>Start upload</span>
                                                            </button>
                                                            <button type="reset" class="btn btn-warning col cancel">
                                                                <i class="fas fa-times-circle"></i>
                                                                <span>Cancel upload</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 d-flex align-items-center">
                                                        <div class="fileupload-process w-100">
                                                            <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Relatives </h3>
                                                <!-- name="prof[]" -->
                                            </div>
                                            <div class="card-body">
                                                <?php
                                                $relativesDataNameArray = isset($relativesDataNameArray) && is_array($relativesDataNameArray) ? $relativesDataNameArray : [];
                                                $relativesDataRelationArray = isset($relativesDataRelationArray) && is_array($relativesDataRelationArray) ? $relativesDataRelationArray : [];
                                                $relativesDateOfBirth = isset($relativesDateOfBirth) && is_array($relativesDateOfBirth) ? $relativesDateOfBirth : [];
                                                $relativesDataoccuptionArray = isset($relativesDataoccuptionArray) && is_array($relativesDataoccuptionArray) ? $relativesDataoccuptionArray : [];
                                                $relativesDataAgeArray = isset($relativesDataAgeArray) && is_array($relativesDataAgeArray) ? $relativesDataAgeArray : [];
                                                $relativesDataSexArray = isset($relativesDataSexArray) && is_array($relativesDataSexArray) ? $relativesDataSexArray : [];
                                                $count = count($relativesDataNameArray);
                                                for ($i = 0; $i < $count; $i++) {
                                                    $relativeName = $relativesDataNameArray[$i];
                                                    $relativRelation = $relativesDataRelationArray[$i];
                                                    $relativeAge = $relativesDataAgeArray[$i];
                                                    $relativeDateOfBirth = $relativesDataDateOfBirthArray[$i];
                                                    $relativeOccuption = $relativesDataoccuptionArray[$i];
                                                    $relativeSex = $relativesDataSexArray[$i];

                                                ?>
                                                    <input type="hidden" name="count" value="<?= $count ?>" />
                                                    <div class="control-group" id="fields<?= $i + 1 ?>">
                                                        <div class="controls" id="profs<?= $i + 1 ?>">
                                                            <div class="field-row">
                                                                <!-- <form class="input-append"> -->
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>

                                                                            <input type="text" class="form-control input" id="name" placeholder="Name" name="relativesName[]" autocomplete="off" data-items="8" value="<?= $relativeName ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="relation">Relation</label>
                                                                            <input type="text" class="form-control input" id="relation" placeholder="Relation" name="relativesRelation[]" autocomplete="off" data-items="8" value="<?= $relativRelation ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group ">
                                                                            <label for="dateofbirth">Date of Birth</label>
                                                                            <div class="input-group">
                                                                                <input type="date" class="form-control input" autocomplete="off" data-items="8" name="relativesDateOfBirth[]" value="<?= $relativeDateOfBirth ?>" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="occupation">Occupation</label>
                                                                            <input type="text" class="form-control input" id="occupation" placeholder="Occupation" name="occuption[]" autocomplete="off" data-items="8" value="<?= $relativeOccuption ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="gender">Sex</label>
                                                                            <select class="form-control" name="Sex[]" required>
                                                                                <option value="male">Male</option>
                                                                                <option value="female">Female</option>
                                                                                <option value="others">Others</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="age">Age</label>
                                                                            <input type="number" class="form-control input" id="age" placeholder="Age" autocomplete="off" data-items="8" name="Age[]" value="<?= $relativeAge ?>" required>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                <!-- </form> -->
                                                                <button class="btn btn-danger toggle-add-remove">-</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Work Details </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="employeeid">Employee Id</label>
                                                            <input type="text" class="form-control" id="employeeid" placeholder="Employee Id" name="employeeId" value="<?= $row['employeeId'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group ">
                                                            <label for="startdate">Start Date</label>
                                                            <div class="input-group">
                                                                <input type="date" class="form-control" name="startDate" value="<?= $row['startDate'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group ">
                                                            <label for="enddate">End Date</label>
                                                            <div class="input-group">
                                                                <input type="date" class="form-control" name="endDate" value="<?= $row['endDate'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Site Name</label>
                                                            <select class="form-control select2bs4" style="width: 100%;" name="siteName" required>
                                                                <option value="Alabama">Alabama</option>
                                                                <option value="Alaska">Alaska</option>
                                                                <option value="Delaware">Delaware</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Designation Name</label>
                                                            <select class="form-control select2bs4" style="width: 100%;" name="DesignationName" required>
                                                                <option value="Alabama">Alabama</option>
                                                                <option value="Alaska">Alaska</option>
                                                                <option value="Delaware">Delaware</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary next-step" data-step="2">Save and Continue</button>
                                    </div>

                                    <div class="step" data-step="2">
                                        <h2>Step 2: Salary Details</h2>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Tax and ID Information </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pfnumber">PF Number</label>
                                                            <input type="text" class="form-control" id="pfnumber" name="PFNumber" placeholder="PF Number" value="<?= $row['PFNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="uan"> UAN</label>
                                                            <input type="text" class="form-control" id="uan" placeholder="UAN" name="UAN" value="<?= $row['UAN'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="esi">ESI </label>
                                                            <input type="text" class="form-control" id="esi" placeholder="ESI" name="ESI" value="<?= $row['ESI'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pan">PAN</label>
                                                            <input type="text" class="form-control" id="pan" placeholder="PAN" name="PAN" value="<?= $row['PAN'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="adhaar"> Aadhar Number</label>
                                                            <input type="text" class="form-control" id="adhaar" placeholder="Aadhar Number" name="AadharNumber" value="<?= $row['AadharNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="driving">Driving License Number </label>
                                                            <input type="text" class="form-control" id="driving" placeholder="Driving License Number" name="drivingLicenseNumber" value="<?= $row['drivingLicenseNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Bank Details </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="bank">Bank Name</label>
                                                            <input type="text" class="form-control" id="bank" placeholder="Bank Name" name="bankName" value="<?= $row['bankName'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="ifsc"> IFSC</label>
                                                            <input type="text" class="form-control" id="ifsc" placeholder="IFSC" name="IFSC" value="<?= $row['IFSC'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="branch">Branch</label>
                                                            <input type="text" class="form-control" id="branch" placeholder="Branch" name="Branch" value="<?= $row['Branch'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="account"> Account Number</label>
                                                            <input type="text" class="form-control" id="account" placeholder="Account Number" name="AccountName" value="<?= $row['AccountName'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <button class="btn btn-primary prev-step" data-step="1">Previous</button>
                                        <button class="btn btn-primary next-step" data-step="3">Save and Continue</button>
                                    </div>

                                    <div class="step" data-step="3">
                                        <h2>Step 3: Contact Details</h2>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Permanent Address </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="door">Door Number</label>
                                                            <input type="text" class="form-control" id="door" placeholder="Door Number" name="contactDoorNumber" value="<?= $row['contactDoorNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="street"> Street</label>
                                                            <input type="text" class="form-control" id="street" placeholder="Street" name="contactStreet" value="<?= $row['contactStreet'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="esi">Area </label>
                                                            <input type="text" class="form-control" id="area" placeholder="Area" name="contactArea" value="<?= $row['contactArea'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="city">City</label>
                                                            <input type="text" class="form-control" id="city" placeholder="City" name="contactCity" value="<?= $row['contactCity'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="district">District</label>
                                                            <input type="text" class="form-control" id="district" placeholder="District" name="contactDistrict" value="<?= $row['contactDistrict'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <select class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="contactState" required>
                                                                <option value="Alabama">Alabama</option>
                                                                <option value="Alaska">Alaska</option>
                                                                <option value="California">California</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="postal">Postal Code</label>
                                                            <input type="number" class="form-control" id="postal" placeholder="Postal Code" name="contactPostalCode" value="<?= $row['contactPostalCode'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Copy Permanent address<br>
                                                        <h3>Local Address</h3>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="door">Door Number</label>
                                                            <input type="text" class="form-control" id="door" placeholder="Door Number" name="localDoorNumber" value="<?= $row['localDoorNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="street"> Street</label>
                                                            <input type="text" class="form-control" id="street" placeholder="Street" name="localStreet" value="<?= $row['localStreet'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="esi">Area </label>
                                                            <input type="text" class="form-control" id="area" placeholder="Area" name="localArea" value="<?= $row['localArea'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="city">City</label>
                                                            <input type="text" class="form-control" id="city" placeholder="City" name="localCity" value="<?= $row['localCity'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="district">District</label>
                                                            <input type="text" class="form-control" id="district" placeholder="District" name="localDistrict" value="<?= $row['localDistrict'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <select class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="localState" required>
                                                                <option value="Alabama">Alabama</option>
                                                                <option value="Alaska">Alaska</option>
                                                                <option value="California">California</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="postal">Postal Code</label>
                                                            <input type="number" class="form-control" id="postal" placeholder="Postal Code" name="localPostalCode" value="<?= $row['localPostalCode'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Contact Details</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="mobile">Mobile Number</label>
                                                            <input type="text" class="form-control" id="mobile" placeholder="Mobile Number" name="mobileNumber" value="<?= $row['mobileNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="landline"> Landline Number</label>
                                                            <input type="text" class="form-control" id="landline" placeholder="Landline Number" name="landlineNumber" value="<?= $row['landlineNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="alternate">Alternate Number</label>
                                                            <input type="text" class="form-control" id="alternate" placeholder="Alternate Number" name="alternateNumber" value="<?= $row['alternateNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="spouse">Spouse Number</label>
                                                            <input type="text" class="form-control" id="spouse" placeholder="Spouse Number" name="spouseNumber" value="<?= $row['spouseNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="mother">Mother Number</label>
                                                            <input type="text" class="form-control" id="mother" placeholder="Mother Number" name="motherNumber" value="<?= $row['motherNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="father">Father Number</label>
                                                            <input type="text" class="form-control" id="father" placeholder="Father Number" name="fatherNumber" value="<?= $row['fatherNumber'] ?>" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">Email id</label>
                                                            <input type="email" class="form-control email-input" id="email" placeholder="Email id" name="emailID" value="<?= $row['emailID'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <button class="btn btn-primary prev-step" data-step="2">Previous</button>
                                        <button class="btn btn-primary next-step" data-step="4">Save and Continue</button>
                                    </div>


                                    <div class="step" data-step="4">
                                        <h2>Step 4: Work details</h2>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Academics</h3>
                                            </div>
                                            <div class="card-body">
                                                <?php
                                                $workDetQualifications = isset($workDetQualifications) && is_array($workDetQualifications) ? $workDetQualifications : [];
                                                $workDetClass = isset($workDetClass) && is_array($workDetClass) ? $workDetClass : [];
                                                $workDetPeriod = isset($workDetPeriod) && is_array($workDetPeriod) ? $workDetPeriod : [];
                                                $workDetInstitution = isset($workDetInstitution) && is_array($workDetInstitution) ? $workDetInstitution : [];
                                                $workDetMarks = isset($workDetMarks) && is_array($workDetMarks) ? $workDetMarks : [];
                                                $workDetDegree = isset($workDetDegree) && is_array($workDetDegree) ? $workDetDegree : [];
                                                $workDetYear = isset($workDetYear) && is_array($workDetYear) ? $workDetYear : [];
                                                $count1 = count($workDetQualifications);
                                                for ($i = 0; $i < $count1; $i++) {
                                                    $qualification = $workDetQualifications[$i];
                                                    $class = $workDetClass[$i];
                                                    $period = $workDetPeriod[$i];
                                                    $year = $workDetYear[$i];
                                                    $marks = $workDetMarks[$i];
                                                    $institution = $workDetInstitution[$i];
                                                    $degree = $workDetDegree[$i];

                                                ?>
                                                    <input type="hidden" name="count" value="<?= $count1 ?>" />
                                                    <div class="control-group" id="fields<?= $i + 1 ?>">
                                                        <div class="controls" id="profs<?= $i + 1 ?>">
                                                            <div class="field-row">
                                                                <!-- <form class="input-append"> -->
                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="qualification">Qualification</label>
                                                                            <input type="text" class="form-control" id="qualification" placeholder="Qualification" name="qualification[]" value="<?= $qualification ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="degree"> Degree</label>
                                                                            <input type="text" class="form-control" id="degree" placeholder="Degree" name="degree[]" value="<?= $degree ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="institution">Institution </label>
                                                                            <input type="text" class="form-control" id="institution" name="institution[]" placeholder="Institution" value="<?= $institution ?>" required>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="period">Period</label>
                                                                            <input type="text" class="form-control" id="period" placeholder="Period" name="period[]" value="<?= $period ?>" required>

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="class"> Class</label>
                                                                            <input type="text" class="form-control" id="class" placeholder="Class" name="class[]" value="<?= $class ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="year">Year</label>
                                                                            <input type="text" class="form-control" id="year" placeholder="Year" name="Year[]" value="<?= $year ?>" required>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="marks">Marks%</label>
                                                                            <input type="number" class="form-control" id="marks" placeholder="Marks" name="Marks[]" value="<?= $marks ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4"></div>

                                                                    <div class="col-md-4"></div>

                                                                </div>
                                                                <!-- </form> -->
                                                                <button class="btn btn-danger toggle-add-remove">-</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Work Experience </h3>
                                            </div>
                                            <div class="card-body">

                                                <?php
                                                $ExperinceCompanyName = isset($ExperinceCompanyName) && is_array($ExperinceCompanyName) ? $ExperinceCompanyName : [];
                                                $ExperincedateOfJoining = isset($ExperincedateOfJoining) && is_array($ExperincedateOfJoining) ? $ExperincedateOfJoining : [];
                                                $ExperinceDesignation = isset($ExperinceDesignation) && is_array($ExperinceDesignation) ? $ExperinceDesignation : [];
                                                $ExperinceEmployeePeriod = isset($ExperinceEmployeePeriod) && is_array($ExperinceEmployeePeriod) ? $ExperinceEmployeePeriod : [];
                                                $ExperinceSalary = isset($ExperinceSalary) && is_array($ExperinceSalary) ? $ExperinceSalary : [];
                                                $ExperinceReasonForLeaving = isset($ExperinceReasonForLeaving) && is_array($ExperinceReasonForLeaving) ? $ExperinceReasonForLeaving : [];
                                                $count2 = count($ExperinceCompanyName);
                                                for ($i = 0; $i < $count2; $i++) {
                                                    $CompanyName = $ExperinceCompanyName[$i];
                                                    $dateOfJoining = $ExperincedateOfJoining[$i];
                                                    $salary = $ExperinceSalary[$i];
                                                    $designation = $ExperinceDesignation[$i];
                                                    $ExpPeriod = $ExperinceEmployeePeriod[$i];
                                                    $reasonForLeaving = $ExperinceReasonForLeaving[$i];

                                                ?>
                                                    <input type="hidden" name="count" value="<?= $count2 ?>" />
                                                    <div class="control-group" id="fields<?= $i + 1 ?>">
                                                        <div class="controls" id="profs<?= $i + 1 ?>">
                                                            <div class="field-row">
                                                                <!-- <form class="input-append"> -->
                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="company">Company name</label>
                                                                            <input type="text" class="form-control" id="company" placeholder="Company name" name="CompanyName[]" value="<?= $CompanyName ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="designation"> Designation</label>
                                                                            <input type="text" class="form-control" id="designation" placeholder="Designation" name="Designation[]" value="<?= $designation ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="salary">Salary </label>
                                                                            <input type="number" class="form-control" id="salary" placeholder="Salary" name="salary[]" value="<?= $salary ?>" required>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <div class="form-group ">
                                                                            <label for="dateofjoining">Date of Joining</label>
                                                                            <div class="input-group">
                                                                                <input type="date" class="form-control" name="dateOfJoining[]" value="<?= $dateOfJoining ?>" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="period2">Period</label>
                                                                            <input type="text" class="form-control" id="period2" placeholder="Period" name="employeePeriod[]" value="<?= $ExpPeriod ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="reason">Reason for leaving</label>
                                                                            <input type="text" class="form-control" id="reason" placeholder="Reason for leaving" name="reasonForLeaving[]" value="<?= $reasonForLeaving ?>" required>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!-- </form> -->
                                                                <button class="btn btn-danger toggle-add-remove">-</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary prev-step" data-step="3">Previous</button>
                                        <button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
                                    </div>

                                </form>


                            </div>

                            <!-- </div> -->
                            <!-- /.card-body -->
                            <!-- <div class="card-footer">
                Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
              </div> -->
                            <!-- </div> -->
                            <!-- /.card -->
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
                        <h5 class="modal-title" id="exampleModalLabel">New Designation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="examplemiddlename">Designation Name</label>
                        <input type="text" class="form-control" id="designationname" placeholder="Designation Name">
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
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
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
        $(document).ready(function() {
            $(document).on('click', '.toggle-add-remove', function(e) {
                e.preventDefault();
                var button = $(this);
                var fieldRow = $(this).closest('.field-row');

                if (button.text() === "-") {
                    fieldRow.remove();
                } else {
                    var clone = fieldRow.clone();
                    button.text("+");
                    button.removeClass('btn-primary').addClass('btn-primary');
                }
            });
        });

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