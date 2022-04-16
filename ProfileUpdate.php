<?php
include("dbconfig.php");


$FnameErr = $LnameErr = $PhoneErr= $EmailErr =$FileErr="";

if(isset ($_POST["Submit"])){

$Fname = $Lname = $Phone= $Email = $File="";
// Data inserted into data  Base
// Fname Error
if (empty($_POST["Fname"])) {  
    $FnameErr = "Please Fill Your Frist Name";  
    
           
} else {  
    $Fname = $_POST["Fname"];
    if (!preg_match("/^[a-zA-Z]*$/",$Fname)) {  
      $FnameErr = "Only alphabets and allowed ";  
  }
  if (preg_match("/(\s)$/",$Fname)) {  
    $FnameErr = "white space are note allowed ";  
} 

}
// Lname Error
if (empty($_POST["Lname"])) {  
    $LnameErr = "Please Fill Your Last Name";  
           
} else {  
    $Lname = $_POST["Lname"];
    if (!preg_match("/^[a-zA-Z]*$/",$Lname)) {  
      $LnameErr = "Only alphabets and white space are allowed";  
     }    
     if (preg_match("/(\s)$/",$Lname)) {  
      $LnameErr = "white space are note allowed ";  
  } 
}

// phone Error
if (empty($_POST["Phone"])) {  
    $PhoneErr = "Please Fill Your Phone  Number";  
           
} else {  
    $Phone= $_POST["Phone"];

    //  check mobile no correct fome 
            if (!preg_match ("/^[789][0-9]{9,}$/", $Phone) ) {  
             $PhoneErr = "Please Fill Valid mobaile no."; 
          
           }
           
}

// Email Error
if (empty($_POST["Email"])) {  

    $EmailErr = "Please Fill Your Email Address";  
           
} else {  
    $Email = $_POST["Email"];
    if (!preg_match ("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/", $Email) ) {  
      $EmailErr = "Please Fill Valid Email Address."; 

    }  
}

// File Uploding Err
$FilePath;
if (empty($_FILES["File"])) {  
  $FileErr = "Please Uplodad your  Profile ";          
}else{  
      if($_SESSION["Profile"]!=""){
        $File=$_SESSION["Profile"];
      }else{
      $File= time()."_". $_FILES["File"]["name"];
      }
$file_ext = explode(".", $File);
$file_ext_Cheak=strtolower(end($file_ext));
$Filetype=array("png","jpg","jpeg");
if(in_array($file_ext_Cheak,$Filetype)){
$tamp_name=$_FILES["File"]["tmp_name"];
$FilePath = "img/".$File;

move_uploaded_file($tamp_name,$FilePath);
echo "Uploaded FIle";
}else{
   $FileErr = "Allowe only png jpg jpeg files type";
 }
}

// if($FnameErr == "" && $LnameErr  == "" && $PhoneErr == "" && $EmailErr  == "" && $FileErr ==""){

 echo $Update="UPDATE `student_info` SET `Fname`='$Fname',`Lname`='$Lname',`Phone`='$Phone',`Email`='$Email',`Image`='$File' WHERE id='".$_SESSION["id"]."'";


$rep = mysqli_query($conn,$Update);

 if($rep){
  

    $_SESSION["UserID"] = $Fname;
    $_SESSION["LastName"] = $Lname;
    $_SESSION["Profile"] = $File;
    print_r($_SESSION);
    header("location:Dashboard.php"); 
  
 }else{
    header("location:ProfileUpdate.php");
 }
 
// }

}//end of submit



?>