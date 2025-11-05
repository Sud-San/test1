<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        .uotp{
            width: 45px;
            text-align: center;
        }
    </style>
    <?php
        if(isset($_POST['submit']))
        {
            $otp=$_POST['otp'];
            $uotp=implode($_POST['uotp']);
            if($uotp===$otp)
            {
                echo "<script>alert('OTP Matched')</script>";
                header("Location:passreset.php");
            }
            else
            {
                echo "<script>alert('OTP Notmatched')</script>";
            }
        }
        
    ?>
</head>
<body>
    <?php
        $otp=rand(1000,9999);
        echo $otp;
        //mail("fubin1t0kagup3@10mail.xyz","Password reset","Password reset");
    ?>
    <form action="" method="post">
        <input type="hidden" name="otp" value="<?php echo $otp?>">
        <input type="text" name="uotp[]" id="o1" class="uotp" maxlength="1">
        
        <input type="text" name="uotp[]" id="o2" class="uotp" maxlength="1">
        
        <input type="text" name="uotp[]" id="o3" class="uotp" maxlength="1">
        
        <input type="text" name="uotp[]" id="o4" class="uotp" maxlength="1"> <br>
        <input type="submit" value="Submit" name="submit">
    </form>
    <script src="jquery.min.js"></script>
    <script>
        function sw(otp) {
            // Get the current input number from id (o1 -> 1, o2 -> 2, etc)
            let currentNum = parseInt(otp.id.replace('o', ''));
            
            // Calculate next input id
            let nextId = 'o' + (currentNum + 1);
            
            // If next input exists, focus on it
            if(currentNum < 4) {
                document.getElementById(nextId).focus();
            }
        }

        // Add event listeners for input
        document.querySelectorAll('.uotp').forEach(input => {
            input.addEventListener('input', function(e) {
                // Only allow numbers
                this.value = this.value.replace(/[^0-9]/g, '');
                
                if(this.value.length === 1) {
                    sw(this);
                }
            });

            // Handle backspace
            input.addEventListener('keydown', function(e) {
                if(e.key === 'Backspace' && this.value === '') {
                    let currentNum = parseInt(this.id.replace('o', ''));
                    if(currentNum > 1) {
                        let prevId = 'o' + (currentNum - 1);
                        document.getElementById(prevId).focus();
                    }
                }
            });
        });
    </script>
</body>
</html>