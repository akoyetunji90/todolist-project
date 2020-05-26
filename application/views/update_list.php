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

    <table>
    <tr>
    <th>ID</th>
    <th>Events</th>
    <th>Description</th>
    <th>Date</th>
    <th>Update list</th>
    <tr>
    <?php
    echo form_open("/Doer/updatetablelist");
     foreach($list as $var){
        echo '<tr>
          <td>'.$var->id.'</td>
          <td>'.$var->events.'</td>
          <td>'.$var->description.'</td>
          <td>'.$var->date.'</td>
          <td><a href="'.site_url("/Doer/updatetableList?listId=").$list->id.'">'.$list->id.'</a></td>
        </tr>';
             }
             ?>   
             
    </table>
</body>
</html>