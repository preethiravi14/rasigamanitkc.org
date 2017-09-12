<?php
require_once('config.php');

$myName = $_GET['name'];
$myEmail = $_GET['email'];
$myLocation = $_GET['location'];
$myPhoneno = $_GET['phone'];
$otp = $_GET['otp'];

if($myEmail == Null || $myName == Null || $myLocation == NULL || $myPhoneno == Null || $otp == Null || $myEmail == "null" || $myName == "null" || $myLocation == "null" || $myPhoneno == "null" || $otp == "null"){
	echo "Missing required parameters";
	return;
}

$sql = "UPDATE Rasigamani_TKC_download_details SET name = '".$myName."', email = '".$myEmail."',location = '".$myLocation."' WHERE phone_no = $myPhoneno AND otp = $otp";

$query =  mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn) > 0) {
	$sql = "SELECT * from Rasigamani_TKC_download_details where phone_no =$myPhoneno";
	$result = $conn->query($sql);
	if ($result->num_rows > 0 ) {
		while($row = $result->fetch_assoc()) {
	        setcookie("user", $row['id'], time() + (86400 * 30));
	    }
	}
	echo "success";
} else {
    echo "Error while updaing db: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>