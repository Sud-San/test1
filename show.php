<?php
include "conn.php";

$str="select * from test1";
$result=mysqli_query($conn,$str);

$user=[];
while($row=mysqli_fetch_assoc($result))
{
    $user[]=$row;
}

echo json_encode($user);
?>