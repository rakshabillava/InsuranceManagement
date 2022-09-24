<?php
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mbl = $_POST['mbl'];
    $address = $_POST['address'];
    $gmail = $_POST['gmail'];
    $paswd = $_POST['paswd'];

    $conn = new mysqli('localhost','root','','db_insurance');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }
    else{
        $gmail=$_POST['gmail'] ;
        $s="select * from agent_details where gmail ='$gmail'";
        $result=mysqli_query($conn,$s);
        $num=mysqli_num_rows($result);
        if($num==1){
            echo '<script type ="text/Javascript">';
            echo 'alert("Email already exist..!")';
            echo '</script>';
            // header('location: signup.html');
            // <meta http-equiv="refresh" content="0;url=signup.html"/>

        }
        else
        {
        $stmt = $conn->prepare("insert into agent_details (name,gender,dob,mbl,address,gmail,paswd)
        values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisss",$name,$gender,$dob,$mbl,$address,$gmail,$paswd);
        $stmt->execute();
        echo"signup successful....";
        $stmt->close();
        $conn->close();
        header('location: index.html');
        }
    }
    ?>
     <meta http-equiv="refresh" content="0;url=signup.html"/>

  

   
    
    
    