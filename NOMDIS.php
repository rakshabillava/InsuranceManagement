<?php
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
  if(isset($_GET['delete'])){
    $NOM_ID = $_GET['delete'];
    // echo $ADHAR;
    $delete = true;
    $sql = "DELETE FROM `nominee_details` WHERE `NOM_ID` = $NOM_ID";
    $result = mysqli_query($conn, $sql);
}
?>
<?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    
  </div>";
  }
  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
      $('#myTable').DataTable();
      } );
    </script>
    <title>NOMCRUD</title>
  </head>
  <body>
      <!-- edit modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit modal
</button> -->

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">UPDATE DETAILS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="nomi.php" method="post">
      <div class="modal-body"> 
    <h1>NOMINEE DETAILS</h1>
    <input type="hidden" name="NOM_IDEdit" id="NOM_IDEdit">
    <div class="nommy">
    <label> FULL NAME :</label>
    <input type="text" name="N_NAMEEdit" id="N_NAMEEdit" placeholder="" required> <br>
    <label> GENDER :</label>
      <Select name="N_GENDEREdit" id="N_GENDEREdit">
        <option disabled selected></option>
        <option>F</option>
        <option>M</option>
        <option>O</option>
    </select>
    <br>
    <label> DATE OF BIRTH :</label>
    <input type="date" name="N_DOBEdit" id="N_DOBEdit" placeholder="" required>  <br>
    <label> RELATIONSHIP TYPE :</label>
    <input type="text" name="RELATN_TEdit" id="RELATN_TEdit" placeholder="" required>  <br>
    <label> ADHAR :</label>
    <input type="text" name="N_ADHAREdit" id="N_ADHAREdit" placeholder="">  <br>
    <label> PAN :</label>
    <input type="text" name="N_PANEdit" id="N_PANEdit" placeholder="" required>  <br>
    <label> NOMINEE EMAIL :</label>
    <input type="text" name="N_EMAILEdit" id="N_EMAILEdit" placeholder="" required>  <br>
    <label> FULL ADDRESS :</label>
    <input type="text" name="N_ADDRESSEdit" id="N_ADDRESSEdit" placeholder="" required>  <br>
    <label> MOBILE NO :</label>
    <input type="text" name="N_MOBILEEdit" id="N_MOBILEEdit" placeholder="" required>  <br>
    <label> POLICY NO :</label>
    <input type="text" name="POLICY_NOEdit" id="POLICY_NOEdit" placeholder="">  <br>
</div>

<br>
</div>
      <div class="modal-footer d-block mr-auto">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="more.html">Back</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"></a>
              </li>
              <li class="nav-item dropdown">
                <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->
                
                <!-- </a> -->
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled"></a>
              </li>
            </ul>
            <form class="d-flex">
              <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
              <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
            </form>
          </div>
        </div>
      </nav>
     
      <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
              <tr>
                                 <th scope="col">NOMINEE NAME</th>
                                 <th scope="col">GENDER</th>
                                 <th scope="col">DATE OF BIRTH</th>
                                 <th scope="col">RELATIONSHIP TYPE</th>
                                 <th scope="col">ADHAR</th>
                                 <th scope="col">PAN</th>
                                 <th scope="col">NOMINEE EMAIL</th>
                                 <th scope="col">ADDRESS</th>
                                 <th scope="col">MOBILE</th>
                                 <th scope="col">POLICY NO</th>
                                 <th scope="col">ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $sql = "SELECT * FROM nominee_details";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>
                    <td>". $row['N_NAME'] . "</td>
                    <td>". $row['N_GENDER'] . "</td>
                    <td>". $row['N_DOB'] . "</td>
                    <td>". $row['RELATN_T'] . "</td>
                    <td>". $row['N_ADHAR'] . "</td>
                    <td>". $row['N_PAN'] . "</td>
                    <td>". $row['N_EMAIL'] . "</td>
                    <td>". $row['N_ADDRESS'] . "</td>
                    <td>". $row['N_MOBILE'] . "</td>
                    <td>". $row['POLICY_NO'] . "</td>
                    
                    <td> <button class='edit btn btn-sm btn-primary' id=".$row['NOM_ID'].">Edit</button> 
                    <br>
                    <button class='delete btn btn-sm btn-primary' id=d".$row['NOM_ID'].">DELETE</button> </td>
                    </tr>";
                  }
                  
              ?>
              
            </tbody>
          </table>
      </div>
      <hr>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
     edits = document.getElementsByClassName('edit');
     Array.from(edits).forEach((element)=>{
       element.addEventListener("click", (e)=>{
         console.log("edit", );
         tr = e.target.parentNode.parentNode;
         N_NAME = tr.getElementsByTagName("td")[0].innerText;
         N_GENDER = tr.getElementsByTagName("td")[1].innerText;
         N_DOB = tr.getElementsByTagName("td")[2].innerText;
         RELATN_T = tr.getElementsByTagName("td")[3].innerText;
         N_ADHAR = tr.getElementsByTagName("td")[4].innerText;
         N_PAN = tr.getElementsByTagName("td")[5].innerText;
         N_EMAIL = tr.getElementsByTagName("td")[6].innerText;
         N_ADDRESS = tr.getElementsByTagName("td")[7].innerText;
         N_MOBILE = tr.getElementsByTagName("td")[8].innerText;
         POLICY_NO = tr.getElementsByTagName("td")[9].innerText;
        //  M_NAME = tr.getElementsByTagName("td")[10].innerText;
        //  S_NAME = tr.getElementsByTagName("td")[11].innerText;
        //  OCCUPATION = tr.getElementsByTagName("td")[12].innerText;
         console.log(N_NAME, N_GENDER, N_DOB, RELATN_T, N_ADHAR, N_PAN, N_EMAIL, N_ADDRESS, N_MOBILE, POLICY_NO);
         N_NAMEEdit.value = N_NAME;
         N_GENDEREdit.value = N_GENDER;
         N_DOBEdit.value = N_DOB;
         RELATN_TEdit.value = RELATN_T;
         N_ADHAREdit.value = N_ADHAR;
         N_PANEdit.value = N_PAN;
         N_EMAILEdit.value = N_EMAIL;
         N_ADDRESSEdit.value = N_ADDRESS;
         N_MOBILEEdit.value = N_MOBILE;
         POLICY_NOEdit.value = POLICY_NO;
        //  M_NAMEEdit.value = M_NAME;
        //  S_NAMEEdit.value = S_NAME;
        //  OCCUPATIONEdit.value = OCCUPATION;
         NOM_IDEdit.value = e.target.id;
         console.log(e.target.id)
         $('#editModal').modal('toggle');

       })
     })

     deletes = document.getElementsByClassName('delete');
     Array.from(deletes).forEach((element)=>{
       element.addEventListener("click", (e)=>{
         console.log("edit ", );
         NOM_ID = e.target.id.substr(1,);
         
        
        if(confirm("Are you sure you want to delete this?")){
          console.log("yes")
          window.location = `NOMDIS.php?delete=${NOM_ID}`;
        }
        else{
          console.log("no");
        }
       })
     })
    </script>
  </body>
</html>