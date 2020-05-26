<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
div{
  background-color:red;
  width:70%;
  margin-left:150px
}
</style>
<body>
    <?php
  echo form_open("/Doer/signup");
  ?>  
  <div>

  <div>
    Fullname:
      <input type="text" name="fullname" value="<?php echo set_value("fullname");?>" <em><?php echo form_error("fullname");?></em>
  </div>
<br>
<div>
   Username:
      <input type="text" name="username" value="<?php echo set_value("username");?>" <em><?php echo form_error("username");?></em>  <br> 
  </div>
<br>
  <div>
    Email:
      <input type="text" name="email" placeholder="example@example.com" value="<?php echo set_value("email");?>"
       <em><?php echo form_error("email");?></em>
  </div>
<br>
<div>
  Phone Number:
  <input type="number" name="phonenumber" value ="<?php echo set_value("phonenumber");?>" <em><?php echo form_error("phonenumber");?></em>
</div>
<br>
<div>
Gender:
  <input type="radio" name="gender" value="male">Male:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="others">Others
  </div>
<br>
   <div>
     Password:
      <input type="password" name="password" <em><?php echo form_error("password");?></em>
  </div>
<br>
<div>
  Confirm Password:
      <input type="password" name="confirmpass" <em><?php echo form_error("confirmpass");?></em>
  </div>
<br>
  <div>
    Submit:
      <input type="submit" name="submit" value="Signup" >
</div>

<?php
echo form_close();
?>

  </div>
</body>
</html>