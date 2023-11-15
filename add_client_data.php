<?php
include("connect.php");
require_once 'authentication.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {

    $contractor_id = $_POST['contractor'];
    $clientname = $_POST['clientname'];
    $clientid = $_POST['clientid'];
    $clientstart = $_POST['startdate'];
    $clientend = $_POST['enddate'];
    $contact_address1 = $_POST['address1'];
    $contact_address2 = $_POST['address2'];
    $contact_city = $_POST['city'];
    $contact_state = $_POST['state'];
    $contact_country = $_POST['country'];
    $contact_emailid = $_POST['email'];
    $contact_website = $_POST['website'];
    $contact_name = $_POST['personname'];
    $contact_designation = $_POST['designation'];
    $contact_mobile = $_POST['mobilenumber'];
    $contact_landline = $_POST['landlinenumber'];
    $contact_extn = $_POST['extn'];
    $contact_emailperson = $_POST['emailperson'];
    $pan = $_POST['pan'];
    $tan = $_POST['tan'];
    $gst = $_POST['gst'];

    $sql = "INSERT INTO `clients` (`contractor_id`, `client_name`, `client_id`, `client_start`, 
        `client_end`, `address_first`, `address_second`, `city`, `state`, `country`, `email`, `website`, `contact_name`, 
        `contact_designation`, `contact_mobile`, `contact_landline`, `contact_extn`, `email_id`, `pan`, `gst`, `tan`) 
        VALUES ('$contractor_id', '$clientname', '$clientid', '$clientstart', '$clientend', 
                '$contact_address1', '$contact_address2', '$contact_city', '$contact_state', '$contact_country', '$contact_emailid', '$contact_website', 
                '$contact_name', '$contact_designation', '$contact_mobile', '$contact_landline', '$contact_extn', '$contact_emailperson',
                '$pan', '$tan', '$gst')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Contractor Data Submitted Successfully'); window.location.href = 'manage_client.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Form not submitted";
}
