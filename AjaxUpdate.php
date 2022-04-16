<?php
include("dbconfig.php");
// Select Data in the Fieald
$ID= $_REQUEST['id'];
$Select = "select * from student_info where id=$ID";
$query = mysqli_query($conn,$Select);
$Res= mysqli_fetch_assoc($query);
 echo json_encode($Res);
 
?>