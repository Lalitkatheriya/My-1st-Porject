
<?php
include("Header.php");
include("Sidebar.php");
?>







<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3" method="POST" enctype="multipart/form-data">

      

        
        <div class="row">
          <div class="col-md-12">
              <div class="card-body">
                <div id="actions" class="row">
                  <div class="col-4">
                  <img src="" id="img" style="height: 100px; width: 100px;"></img>
                  <h6>Profile Image</h6>
                  </div>
                  <div class="col-lg-8">
                    <div class="btn-group w-100">
                      <span class="btn btn-success  fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>Add files</span>
                      </span>
                      <button type="submit" class="btn btn-primary  start">
                        <i class="fas fa-upload"></i>
                        <span>Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning   cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-8 d-flex align-items-center">
                    <div class="fileupload-process" style="width: 100px;">
                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table table-striped files" id="previews">
                  <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                          <span class="lead" data-dz-name></span>
                          (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                      <div class="btn-group">
                        <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <span>Start</span>
                        </button>
                        <button data-dz-remove class="btn btn-warning cancel">
                          <i class="fas fa-times-circle"></i>
                          <span>Cancel</span>
                        </button>
                        <button data-dz-remove class="btn btn-danger delete">
                          <i class="fas fa-trash"></i>
                          <span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
         
            </div>
            <!-- /.card -->
         
            
        </div>


        <!-- <input type="file" id="newImage" class="newImage" value=""> -->
        <input type="hidden" id="oldImage" value="">
        <input type="hidden" id="id" value="">

          <!-- fname -->
            <div class="col-12">
              <input type="text"
              class="form-control" 
              name="fname"
              id="Fname" 
              placeholder="Frist Name">
              
              </div>
            
          <!-- Lname  mother father-->
            <div class="col-12">
            <input type="text" 
            class="form-control" 
            name="lname" 
            id="Lname"  
            placeholder="Last Name">
            </div>
          <!-- Phone -->
          <div class="col-12">
            <input type="text"
            class="form-control" 
            name="Phone"
            id="Phone"    
            placeholder="Phone">
            </div>
          <!-- Email -->

          <div class="col-12">
            <input type="email" 
              class="form-control" 
              name="email"
              id="Email"  
              placeholder="Email"> 
          </div>
          </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="Submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>







<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>USER LIST</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Dashboard.php">Dasheboard</a></li>
              
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
         <div class=".swalDefaultSuccess"></div>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                <div class="d-flex justify-content-end">
                <!-- Button trigger modal -->
                <?php if($_SESSION["Status"]==1){?>
                  <button type="button" class="btn btn-primary" style="width: 170px;" data-bs-toggle="modal" data-bs-target="#Modal2">
                    Add User
                    </button>
                <?php }?>
        
                    </div>
                  <!-- Modal -->
                  <div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                     <!--AddUser -->
                        <form class="row g-3" method="POST" enctype="multipart/form-data">
                       
                       <!-- Image Uplode -->
                          <div class="col-12 form-group">
                          <div class="custom-file">
                          <input type="file"  name="Files" class="custom-file-input" id="Files">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                          </div>
                            <!-- fname -->
                              <div class="col-12">
                                <input type="text"
                                class="form-control" 
                                name="fname"
                                id="FNAME" 
                                placeholder="Frist Name">
                                
                                </div>
                              
                            <!-- Lname  mother father-->
                              <div class="col-12">
                              <input type="text" 
                              class="form-control" 
                              name="lname" 
                              id="LNAME"  
                              placeholder="Last Name">
                              </div>
                            <!-- Phone -->
                            <div class="col-12">
                              <input type="text"
                              class="form-control" 
                              name="Phone"
                              id="PHONE"    
                              placeholder="Phone">
                              </div>
                            <!-- Email -->

                            <div class="col-12">
                              <input type="email" 
                                class="form-control" 
                                name="email"
                                id="EMAIL"  
                                placeholder="Email"> 
                            </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" id="SUBMIT"class="btn btn-primary">Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="Table" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                        <th><Input type="checkbox"></Input></th>
                          <th>Sr.</th>
                          <th>Profile</th>
                          <th>Name</th></th>
                          <th>Phone</th>
                          <th>Email</th>
                          <?php if($_SESSION["Status"]==1){?>
                          <th>Staus</th>    
                          <th>Action</th>
                          <?php }?>
                          
                          
                     
                         
                      </tr>
                  </thead>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php include("Footer.php"); ?>
</div>

<!-- Page specific script -->
<script>
    
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

 
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
 
  Lode();
   function Lode() {
        $('#Table').dataTable({
            "processing": false,
            "destroy":true,
            "searching":true,
            "serverSide":false,
             dom: 'Bfrtip',
             'ajax': 'https://gyrocode.github.io/files/jquery-datatables/arrays_id.json',
             buttons: [
            'copyHtml5', 'csvHtml5',  'pdfHtml5'
         ],
         'columnDefs': [						// code for select row on checked checkbox class
				         {
                    targets: 0,        
				            'checkboxes': {
				              'selectRow': true
				            }
				         }
				      ],
	       'select': {
	         'style': 'multi',
	         'selector': '.check_row'
	      },     
      	'order': [[1, 'asc']],	

            "ajax":{
              "url":"table.php",
              "type":"POST",
              "dataType":"json"
            },
            "columns": [
                {"data": "Cheak"},
                {"data": "ID"},
                {"data": "Image"},
                {"data": "Fname"},
                {"data": "Phone"},
                {"data": "Email"},
                <?php if($_SESSION["Status"]==1){?>
                {"data": "Status"},
                {"data": "Action"},
                <?php }?>
              
            ],
                    });
 
              
    };
    // ===================Edit Fome Data==================
    // process the form
 function Delete(i){
  if (confirm("Are You Sure Delete your data ?")==true){
       $.ajax({
        type    : 'POST',
        url     : "Delete.php",
        data    : {"id":i},
       success: function(responce){
         Lode();
       var a = "#row_"+i;
        $(a).remove();
        Toast.fire({
        icon: 'success',
        title: 'You are SuccsesFully Deleted !'
      })
       }
     });
    }
    };
    // Status Change
    function changeStatus(id,st){
        $.ajax({
        type    : 'POST',
        url     : "status.php",
        data    : {"id":id,"status":st},
        success: function(responce){
         Lode();
        Toast.fire({
        icon: 'success',
        title: 'User Status Change Succsessfully'
      })
  
        }
     });
 
    };
  

    


// Ajax UPDATE form
 function EditDAta(j){
 

       $.ajax({
        type    : "POST",
        datatype: 'json',
        url    : "AjaxUpdate.php",
        data   : {"id":j},
      
       success: function(resData){ 
      var json = JSON.parse(resData);
      $("#id").val(json["ID"]);
      $("#img").attr("src","img/"+json["Image"]);
      $("#oldImage").val(json["Image"]);
      $("input[name='fname']").val(json["Fname"]);
      $("input[name='lname']").val(json["Lname"]);
      $("input[name='email']").val(json["Email"]);
      $("input[name='Phone']").val(json["Phone"]);
   
   
      
        $("#Submit").on("click",function update(){
          var id = $("#id").val();
          var Fname = $("#Fname").val();
          var Lname = $("#Lname").val();
          var Email= $("#Email").val();
          var Phone = $("#Phone").val();
          var oldImage = $("#oldImage").val();
          var file_data = $('.newImage').prop('files')[0];    //Fetch the file              
          var form_data = new FormData();
          form_data.append("file",file_data);
          form_data.append("ID",id);
          form_data.append("Fname",Fname);
          form_data.append("updateData","updateData");
          form_data.append("Lname",Lname);
          form_data.append("Email",Email);
          form_data.append("Phone",Phone);
          form_data.append("oldImage",oldImage);
          console.log(form_data);
        


          $.ajax({
          type    : "POST",
          datatype: 'json',
          url    : "AjaxEdit.php",
          contentType: false,
          processData: false,
          data:form_data,
        
          success: function(res){ 
          Lode();
          $('#Modal').modal('hide');
          Toast.fire({
          icon: 'success',
          title: 'You are SuccsesFully Updated !'
          })
          }
            
          });
      
         });//End Submit

      }
     });
    };
    // Add Data
    $("#SUBMIT").on("click",function Add(){
     
      var Fname = $("#FNAME").val();
      var Lname = $("#LNAME").val();
      var Email= $("#EMAIL").val();
      var Phone = $("#PHONE").val();
       var file_data = $('#Files').prop('files')[0];    //Fetch the file              
        var form_data = new FormData();
        form_data.append("file",file_data);
        form_data.append("Fname",Fname);
        form_data.append("Lname",Lname);
        form_data.append("Email",Email);
        form_data.append("Phone",Phone);
      
      $.ajax({
      type    : "POST",
      datatype: 'json',
      url    : "AjaxAdd.php",
      contentType: false,
      processData: false,
      data:form_data,
    
      success: function(res){ 
      Lode();
      $('#Modal2').modal('hide');
      Toast.fire({
        icon: 'success',
        title: 'You are SuccsesFully Add New User !'
      })
      }
          
      });
    
 });



//  DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "DataTable.php", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End



     
</Script>






