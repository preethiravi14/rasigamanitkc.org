<?php
require_once('Way2SMS-API/way2sms-api.php');

$host = "148.72.232.182";
$user= "tkchelliah";
$password = "TKCthaththa@1882";
$database = "tkchelliah_";

$myPhoneno = $_GET['phone'];
//$myPhoneno = 81273912;
// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name from Rasigamani_TKC_download_details where phone_no ='$myPhoneno'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
	while($row = $result->fetch_assoc()) {
		if($row["name"] != '' && !is_null($row["name"])){
	        echo "success";
			return "success";
    	}else{
    		$otp = mt_rand(1000,9999);
			sendWay2SMS( '9739190565' , 'Gurgaon' , $myPhoneno , 'OTP : '.$otp);
			$sql = "UPDATE Rasigamani_TKC_download_details SET otp = $otp WHERE phone_no = $myPhoneno";
			mysqli_query($conn, $sql);
			if (mysql_affected_rows() > 0 ) {
				echo "success";
			    return "success";
			} else {
				echo "failed";
			    return "failed";
			}
    	}
	}
} else {
	$otp = mt_rand(1000,9999);
	$abc = sendWay2SMS( '9739190565' , 'Gurgaon' , '$myPhoneno' , 'OTP : '.$otp);
	$sql = "INSERT INTO Rasigamani_TKC_download_details(phone_no,otp) VALUES ($myPhoneno,$otp)";
	$conn->query($sql);
	echo "failed";
	return "failed";
}
?>