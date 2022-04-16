<?php
include("dbconfig.php");
if(@($_POST['updateData'])){


$ID= $_POST['ID'];
$Fname= $_POST['Fname'];
$Lname= $_POST['Lname'];
$Email= $_POST['Email'];
$Phone= $_POST['Phone'];
$oldImage=$_POST['oldImage'];








if(@($_FILES['file']['name']))
{

  $File= time()."_". $_FILES["file"]["name"];

  $file_ext = explode(".", $File);
 $file_ext_Cheak=strtolower(end($file_ext));
//  $Filetype=array("png","jpg","jpeg");
//  if(in_array($file_ext_Cheak,$Filetype)){
  $tamp_name=$_FILES["file"]["tmp_name"];
  $FilePath = "img/".$File;
  move_uploaded_file($tamp_name,$FilePath);
  

}



// if($_FILES['file']['name']==""{
//   $image = $oldImage;
// }



echo $Update="UPDATE `student_info` SET `Image`='$File',`Fname`='$Fname',`Lname`='$Lname',`Phone`='$Phone',`Email`='$Email' WHERE id='".$ID."'";
$rep = mysqli_query($conn,$Update);
$data=json_encode($rep);

 if($data){
  // header("location:DataTable.php"); 
 }else{
   echo "Something went wrong";
 }
}

 ?>