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

$sql = "SELECT name from Rasigamani_TKC_download_details where phone_no ='$myPhoneno'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        include('Way2SMS-API/way2sms-api.php');
		$res = sendWay2SMS( '9739190565' , 'Gurgaon' , '9739190565' , 'Hi Preethi is in database');
		var_dump($res);
		die;
		
    }
} else {
	
    include('Way2SMS-API/way2sms-api.php');
	$res = sendWay2SMS( '9739190565' , 'Gurgaon' , '9739190565' , 'Hi Preethi not in database');
	var_dump($res);
	die;
}
?>