<?php
    include "conn.php";

    $json=json_decode(file_get_contents("php://input"));

    $str="delete from test1 where id='".$json->id."'";
    $result=mysqli_query($conn,$str);
    if($result)
    {
        echo json_encode(["status"=>200,"message"=>"deleted succesfully"]);
    }
    else
    {
        echo json_encode(["status"=>201,"message"=>"delete failed"]);
    }
?>