<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php echo form_open("/Doer/resetpassword");?>
  
                    <table class="table table-bordered table-hover table-striped">
                        <tbody>
                        <tr>
                            <td>Enter Email: </td>
                            <td>
                                <input type="email" name="email" id="email" style="width:250px" required>
                            </td>
                            <td><input name="submit" type = "submit" value="submit"></td>
                        </tr>

                        </tbody>              
                         </table>
                        
<?php
echo form_close();
?>
</body>
</html>