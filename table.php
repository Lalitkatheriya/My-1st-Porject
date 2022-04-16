<?php
 include("dbconfig.php");
 $columns = array( 

        0=>'Cheak',
        1=> 'ID',
        2=> 'Image',
        3 =>'Fname', 
        4=> 'Phone',
        5=> 'Email',
        6=> 'Status',
        7=> 'Action',
    );
    

    $sql = "SELECT * FROM student_info WHERE `user_type`= '2'";
    $res = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
    $num= $res->num_rows;
    $count=0;

    while( $row = mysqli_fetch_array($res) ) {
        $count++;
        $dataArray = array();
        $dataArray["Cheak"] ='<input type="checkbox" name="select_all" value="1" class="check_row">';
        $dataArray["ID"] = $count;
        $dataArray["Image"] = $row["Image"];
        $dataArray["Image"] = '<img src="img/'.$row["Image"].'" style="width: 100px;height:100px;"></img>';
        $dataArray["Fname"] = $row["Fname"];
        $dataArray["Phone"] = $row["Phone"];
        $dataArray["Email"] = $row["Email"];
        
        if($row['Status'] == 1)
        {
            $dataArray["Status"]  ='<button type = button class="btn btn-success" onclick="changeStatus('.$row['ID'].','.$row["Status"].') ">Active</button>';
        }
        else
        {
            $dataArray["Status"]  ='<button type= button class="btn btn-danger" onclick="changeStatus('.$row['ID'].', '.$row["Status"].') ">Inactive</button>';
        }
        
        $dataArray["Action"] = '
        <button type="button" onclick="EditDAta('.$row['ID'].')" class="btn btn-primary " data-bs-toggle="modal" data-bs-target ="#Modal"> Update
        </button>
        <button onclick="Delete('.$row['ID'].')"  class="btn btn-danger">Delete</button>';
       $data[]=$dataArray;

    }
    $arr = array();
    // $arr["draw"]=1;
    // $arr["recordsTotal"]=$num;
    // $arr["recordsDiltered"]=$num;
    $arr["data"]=$data;
    
    echo json_encode($arr);
    
    ?>
