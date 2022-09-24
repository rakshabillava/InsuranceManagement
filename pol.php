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
if('policy_details'.'ADHAR'!='customer_details'.'ADHAR' && 'policy_details'.'gmail'!='customer_details'.'gmail' ){
  echo '<script type ="text/Javascript">';
  echo 'alert("ADHAR OR GMAIL OR INSURANCE DOES NOT EXIST !")';
  echo '</script>';
}
// header('location: custnom.php')
// exit();
?>
<meta http-equiv="refresh" content="0;url=custnom.html"/>
<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['policy_noEdit'])){

    $POLICY_NO =$_POST['policy_noEdit'];
    $POLICY_NO =$_POST['POLICY_NOEdit'];
    $SUM_A = $_POST['SUM_AEdit'];
    $INSURANCE_ID  = $_POST['INSURANCE_IDEdit'];
    $PREM_A = $_POST['PREM_AEdit'];
    $P_MODE = $_POST['P_MODEEdit'];
    $POL_DATE = $_POST['POL_DATEEdit'];
    $PAY_FROM = $_POST['PAY_FROMEdit'];
    $PAY_TO = $_POST['PAY_TOEdit'];
    $MAT_DATE = $_POST['MAT_DATEEdit'];
    $POL_STATUS = $_POST['POL_STATUSEdit'];
    $ADHAR  = $_POST['ADHAREdit'];
    $gmail = $_POST['gmailEdit'];
    $sql = "UPDATE 	policy_details SET POLICY_NO = '$POLICY_NO' , SUM_A = '$SUM_A' , INSURANCE_ID = '$INSURANCE_ID' , PREM_A = '$PREM_A' , P_MODE = '$P_MODE' , POL_DATE = '$POL_DATE' , PAY_FROM = '$PAY_FROM' , PAY_TO = '$PAY_TO' , MAT_DATE = '$MAT_DATE' , POL_STATUS = '$POL_STATUS' , ADHAR = '$ADHAR' , gmail = '$gmail' WHERE 	policy_details.POLICY_NO = '$POLICY_NO'";

     $result = mysqli_query($conn, $sql);
     if($result){
            $update = true;
    }
     else{
         echo "could not updated the details successfully";
     }
    }

    else{
    $POLICY_NO = $_POST['POLICY_NO'];
    $SUM_A = $_POST['SUM_A'];
    $INSURANCE_ID = $_POST['INSURANCE_ID'];
    $PREM_A = $_POST['PREM_A'];
    $P_MODE = $_POST['P_MODE'];
    $POL_DATE = $_POST['POL_DATE'];
    $PAY_FROM = $_POST['PAY_FROM'];
    $PAY_TO = $_POST['PAY_TO'];
    $MAT_DATE = $_POST['MAT_DATE'];
    $POL_STATUS = $_POST['POL_STATUS'];
    $ADHAR = $_POST['ADHAR'];
    $gmail = $_POST['gmail'];

    $sql = "INSERT INTO policy_details (POLICY_NO, SUM_A, INSURANCE_ID, PREM_A, P_MODE, POL_DATE, PAY_FROM, PAY_TO,
     MAT_DATE, POL_STATUS, ADHAR, gmail) VALUES ('$POLICY_NO', '$SUM_A', '$INSURANCE_ID', '$PREM_A', '$P_MODE', '$POL_DATE', '$PAY_FROM', '$PAY_TO', '$MAT_DATE', '$POL_STATUS', '$ADHAR', '$gmail')";

     $result = mysqli_query($conn, $sql);

     if($result){
         $insert = true;
     }
     else{
         echo "the record was not inserted correctly becoz of this error ". mysqli_error($conn);
     }
    } 
}
header('location: POLDIS.php')
?>
<!-- <meta http-equiv="refresh" content="0;url=custnom.html"/> -->

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
    <!-- <meta http-equiv="refresh" content="0;url=custnom.html"/> -->

