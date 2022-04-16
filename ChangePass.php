<?php

include("Header.php");
include("SideBar.php");

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Update Passowrd</li>
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
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-thumbnail"
                  src="<?php if(@($_SESSION["Profile"])){ 
                         echo "img/".$_SESSION["Profile"];
                        }else{
                          echo "assets/favicon/Avtar.jpg";
                            }?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION["UserID"]." ".$_SESSION["LastName"]?></h3>

                <p class="text-muted text-center">Software Engineer</p>
                
                <!-- Fome Heading -->
        
              <div class="card-header">
               
              </div>
              <!-- form start -->
              <form  action="PassUpdate.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate >
               
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input type="Password" name="OldPass" class="form-control is-invailed" id="Fname" placeholder="Frist Name">
                    <span class = "error text-danger"><?php if(@($_SESSION ["OldErr"])){
                    echo $_SESSION ["OldErr"];
                    }else{
                    unset($_SESSION ["OldErr"]);  
                    }
                    if(@($_SESSION ["MatchErr"])){
                      echo $_SESSION ["MatchErr"];
                      }else{
                        unset($_SESSION ["MatchErr"]);  
                        }?>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="Password" name="NewPass" class="form-control" id="Mobile" placeholder="Mobile">
                    <span class = "error text-danger"><?php  if(@($_SESSION ["NewErr"])){
                    echo $_SESSION ["NewErr"];
                    }?> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="Password" name="ConfPass" class="form-control" id="Email" placeholder="name@email.com">
                    <span class = "error text-danger"><?php  if(@($_SESSION ["ConfErr"])){
                    echo $_SESSION ["ConfErr"];
                    } if(@($_SESSION ["Match_Err"])){
                      echo $_SESSION ["Match_Err"];} ?> </span>
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
                  <button type="submit" name="Submit"class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- form end -->
          
          </div>
          <!-- /.col -->      

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>