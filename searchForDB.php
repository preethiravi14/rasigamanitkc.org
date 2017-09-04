<?php
require_once('Way2SMS-API/way2sms-api.php');

/*$host = "148.72.232.182";
$user= "tkchelliah";
$password = "TKCthaththa@1882";
$database = "tkchelliah_";

*/
$host = "localhost:8889";
$user= "root";
$password = "root";
$database = "tkchelliah_";

$myPhoneno = $_GET['phone'];

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from Rasigamani_TKC_download_details where phone_no =$myPhoneno";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
	while($row = $result->fetch_assoc()) {
		if($row["name"] != '' && !is_null($row["name"])){
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