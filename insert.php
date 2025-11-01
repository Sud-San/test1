<?php
    include "conn.php";

    if($_POST['name'])
    {
        $str="insert into test1(name) values('".$_POST['name']."')";
        $query=mysqli_query($conn,$str);
        if($query){
            $msg=["status"=>"200","message"=>"successful"];
            echo json_encode($msg);
        }
        else{
            $msg=["status"=>"201","message"=>"unsuccessful"];
        }
    }
    else{
        echo json_encode(["msg"=>"invalid"]);
    }
?>