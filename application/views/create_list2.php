<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="<?php echo site_url("doer/viewlist")?>"> <input type="button" name="button" value="Back"> </a>

  <h2>Update Table List</h2>
  
    <?php echo form_open("/Doer/updatelistrecord");?>
    
   <div> <input name ="events" type="text" value="<?php echo $list[0]->events;?>" /> </div>
   <div> <input name ="description" type="text" value="<?php echo $list[0]->description;?>" /> </div>
   <div> <input name ="date" type= " datetime-local" value="<?php echo $list[0]->date;?>" /> </div>
   <div><input type="hidden" name="list_id" value="<?php echo $list[0]->id;?>"/></div>
   <div> <input name ="submit" type="submit" /></div>
  
  <?php
echo form_close();
?>

</body>
</html>