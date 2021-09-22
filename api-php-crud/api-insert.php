<?php

    include "config.php";
    
    header("Content-Type:Application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,
    Content-Type:Application/json, Access-Control-Allow-Methods, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"), true);

    $sname = $data['sname'];
    $sclass = $data['sclass'];
    $sage = $data['sage'];

    $sql = "INSERT INTO student(name,class,age) VALUES('{$sname}', {$sclass}, {$sage})";

    if(mysqli_query($conn,$sql)){
        echo json_encode(array('message' => 'Record Inserted Successfuly.!' , 'status' => true));
    }else{
        echo json_encode(array('message' => 'Record Not Inserted.!' , 'status' => false));
    }
    
?>