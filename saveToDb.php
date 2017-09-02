<?php
require_once('Way2SMS-API/way2sms-api.php');

$host = "148.72.232.182";
$user= "tkchelliah";
$password = "TKCthaththa@1882";
$database = "tkchelliah_";

$myName = $_GET['name'];
$myEmail = $_GET['email'];
$myLocation = $_GET['location'];
$myPhoneno = $_GET['phone'];
$otp = $_GET['otp'];

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$otp = mt_rand(1000,9999);
//$abc = sendWay2SMS( '9739190565' , 'Gurgaon' , $myPhoneno , 'OTP : '.$otp);
//$sql = "INSERT INTO Rasigamani_TKC_download_details(phone_no,otp) VALUES ($myPhoneno,$otp)";
///$conn->query($sql);


$sql = "UPDATE Rasigamani_TKC_download_details SET name = '".$myName."', email = '".$myEmail."',location = '".$myLocation."' WHERE phone_no = $myPhoneno AND otp = $otp";
$conn->query($sql);
if (mysqli_affected_rows($conn) > 0 ) {
	echo "Success";
    return "Success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    return "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>