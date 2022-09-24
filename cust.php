<?php
  $insert = false;
  $update = false;
  $delete = false;
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "db_insurance";


  $conn = mysqli_connect($servername, $username, $password, $database);

  if(!$conn){
    die("sorry we failed to connect: ". mysqli_connect_error());
  }

//   if(isset($_GET['delete'])){
//       $ADHAR = $_GET['delete'];
//       echo $ADHAR;
// //       $delete = true;
//       $sql = "DELETE FROM `customer_details` WHERE `ADHAR` = $ADHAR";
//       $result = mysqli_query($conn, $sql);
//   }
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['adharEdit'])){

    $ADHAR =$_POST['adharEdit'];
    $ADHAR=$_POST['ADHAREdit'];
    $NAME = $_POST['NAMEEdit'];
    $GENDER = $_POST['GENDEREdit'];
    $DOB = $_POST['DOBEdit'];
    $MOBILE = $_POST['MOBILEEdit'];
    $ADDRESS = $_POST['ADDRESSEdit'];
    $EMAIL = $_POST['EMAILEdit'];
    $PAN = $_POST['PANEdit'];
    $M_STATUS = $_POST['M_STATUSEdit'];
    $F_NAME= $_POST['F_NAMEEdit'];
    $M_NAME = $_POST['M_NAMEEdit'];
    $S_NAME = $_POST['S_NAMEEdit'];
    $OCCUPATION = $_POST['OCCUPATIONEdit'];

    $sql = "UPDATE customer_details SET ADHAR = '$ADHAR' , NAME = '$NAME' , GENDER = '$GENDER' , DOB = '$DOB' , MOBILE = '$MOBILE' , ADDRESS = '$ADDRESS' , EMAIL = '$EMAIL' , PAN = '$PAN' , M_STATUS = '$M_STATUS' , F_NAME = '$F_NAME' , M_NAME = '$M_NAME' , S_NAME = '$S_NAME' , OCCUPATION = '$OCCUPATION' WHERE customer_details.ADHAR = '$ADHAR'";

     $result = mysqli_query($conn, $sql);
     if($result){
            $update = true;
    }
     else{
         echo "could not updated the details successfully";
     }
    }

    else{
    $ADHAR=$_POST['ADHAR'];
    $NAME = $_POST['NAME'];
    $GENDER = $_POST['GENDER'];
    $DOB = $_POST['DOB'];
    $MOBILE = $_POST['MOBILE'];
    $ADDRESS = $_POST['ADDRESS'];
    $EMAIL = $_POST['EMAIL'];
    $PAN = $_POST['PAN'];
    $M_STATUS = $_POST['M_STATUS'];
    $F_NAME= $_POST['F_NAME'];
    $M_NAME = $_POST['M_NAME'];
    $S_NAME = $_POST['S_NAME'];
    $OCCUPATION = $_POST['OCCUPATION'];

    $sql = "INSERT INTO customer_details (ADHAR, NAME, GENDER, DOB, MOBILE, EMAIL, ADDRESS, PAN,
     M_STATUS, F_NAME, M_NAME, S_NAME, OCCUPATION) VALUES ('$ADHAR', '$NAME', '$GENDER', '$DOB', '$MOBILE', '$EMAIL', '$ADDRESS', '$PAN', '$M_STATUS', '$F_NAME', '$M_NAME', '$S_NAME', '$OCCUPATION')";

     $result = mysqli_query($conn, $sql);

     if($result){
         $insert = true;
     }
     else{
         echo "the record was not inserted correctly becoz of this error ". mysqli_error($conn);
     }
    } 
}
header('location: display.php')
?>
 <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  ?>
  

    