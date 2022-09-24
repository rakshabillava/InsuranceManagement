<?php
$gmail=$_POST['email'] ;
$paswd=$_POST['passwd'];
  
   $con=mysqli_connect('localhost','root','');
   mysqli_select_db($con,'db_insurance');
   
   $s="select * from agent_details where gmail ='$gmail' and paswd = '$paswd'";
   $result=mysqli_query($con,$s);
   $num=mysqli_num_rows($result);
   if($num==1){
    header("location:CUSTNOM.html");
   
}
   else{
    echo '<script type ="text/Javascript">';
    echo 'alert("Invalid Email or Password !")';
    echo '</script>';
    
   }
?>
<meta http-equiv="refresh" content="0;url=index.html"/>