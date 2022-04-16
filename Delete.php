<?PHP
include("dbconfig.php");
$ID =$_POST["id"];
$Delete= "delete from  student_info where id='".$ID."'";
$query= mysqli_query($conn,$Delete);

if($query){
    $_SESSION["msg2"]="Data Sucssesfull Deleted";
     
   }else{
     echo "Something went wrong!";
}







?>