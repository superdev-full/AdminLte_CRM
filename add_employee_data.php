<?php
include("connect.php");
require_once 'authentication.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
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

    $sql = "INSERT INTO `employees` (`employeeName`, `employeeMiddleName`,`employeeLastName`,`dateOfBirth`,`placeOfBirth`,`motherTongue`,
`religion`,`foodHabit`,`BloodGroup`,`relativesName`,`relativesRelation`,`relativesDateOfBirth`,`occuption`,`Sex`,`Age`,`employeeId`,
`startDate`,`endDate`,`siteName`,`DesignationName`,`PFNumber`,`UAN`,`ESI`,`PAN`,`AadharNumber`,`drivingLicenseNumber`,`bankName`,
`IFSC`,`Branch`,`AccountName`,`contactDoorNumber`,`contactStreet`,`contactArea`,`contactCity`,`contactDistrict`,`contactState`,
`contactPostalCode`,`localDoorNumber`,`localStreet`,`localArea`,`localCity`,`localDistrict`,`localState`,`localPostalCode`,
`mobileNumber`,`landlineNumber`,`alternateNumber`,`spouseNumber`,`motherNumber`,`fatherNumber`,`emailID`,`qualification`,
`degree`,`institution`,`period`,`class`,`Year`,`Marks`,`CompanyName`,`Designation`,`salary`,`dateOfJoining`,`employeePeriod`,
`reasonForLeaving`)
    VALUES ('$employeeName','$employeeMiddleName','$employeeLastName','$dateOfBirth','$placeOfBirth','$motherTongue','$religion','$foodHabit',
'$BloodGroup','$serializedName','$serializedRelation','$serializedDates','$serializedOccuption','$serializedSex','$serializedAge','$employeeId','$startDate','$endDate',
'$siteName','$DesignationName','$PFNumber','$UAN','$ESI','$PAN','$AadharNumber','$drivingLicenseNumber','$bankName','$IFSC','$Branch',
'$AccountName','$contactDoorNumber','$contactStreet','$contactArea','$contactCity','$contactDistrict','$contactState','$contactPostalCode', 
'$localDoorNumber','$localStreet','$localArea','$localCity','$localDistrict','$localState','$localPostalCode','$mobileNumber','$landlineNumber',
'$alternateNumber','$spouseNumber','$motherNumber','$fatherNumber','$emailID','$serializedQualification','$serializedDegree','$serializedInstition','$serializedWorkPeriod','$serializedClass',
'$serializedYear','$serializedMarks','$serializedCompanyName','$serializedDesignation','$serializedSalary','$serializedDateOfJoining','$serializedPeriod','$serializedReasonForLeaving'
)";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Employee Data Submitted Successfully'); window.location.href = 'manage_employee.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Form not submitted";
}
