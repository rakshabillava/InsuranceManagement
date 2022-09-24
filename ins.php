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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['INSURANCE_IDEdit'])){

    $insurance_id =$_POST['INSURANCE_IDEdit'];
    $insurance_id =$_POST['insurance_idEdit'];
    $ins_type = $_POST['ins_typeEdit'];
    $ins_scheme  = $_POST['ins_schemeEdit'];
    $min_sum_a = $_POST['min_sum_aEdit'];
    $max_sum_a = $_POST['max_sum_aEdit'];
    $doc = $_POST['docEdit'];
   
    $sql = "UPDATE 	insurance_details SET insurance_id = '$insurance_id' , ins_type = '$ins_type' , ins_scheme = '$ins_scheme' , min_sum_a = '$min_sum_a' , max_sum_a = '$max_sum_a' , doc = '$doc' WHERE insurance_details.insurance_id = '$insurance_id'";

     $result = mysqli_query($conn, $sql);
     if($result){
            $update = true;
    }
     else{
         echo "could not updated the details successfully";
     }
    }

    else{
    $insurance_id = $_POST['insurance_id'];
    $ins_type = $_POST['ins_type'];
    $ins_scheme = $_POST['ins_scheme'];
    $min_sum_a = $_POST['min_sum_a'];
    $max_sum_a = $_POST['max_sum_a'];
    $doc = $_POST['doc'];
    // $PAY_FROM = $_POST['PAY_FROM'];
    // $PAY_TO = $_POST['PAY_TO'];
    // $MAT_DATE = $_POST['MAT_DATE'];
    // $POL_STATUS = $_POST['POL_STATUS'];
    // $ADHAR = $_POST['ADHAR'];
    // $gmail = $_POST['gmail'];

    $sql = "INSERT INTO  insurance_details (insurance_id, ins_type, ins_scheme, min_sum_a, max_sum_a, doc) VALUES ('$insurance_id', '$ins_type', '$ins_scheme', '$min_sum_a', '$max_sum_a', '$doc')";

     $result = mysqli_query($conn, $sql);

     if($result){
         $insert = true;
     }
     else{
         echo "the record was not inserted correctly becoz of this error ". mysqli_error($conn);
     }
    } 
}
header('location: INSDIS.php')
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
    
    