<?php
include("dbconfig.php");

$Fname=$_POST["Fname"];
$Lname=$_POST["Lname"];
$Phone=$_POST["Phone"];
$Email=$_POST["Email"];
$File=$_FILES["file"];



// File Uploding Err
if (empty($_FILES["file"])) {  
    echo "Please Uplodad your  Profile ";  
         
}else{
$File= time()."_". $_FILES["file"]["name"];

$file_ext = explode(".", $File);

$file_ext_Cheak=strtolower(end($file_ext));

$Filetype=array("png","jpg","jpeg");
if(in_array($file_ext_Cheak,$Filetype)){
$tamp_name=$_FILES["file"]["tmp_name"];
$FilePath = "img/".$File;
move_uploaded_file($tamp_name,$FilePath);

}else{
   echo "Allowe only png jpg jpeg Files type";
 }
}



$Save = " INSERT INTO `student_info`( `Fname`, `Lname`, `Phone`, `Email`,`Image`) 
VALUES ('".$Fname."','".$Lname."','".$Phone."','".$Email."','".$File."')";

 $rep = mysqli_query($conn,$Save);
 if($rep){
 echo "<script>alert('Data Inserted Sucssesfull')</script>";

 }else{
   echo "Something went wrong";
 }

 




?>