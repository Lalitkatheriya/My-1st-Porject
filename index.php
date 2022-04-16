<?php
include("dbconfig.php");
if(isset($_SESSION["UserID"])){
    header("location:Dashboard.php");
};
?>

<?php

    $EmailErr = $PassErr =$UserErr=$StatusErr="";
    $Pass = $Email ="";
    if(isset ($_POST["Submit"])){
    $Pass=$_POST["Pass"];
    $Email=$_POST["Email"];
        if (empty($_POST["Email"])) {  
            $EmailErr = "Please Fill Your Email Address";          
        }

        if (empty($_POST["Pass"])) {  
            $PassErr = "Please Fill Your Password";    
        }
       


        $sql = " SELECT * FROM student_info  WHERE `Email`= '$Email' AND `Password`= '$Pass'";
        $res = mysqli_query($conn, $sql);


        $row =mysqli_fetch_assoc($res);
        // print_r($row);
        // die();

       if (mysqli_num_rows($res)==1){
      
       
        if($row["Status"]==1){
            $_SESSION["UserID"] = $row["Fname"];
            $_SESSION["LastName"] = $row["Lname"];
            $_SESSION["id"] = $row["ID"];
            $_SESSION["Profile"] = $row["Image"];
            $_SESSION["Status"] = $row["user_type"];
            header("location:Dashboard.php");
      
        }else{echo "<script>
            alert('your account is loked !');</script>";
            $StatusErr='Please Contact You Admin';
        }


       }else{
        $UserErr = "User dose Note Exist !";
       }
         

    }
     
    ?>
    




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="64x64" href="favicon/favicon-16x16.png">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="favicon/eway.png"> -->
    <link rel="manifest" href="favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
      <!-- SweetAlert2 -->
      <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
      <!-- Toastr -->
     <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="assets/index2.html" class="h1"><b>Admin</b></a>
                
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <p class="login-box-msg text-danger"><?php echo $UserErr; ?></p>
                <p class="login-box-msg text-danger"><?php echo $StatusErr; ?></p>
                <form method="post">
                    <div class="input-group mb-3">
                    <input class="form-control <?php if(@($EmailErr)){echo "is-invalid";}?>" id="Email" type="email" name="Email" placeholder="name@example.com" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="input-group mb-3">
                    <input class="form-control <?php if(@($PassErr)){echo "is-invalid";}?>" id="Pass" name="Pass" type="password" placeholder="Password" />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" name="Submit" class="btn btn-primary btn-block w-100">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                   
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

               
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>
<script>
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

</script>


                             
                                            



                              


                                          







    

</body>
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="assets/plugins/toastr/toastr.min.js"></script>

</html>