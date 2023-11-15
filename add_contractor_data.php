<?php
include ("connect.php");
require_once 'authentication.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $contractorname = $_POST['contractorname'];
    $contractorid = $_POST['contractorid'];
    $contractorstartdate = $_POST['contractorstartdate'];
    $contractorenddate = $_POST['contractorenddate'];
    $addressfirstline = $_POST['addressfirstline'];
    $addresssecondline = $_POST['addresssecondline'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $emailid = $_POST['emailid'];
    $website = $_POST['website'];
    $contactpersonname = $_POST['contactpersonname'];
    $designation = $_POST['designation'];
    $mobilenumber = $_POST['mobilenumber'];
    $landlinenumber = $_POST['landlinenumber'];
    $extn = $_POST['extn'];
    $contactpersonemailid = $_POST['contactpersonemailid'];
    $pannumber = $_POST['pannumber'];
    $tannumber = $_POST['tannumber'];
    $gstnumber = $_POST['gstnumber'];

    $sql = "INSERT INTO `contractor_details` (`contractorname`, `contractorid`, `contractorstartdate`, `contractorenddate`, 
        `addressfirstline`, `addresssecondline`, `city`, `state`, `country`, `emailid`, `website`, `contactpersonname`, 
        `designation`, `mobilenumber`, `landlinenumber`, `extn`, `contactpersonemailid`, `pannumber`, `tannumber`, `gstnumber`) 
        VALUES ('$contractorname', '$contractorid', '$contractorstartdate', '$contractorenddate', 
                '$addressfirstline', '$addresssecondline', '$city', '$state', '$country', '$emailid', '$website', 
                '$contactpersonname', '$designation', '$mobilenumber', '$landlinenumber', '$extn', 
                '$contactpersonemailid', '$pannumber', '$tannumber', '$gstnumber')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Contractor Data Submitted Successfully'); window.location.href = 'manage_contractor.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Form not submitted";
}
?>
