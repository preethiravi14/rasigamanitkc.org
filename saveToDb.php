<?php

include('Way2SMS-API/way2sms-api.php');
sendWay2SMS( '9739190565' , 'Gurgaon' , '9035602257' , 'Hi Mohinee');

$host = "148.72.232.182";
$user= "tkchelliah";
$password = "TKCthaththa@1882";
$database = "tkchelliah_";

$myName = $_GET['name'];
$myEmail = $_GET['email'];
$myLocation = $_GET['location'];
$myPhoneno = $_GET['phone'];

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected";

$sql = "INSERT INTO Rasigamani_TKC_download_details(name, email,location,phone_no) VALUES ('".$myName."','".$myEmail."','".$myLocation."','".$myPhoneno."')";
 
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>