<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php echo form_open("/Doer/resetpassword2");?>
     Email:
   <div><input type="text" name="email" value="<?php echo set_value("email");?>" <em><?php echo form_error("email");?></em></div>

  Reset-Code:
   <div><input type="number" name="reset" value="<?php echo set_value("reset");?>" <em><?php echo form_error("reset");?></em></div>

  
   New Password:
   <div><input type="password" name="newpassword" value="<?php echo set_value("newpassword");?>" <em><?php echo form_error("newpassword");?></em></div>

   
    Confirm Password:
   <div><input type="password" name="confirmpass" value="<?php echo set_value("confirmpass");?>" <em><?php echo form_error("confirmpass");?></em></div>


   Submit:
   <input type="submit" name="submit" value="Submit">

<?php
echo form_close();
?>

</body>
</html>
