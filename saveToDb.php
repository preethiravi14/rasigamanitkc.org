<?php
host = "148.72.232.182";
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

if($myEmail == Null || $myName == Null || $myLocation == NULL || $myPhoneno == Null || $otp == Null || $myEmail == "null" || $myName == "null" || $myLocation == "null" || $myPhoneno == "null" || $otp == "null"){
	echo "Missing required parameters";
	return;
}

$sql = "UPDATE Rasigamani_TKC_download_details SET name = '".$myName."', email = '".$myEmail."',location = '".$myLocation."' WHERE phone_no = $myPhoneno AND otp = $otp";

$query =  mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
	echo "success";
} else {
    echo "Error while updaing db: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>