<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
    <tr>
    <th>ID</th>
    <th>Events</th>
    <th>Description</th>
    <th>Date-Time</th>
    <th>Delete list</th>
    <tr>
    <?php
     foreach($list as $var){
        echo '<tr>
          <td>'.$var->id.'</td>
          <td>'.$var->events.'</td>
          <td>'.$var->description.'</td>
          <td>'.$var->date.'</td>

          <td><a href="'.site_url("/Doer/removefromList?listId=").$list->id.'">'.$list->id.'</a></td>
        </tr>';
     }
    ?>
    </table>
</body>
</html>