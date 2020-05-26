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
     text-align: right;   
    }
</style>
<body>
    <table>
    <tr>
    <th>ID</th>
    <th>Events</th>
    <th>Description</th>
    <th>Date-Time</th>
    <th>Action</th>
    <tr>
     
    <?php
    echo form_open("/Doer/viewlist");
  
        foreach($list as $var){
        echo '<tr>
          <td>'.$var->id.'</td>
          <td>'.$var->events.'</td>
          <td>'.$var->description.'</td>
          <td>'.$var->date.'</td>
          <td>
          <a href="'.site_url("doer/removefromlist?id=").''.$var->id.'"> <input type="button" name="button" value="Delete List"> </a>
          <a href="'.site_url("doer/updatetablelist?id=").''.$var->id.'"> <input type="button" name="button" value="Update List"> </a>
          </td>
          
        </tr>';
     }
     
    ?>
        <a href="<?php echo site_url("doer/createlist")?>"> <input type="button" name="button" value="Create list"> </a>
       <div><a href="<?php echo site_url("doer/logout");?>"><input type="button" name="button" value="Logout"> </a></div> 

    </table>
</body>
</html>
