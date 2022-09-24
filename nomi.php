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
  if('nominee_details'.'POLICY_NO'!='policy_details'.'POLICY_NO'){
    echo '<script type ="text/Javascript">';
    echo 'alert("POLICY DOES NOT EXIST !")';
    echo '</script>';
  }
?>
<meta http-equiv="refresh" content="0;url=custnom.html"/>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['NOM_IDEdit'])){

    $NOM_ID = $_POST['NOM_IDEdit'];
    $N_NAME = $_POST['N_NAMEEdit'];
    $N_GENDER = $_POST['N_GENDEREdit'];
    $N_DOB = $_POST['N_DOBEdit'];
    $RELATN_T = $_POST['RELATN_TEdit'];
    $N_ADHAR = $_POST['N_ADHAREdit'];
    $N_PAN = $_POST['N_PANEdit'];
    $N_EMAIL = $_POST['N_EMAILEdit'];
    $N_ADDRESS = $_POST['N_ADDRESSEdit'];
    $N_MOBILE = $_POST['N_MOBILEEdit'];
    $POLICY_NO= $_POST['POLICY_NOEdit'];
    

    $sql = "UPDATE nominee_details SET N_NAME = '$N_NAME' , N_GENDER = '$N_GENDER' , N_DOB = '$N_DOB' , RELATN_T = '$RELATN_T' , N_ADHAR = '$N_ADHAR' , N_PAN = '$N_PAN' , N_EMAIL = '$N_EMAIL' , N_ADDRESS = '$N_ADDRESS' , N_MOBILE = '$N_MOBILE' , POLICY_NO = '$POLICY_NO' WHERE nominee_details.NOM_ID  = '$NOM_ID '";

     $result = mysqli_query($conn, $sql);
     if($result){
            $update = true;
    }
     else{
         echo "could not updated the details successfully";
     }
    }

    else{
    $N_NAME = $_POST['N_NAME'];
    $N_GENDER = $_POST['N_GENDER'];
    $N_DOB = $_POST['N_DOB'];
    $RELATN_T = $_POST['RELATN_T'];
    $N_ADHAR = $_POST['N_ADHAR'];
    $N_PAN = $_POST['N_PAN'];
    $N_EMAIL = $_POST['N_EMAIL'];
    $N_ADDRESS = $_POST['N_ADDRESS'];
    $N_MOBILE = $_POST['N_MOBILE'];
    $POLICY_NO= $_POST['POLICY_NO'];
    

    $sql = "INSERT INTO nominee_details (N_NAME, N_GENDER, N_DOB, RELATN_T, N_ADHAR, N_PAN, N_EMAIL, N_ADDRESS,
     N_MOBILE, POLICY_NO) VALUES ('$N_NAME', '$N_GENDER', '$N_DOB', '$RELATN_T', '$N_ADHAR', '$N_PAN', '$N_EMAIL', '$N_ADDRESS', '$N_MOBILE', '$POLICY_NO')";

     $result = mysqli_query($conn, $sql);

     if($result){
         $insert = true;
     }
     else{
         echo "the record was not inserted correctly becoz of this error ". mysqli_error($conn);
     }
    } 
}
header('location: NOMDIS.php')
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
<?php
//  $N_NAME = $_POST['N_NAME'];
//  $N_GENDER = $_POST['N_GENDER'];
//  $N_DOB = $_POST['N_DOB'];
//  $RELATN_T = $_POST['RELATN_T'];
//  $N_ADHAR = $_POST['N_ADHAR'];
//  $N_PAN = $_POST['N_PAN'];
//  $N_EMAIL= $_POST['N_EMAIL'];
//  $N_ADDRESS = $_POST['N_ADDRESS'];
//  $N_MOBILE = $_POST['N_MOBILE'];
//  $POLICY_NO = $_POST['POLICY_NO'];

//  $conn = new mysqli('localhost','root','','db_insurance');
//  if($conn->connect_error){
//      die('connection failed : '.$conn->connect_error);
//  }
//  else{
//     $stmt = $conn->prepare("insert into nominee_details (N_NAME,N_GENDER,N_DOB,RELATN_T,N_ADHAR,N_PAN,N_EMAIL,N_ADDRESS,N_MOBILE,POLICY_NO)
//     values(?,?,?,?,?,?,?,?,?,?)");
//     $stmt->bind_param("ssssisssii",$N_NAME,$N_GENDER,$N_DOB,$RELATN_T,$N_ADHAR,$N_PAN,$N_EMAIL,$N_ADDRESS,$N_MOBILE,$POLICY_NO);
//     $stmt->execute();
//     $stmt->close();
//     $conn->close();

// }
// header('location: custnom.html')
 
?>