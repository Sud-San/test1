<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include "../conn.php";
        if(isset($_POST['submit']))
        {
            if($_POST['password']==$_POST['cpassword'])
            {    $str="update test1 set password='".$_POST['password']."' where email='".$_SESSION['email']."'";
                $result=mysqli_query($conn,$str);
                if($result)
                {
                    echo "<script>alert('Password Updated')</script>";
                }
                else
                {
                    echo "<script>alert('Error')</script>";
                }
            }
            else
            {
                echo "<script>alert('Password and Confirm Password mismatched')</script>";
            }
        }
    ?>
    <form action="" method="POST">
        <!-- Name:<input type="text" name="name"> <br> -->
        Email:<input type="email" name="email" value="<?php echo $_SESSION['email'];?>"> <br>
        Password:<input type="password" name="password"> <br>
        Confirm Password:<input type="text" name="cpassword"> <br>
        <input type="submit" name="submit" value="Update Password"> <br>
        <!-- <input type="submit" value="Submit" > -->
    </form>
</body>
</html>