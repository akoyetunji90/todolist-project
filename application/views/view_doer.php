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
    <th>Username</th>
    <tr>

    <?php
     foreach($doers as $login){
        echo '<tr>
          <td>'.$login->id.'</td>
          <td>'.$login->username.'</td>
        </tr>';
     }
    ?>
    </table>
</body>
</html>
