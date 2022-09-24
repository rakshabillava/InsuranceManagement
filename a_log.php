<?php
$con=mysqli_connect('localhost','root','');
 mysqli_select_db($con,'db_insurance');
 

?>
<?php

include_once("a_log.php");
$query="CALL getlogs";
$result=mysqli_query($con,$query);
// print_r($logs);
// exit;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table align="center"border="1px"style ="width:300px; line-hight:30px;">
        <tr>
            <th colspan="2"><h2>LOGED IN TIME</h2></th>
        </tr>
        <tr>
            <th><H3>ACTION</H3></th>
            <th><h3>LOG </h3></th>
        </tr>
        <?php
        while ($row=mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
            <td><?php echo $row['action'];?></td>
            <td><?php echo $row['log_date'];?></td>
        </tr>
        <?php
        }
        ?>
       
    </table>
    
</body>
</html>