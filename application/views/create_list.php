<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    div{
        text-align: center;
        background-color: red;
        width: 25%;
        border: 1px;
        margin-top: 20px;
        margin: 0px auto;
        
    }
</style>
<body>
<a href="<?php echo site_url("doer/viewlist")?>"> <input type="button" name="button" value="Back"> </a>
  <?php
  echo form_open("/Doer/createlist");?>  
  <div>
  <div>
      events: <input type="text" name="events">
  </div>

   <div>
      Description:
      <input type="text" name="description" >
  </div>

<div>
      Date:
      <input type="datetime-local" name="date">
  </div>

      Submit:
      <input type="submit" name="submit" value="Create" >

<?php
echo form_close();
?>

</div>
</body>
</html>