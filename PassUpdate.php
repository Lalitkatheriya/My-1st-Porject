<?php
include("dbconfig.php");

   
if(isset ($_POST["Submit"])){
       $Old =$_POST["OldPass"];
       $New  =$_POST["NewPass"];
       $Conf =$_POST["ConfPass"];

       if (empty($Old)) {  
        $_SESSION ["OldErr"] = "Please Fill Your Phone  Number";  
        }else{
            $Old;
        }
        if (empty($New)) {  
            $_SESSION ["NewErr"]  = "Please Fill Your Phone  Number";  
        }
        else{
            $New;
        }
        if (empty($Conf)) {  
            $_SESSION ["ConfErr"]  = "Please Fill Your Phone  Number";  
            }
            else{
                $Conf;
            }

        // Select Password  From the table
        $Select = "SELECT * FROM student_info WHERE id='".$_SESSION["id"]."'";
        $res = mysqli_query($conn, $Select);
        $row =  mysqli_fetch_assoc($res);
        $Data_Pass = $row["Password"];

// Condition for Old Match Data

    if ($Data_Pass==$Old) {

            if ($New == $Conf ){

                 $Update="UPDATE `student_info` SET `Password`='$New' WHERE id='".$_SESSION["id"]."'";;
                $res = mysqli_query($conn, $Update);
                if ($res) {
                    header("location:Dashboard.php");
                    echo "<script>alert('Update successful');</script>";
                }else{
                    header("location:ChangePass.php");
                }

            }else{
                $_SESSION ["Match_Err"]="Password does note match";
                header("location:ChangePass.php");
            }



        }else{
            
            $_SESSION ["MatchErr"]  = "old passs does not match";
            
            header("location:ChangePass.php");
            
        }
         



}else{
    header("location:ChangePass.php");
}

?>