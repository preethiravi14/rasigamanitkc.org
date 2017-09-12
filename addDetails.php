<?php
require_once('config.php');

$bookId = $_GET['bookid'];
$userId = $_GET['userid'];

$sql = "INSERT INTO `BooksDownloadDetails`(`Userid`, `Bookid`) VALUES (".$userId.",".$bookId.")";
$query =  mysqli_query($conn, $sql);
echo 'success';
$conn->close();
?>