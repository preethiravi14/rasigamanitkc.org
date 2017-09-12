<?php
require_once('Way2SMS-API/way2sms-api.php');
require_once('config.php');

$myPhoneno = $_GET['phone'];

$sql = "SELECT * from Rasigamani_TKC_download_details where phone_no =$myPhoneno";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
	while($row = $result->fetch_assoc()) {
		if($row["name"] != '' && !is_null($row["name"])){
	        setcookie("user", $row['id'], time() + (86400 * 30));
	        echo "success";
	        
    	}else{
    		$otp = mt_rand(1000,9999);
			sendWay2SMS( '9739190565' , 'Gurgaon' , $myPhoneno , 'OTP : '.$otp);
			$sql = "UPDATE Rasigamani_TKC_download_details SET otp = $otp WHERE phone_no = $myPhoneno";
			mysqli_query($conn, $sql);
			echo "step2";
    	}
	}
} else {
	$otp = mt_rand(1000,9999);
	sendWay2SMS( '9739190565' , 'Gurgaon' , $myPhoneno , 'OTP : '.$otp);
	$sql = "INSERT INTO Rasigamani_TKC_download_details(phone_no,otp) VALUES ($myPhoneno,$otp)";
	$conn->query($sql);
	echo "failed";
	return "failed";
}
$conn->close();
?>