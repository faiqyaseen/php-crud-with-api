<?php

    include "config.php";
    
    header("Content-Type:Application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,
    Content-Type:Application/json, Access-Control-Allow-Methods, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"), true);

    $sid = $data['sid'];

    $sql1 = mysqli_query($conn,"SELECT * FROM student WHERE id = {$sid}");
    if(mysqli_num_rows($sql1) > 0){
        $sql = "DELETE FROM student WHERE id = {$sid}";

        if(mysqli_query($conn,$sql)){
            echo json_encode(array('message' => 'Record Deleted Successfuly.!' , 'status' => true));
        }else{
            echo json_encode(array('message' => 'Record Not Deleted.!' , 'status' => false));
        }

    }else{
        echo json_encode(array('message' => 'Record Not Found.!' , 'status' => false));
    }
