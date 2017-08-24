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


$sql = "SELECT * FROM Rasigamani_TKC_download_details WHERE phone_no =".$myPhoneno;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        return "no: " . $row["phone_no"];
    }
} else {
    die("0 results ");
}
$conn->close();

?>