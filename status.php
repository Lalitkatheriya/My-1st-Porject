<?php
include("dbconfig.php");;

if(@( $_REQUEST['id']))
   $s=0;
  if($_REQUEST['status']){
  $s=0;   
}else{
    $s=1; 
}
	$query = "UPDATE `student_info` SET `Status`='".$s."' WHERE id='".$_REQUEST['id']."'";
	mysqli_query($conn,$query);
	

?>