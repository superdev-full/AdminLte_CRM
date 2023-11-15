<?php
include("connect.php");
require_once 'authentication.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['employee_id'])) {
    $employeeID = $_POST['employee_id'];
    $employeeName = $_POST['employeeName'];
    $employeeMiddleName = $_POST['employeeMiddleName'];
    $employeeLastName = $_POST['employeeLastName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $placeOfBirth = $_POST['placeOfBirth'];
    $motherTongue = $_POST['motherTongue'];
    $religion = $_POST['religion'];
    $foodHabit = $_POST['foodHabit'];
    $BloodGroup = $_POST['BloodGroup'];
    $relativesName = $_POST['relativesName'];
    $relativesRelation = $_POST['relativesRelation'];
    $relativesDateOfBirth = $_POST['relativesDateOfBirth'];
    $occuption = $_POST['occuption'];
    $Sex = $_POST['Sex'];
    $Age = $_POST['Age'];
    $employeeId = $_POST['employeeId'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $siteName = $_POST['siteName'];
    $DesignationName = $_POST['DesignationName'];
    $PFNumber = $_POST['PFNumber'];
    $UAN = $_POST['UAN'];
    $ESI = $_POST['ESI'];
    $PAN = $_POST['PAN'];
    $AadharNumber = $_POST['AadharNumber'];
    $drivingLicenseNumber = $_POST['drivingLicenseNumber'];
    $bankName = $_POST['bankName'];
    $IFSC = $_POST['IFSC'];
    $Branch = $_POST['Branch'];
    $AccountName = $_POST['AccountName'];
    $contactDoorNumber = $_POST['contactDoorNumber'];
    $contactStreet = $_POST['contactStreet'];
    $contactArea = $_POST['contactArea'];
    $contactCity = $_POST['contactCity'];
    $contactDistrict = $_POST['contactDistrict'];
    $contactState = $_POST['contactState'];
    $contactPostalCode = $_POST['contactPostalCode'];
    $localDoorNumber = $_POST['localDoorNumber'];
    $localStreet = $_POST['localStreet'];
    $localArea = $_POST['localArea'];
    $localCity = $_POST['localCity'];
    $localDistrict = $_POST['localDistrict'];
    $localState = $_POST['localState'];
    $localPostalCode = $_POST['localPostalCode'];
    $mobileNumber = $_POST['mobileNumber'];
    $landlineNumber = $_POST['landlineNumber'];
    $alternateNumber = $_POST['alternateNumber'];
    $spouseNumber = $_POST['spouseNumber'];
    $motherNumber = $_POST['motherNumber'];
    $fatherNumber = $_POST['fatherNumber'];
    $emailID = $_POST['emailID'];
    $qualification = $_POST['qualification'];
    $degree = $_POST['degree'];
    $institution = $_POST['institution'];
    $period = $_POST['period'];
    $class = $_POST['class'];
    $Year = $_POST['Year'];
    $Marks = $_POST['Marks'];
    $CompanyName = $_POST['CompanyName'];
    $Designation = $_POST['Designation'];
    $salary = $_POST['salary'];
    $dateOfJoining = $_POST['dateOfJoining'];
    $employeePeriod = $_POST['employeePeriod'];
    $reasonForLeaving = $_POST['reasonForLeaving'];
    // Multilple Relatives
    $serializedDates = json_encode($relativesDateOfBirth);
    $serializedName = json_encode($relativesName);
    $serializedRelation = json_encode($relativesRelation);
    $serializedOccuption = json_encode($occuption);
    $serializedSex = json_encode($Sex);
    $serializedAge = json_encode($Age);
    //Multiple Work detail
    $serializedQualification = json_encode($qualification);
    $serializedDegree = json_encode($degree);
    $serializedInstition = json_encode($institution);
    $serializedMarks = json_encode($Marks);
    $serializedClass = json_encode($class);
    $serializedYear = json_encode($Year);
    $serializedWorkPeriod = json_encode($period);
    //Multiple Work Experience
    $serializedCompanyName = json_encode($CompanyName);
    $serializedDesignation = json_encode($Designation);
    $serializedSalary = json_encode($salary);
    $serializedDateOfJoining = json_encode($dateOfJoining);
    $serializedPeriod = json_encode($employeePeriod);
    $serializedReasonForLeaving = json_encode($reasonForLeaving);

    $sql = "UPDATE `employees`
    SET
      `employeeName` = '$employeeName',
      `employeeMiddleName` = '$employeeMiddleName',
      `employeeLastName` = '$employeeLastName',
      `dateOfBirth` = '$dateOfBirth',
      `placeOfBirth` = '$placeOfBirth',
      `motherTongue` = '$motherTongue',
      `religion` = '$religion',
      `foodHabit` = '$foodHabit',
      `BloodGroup` = '$BloodGroup',
      `relativesName` = '$serializedName',
      `relativesRelation` = '$serializedRelation',
      `relativesDateOfBirth` = '$serializedDates',
      `occuption` = '$serializedOccuption',
      `Sex` = '$serializedSex',
      `Age` = '$serializedAge',
      `employeeId` = '$employeeId',
      `startDate` = '$startDate',
      `endDate` = '$endDate',
      `siteName` = '$siteName',
      `DesignationName` = '$DesignationName',
      `PFNumber` = '$PFNumber',
      `UAN` = '$UAN',
      `ESI` = '$ESI',
      `PAN` = '$PAN',
      `AadharNumber` = '$AadharNumber',
      `drivingLicenseNumber` = '$drivingLicenseNumber',
      `bankName` = '$bankName',
      `IFSC` = '$IFSC',
      `Branch` = '$Branch',
      `AccountName` = '$AccountName',
      `contactDoorNumber` = '$contactDoorNumber',
      `contactStreet` = '$contactStreet',
      `contactArea` = '$contactArea',
      `contactCity` = '$contactCity',
      `contactDistrict` = '$contactDistrict',
      `contactState` = '$contactState',
      `contactPostalCode` = '$contactPostalCode',
      `localDoorNumber` = '$localDoorNumber',
      `localStreet` = '$localStreet',
      `localArea` = '$localArea',
      `localCity` = '$localCity',
      `localDistrict` = '$localDistrict',
      `localState` = '$localState',
      `localPostalCode` = '$localPostalCode',
      `mobileNumber` = '$mobileNumber',
      `landlineNumber` = '$landlineNumber',
      `alternateNumber` = '$alternateNumber',
      `spouseNumber` = '$spouseNumber',
      `motherNumber` = '$motherNumber',
      `fatherNumber` = '$fatherNumber',
      `emailID` = '$emailID',
      `qualification` = '$serializedQualification',
      `degree` = '$serializedDegree',
      `institution` = '$serializedInstition',
      `period` = '$serializedWorkPeriod',
      `class` = '$serializedClass',
      `Year` = '$serializedYear',
      `Marks` = '$serializedMarks',
      `CompanyName` = '$serializedCompanyName',
      `Designation` = '$serializedDesignation',
      `salary` = '$serializedSalary',
      `dateOfJoining` = '$serializedDateOfJoining',
      `employeePeriod` = '$serializedPeriod',
      `reasonForLeaving` = '$serializedReasonForLeaving'
    WHERE `employee_id` = '$employeeID';
    ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Employee Data Updated Successfully'); window.location.href = 'manage_employee.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Form not submitted";
}
