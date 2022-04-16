<?php
include("Header.php");
include("SideBar.php");


$FnameErr = $LnameErr= $PhoneErr= $EmailErr=$FileErr=$PassErr="";


if(isset ($_POST["Submit"])){

$Fname = $Lname = $Phone= $Email=$File=$Pass="";

// Data inserted into data  Base






// Fname Error
if (empty($_POST["Lname"])) {  
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
// Father Error

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
if (empty($_FILES["Files"])) {  
    $FileErr = "Please Uplodad your  Profile ";  
         
}else{
$File= time()."_". $_FILES["Files"]["name"];

$file_ext = explode(".", $File);
print_r($file_ext);

$file_ext_Cheak=strtolower(end($file_ext));

$Filetype=array("png","jpg","jpeg");
if(in_array($file_ext_Cheak,$Filetype)){
$tamp_name=$_FILES["Files"]["tmp_name"];


move_uploaded_file($tamp_name,$FilePath);

}else{
   $FileErr = "Allowe only png jpg jpeg Files type";
 }
}



if($FnameErr == "" && $LnameErr  == "" && $PhoneErr == "" && $EmailErr  == "" && $FileErr ==""&& $PassErr ==""){
  // Than Inculed Squl Query
//This Is use For Cheak Box Insert Data 


$Save = " INSERT INTO `student_info`( `Fname`, `Lname`, `Phone`, `Email`,`Image`,`Password`) 
VALUES ('".$Fname."','".$Lname."','".$Phone."','".$Email."','".$File."','".$Pass."')";

 $rep = mysqli_query($conn,$Save);
 if($rep){
 echo "<script>alert('Data Inserted Sucssesfull')</script>";

 }else{
   echo "Something went wrong";
 }

 
}

}//end of submit

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
       
          <div class="col-md-12">
    
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
        
              <div class="card-header">
               <h3 class="text-primary">New User</h3>
              </div>
              <!-- form start -->
              <form  method="POST" enctype="multipart/form-data" class="needs-validation" >
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Frist Name</label>
                    <input type="text" name="Fname" class="form-control is-invailed" id="Fname" placeholder="Frist Name">
                    <span class = "error text-danger text-danger"><?php echo $FnameErr?> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" name="Lname" class="form-control is-invailed"  id="Fname" placeholder="Frist Name">
                    <span class = "error text-danger"><?php echo $LnameErr?> </span>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" name="Phone" class="form-control"  id="Mobile" placeholder="Mobile">
                    <span class = "error text-danger"><?php echo $PhoneErr?> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="Email" name="Email" class="form-control" id="Email"  placeholder="name@Email.com">
                    <span class = "error text-danger"><?php echo $EmailErr?> </span>
                  <div class="form-group">
                    <label for="exampleInputFile">Profile</label>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="Files"class="custom-file-input" id="File">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <span class = "error text-danger"><?php echo $FileErr?></span> 
                    </div>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="Submit" class="btn btn-primary w-100">Submit</button>
                </div>
              </form>
              <!-- form end -->
          
          </div>
          <!-- /.col -->      

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    
    </section>
  </div>  
    <footer class="main-footer">
    <strong>EwayITsolution &copy;<?php echo date('Y');?><a href="https://adminlte.io">WebAdmin.com</a>.</strong> All rights reserved.
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>

</body>
</html>
    <!-- /.content -->
  

 
<!-- ./wrapper -->


<!-- Page specific script -->

