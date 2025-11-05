<?php

use LDAP\Result;

    include "conn.php";

    $json=json_decode(file_get_contents("php://input"));
    // echo json_encode($json);

    if(isset($json->id))
    {
        $str="select * from test1 where id ='".$json->id."'";
    }
    elseif(isset($json->name))
    {
        $str="select * from test1 where name ='".$json->name."'";
    }
    $result=mysqli_query($conn,$str);
    $users=[];
    while($row=mysqli_fetch_assoc($result))
    {
        $users[]=$row;
    }
    if($users)
    {
        echo json_encode($users);
    }
    else{
        echo json_encode(["message"=>"user not found"]);    
    }
?>