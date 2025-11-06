<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        session_start();
        include "../conn.php";
        if(isset($_POST['submit']))
        {
            $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
            $str="select * from test1 where email='".$email."'";
            $result=mysqli_query($conn,$str);
            if(mysqli_num_rows($result) > 0  && $email!= null)
            {
                $_SESSION['email']=$email;
                // mail($email,"Password reset Application","Here You can Reset Your Password");
                header("Location:forpass.php");
                exit();
            }
            else{
                echo "<script>alert('Email Notmatched') </script>";
            }
        }
    ?>
</head>
<body>
    <form action="" method="POST">
        <!-- Name:<input type="text" name="name"> <br> -->
        Email:<input type="text" name="email"> <br>
        <!-- Password:<input type="password" name="password"> <br> -->
        <input type="submit" name="submit" value="Forget password"> <br>
        <!-- <input type="submit" value="Submit" > -->
    </form>
</body>
</html>