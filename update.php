<?php
    include "conn.php";
    $json=json_decode(file_get_contents("php://input"));

    $str="update test1 set name='".$json->name."' where id='".$json->id."'";
    $result=mysqli_query($conn,$str);
    if($result)
    {
        echo json_encode(["status"=>200,"message"=>"Updated Successfully"]);
    }
    else
    {
        echo json_encode(["status"=>201,"message"=>"Update Failed"]);
    }
?>