<?php
session_start();
include("../config.php");
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("connection failed".mysqli_errno());

$request=$_REQUEST;
$ids = $_POST['idsekolah'];
$idk = $_POST['dataid'];
$sql = 'DELETE FROM sekolah_siswa WHERE id1 IN ('.$idk.')';
if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
mysqli_close($conn);
?>
