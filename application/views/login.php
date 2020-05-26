<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
  body {font-family: Arial, Helvetica, sans-serif;
font-style: normal;
  }

 div {
 padding :10px;
border:1px solid #CCC;
margin: 50px 80px;
width:70%;
background-color: greenyellow;
border-radius: 5px;
 }
 .forgot{
text-align: center;
background-color: #CCC;
 }
 .login{
  background-color: whitesmoke;
  padding-right: 10%;
  margin-left: 10%;
 }
 </style>
<body>

  <?php echo form_open("/Doer/createlogin");?>  
<div>
<h3 style="text-align: center">Please login as existing user or signup as new user</h3>

  <div class="login">
    <div>
     Username:
<input type="text" name="username" placeholder="akoyetunji" value="<?php echo set_value("username");?>" <em><?php echo form_error("username");?></em>
  </div>

   <div>
      Password:
      <input type="password" name="password" placeholder="xxxxxxxxxx"<em><?php echo form_error("password");?></em>
  </div>
<input type="submit" name="submit" value="Login">

<a href="<?php echo site_url("doer/signup")?>"> <input type="button" name="singup" value="Sign up" style="float: right"> </a>
  </div>

  <div class="forgot">  
     <h4>Forgot password click here:</h4>
     <a href="<?php echo site_url("doer/resetpassword")?>"> <input type="button" name="singup" value="forgotPass"> </a>
      </div>

      <footer>&copy; 2020</footer>
  </div>    

<?php
echo form_close();
?>

</body>
</html>