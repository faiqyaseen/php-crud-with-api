<?php

    include "config.php";
    
    header("Content-Type:Application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,
    Content-Type:Application/json, Access-Control-Allow-Methods, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"), true);

    $sid = $data['sid'];
    $sname = $data['sname'];
    $sclass = $data['sclass'];
    $sage = $data['sage'];

    $sql = "UPDATE student SET name = '{$sname}', class = {$sclass}, age = {$sage} WHERE id = {$sid}";

    if(mysqli_query($conn,$sql)){
        echo json_encode(array('message' => 'Record Update Successfuly.!' , 'status' => true));
    }else{
        echo json_encode(array('message' => 'Record Not Updated.!' , 'status' => false));
    }
    
?>