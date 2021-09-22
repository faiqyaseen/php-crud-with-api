<?php

    include "config.php";
    
    header("Content-Type:Application/json");
    header("Access-Control-Allow-Origin: *");

    $data = json_decode(file_get_contents("php://input"), true);

    // WITH GET METHOD
    $search_term  = isset($_GET['search']) ? $_GET['search'] : die();


    // WITH POST METHOD
    // $search_term = $data['search'];

    $sql = "SELECT * FROM student WHERE name LIKE '%{$search_term}%'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);
    }else{
        echo json_encode(array('message' => 'No Search Found.!' , 'status' => false));
    }
    
?>