<?php


$host = "148.72.232.182";
$user= "tkchelliah";
$password = "TKCthaththa@1882";
$database = "tkchelliah_";


$myPhoneno = $_GET['phone'];

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected";

$sql = "SELECT name from Rasigamani_TKC_download_details where phone_no ='".$myPhoneno."'";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

include('Way2SMS-API/way2sms-api.php');
sendWay2SMS( '9739190565' , 'Gurgaon' , '".$myPhoneno."' , 'Hi Preethi');

?>