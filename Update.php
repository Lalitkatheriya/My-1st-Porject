<?php

include("Header.php");
include("SideBar.php");
$FnameErr = $LnameErr = $PhoneErr= $EmailErr =$FileErr="";
$ID= $_SESSION['id'];
$Select = "SELECT * FROM student_info WHERE id = '".$ID."'";
$query = mysqli_query($conn,$Select);
$row= mysqli_fetch_assoc($query);
?>


  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Update Profile</li>
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
                  <img class="profile-user-img rounded  d-block "
                       src="<?php if(@($_SESSION["Profile"])){ echo "img/".$_SESSION["Profile"];}else{
                      echo "assets/favicon/Avtar.jpg"; }
                  ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION["UserID"]." ".$_SESSION["LastName"]?></h3>

                <p class="text-muted text-center">Software Engineer</p>
                
                <!-- Fome Heading -->
        
              <div class="card-header">
               
              </div>


              <!-- form start -->
              <form  action="ProfileUpdate.php" method="POST" enctype="multipart/form-data" class="needs-validation" >
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Frist Name</label>
                    <input type="text" name="Fname" class="form-control is-invailed" value="<?php echo $row["Fname"] ?>" id="Fname" placeholder="Frist Name">
                    <span class = "error text-danger"><?php echo $FnameErr?> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" name="Lname" class="form-control is-invailed" value="<?php echo $row["Lname"] ?>" id="Fname" placeholder="Frist Name">
                    <span class = "error text-danger"><?php echo $LnameErr?> </span>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" name="Phone" class="form-control" value="<?php echo $row["Phone"] ?>" id="Mobile" placeholder="Mobile">
                    <span class = "error text-danger"><?php echo $PhoneErr?> </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="Email" class="form-control" id="Email" value="<?php echo $row["Email"] ?>" placeholder="name@email.com">
                    <span class = "error text-danger"><?php echo $EmailErr?> </span></div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="File"class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
                  <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
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
  <!-- /.content-wrapper -->
  <?php include("Footer.php"); ?>

</div>


