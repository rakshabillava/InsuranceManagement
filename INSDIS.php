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
    $insurance_id  = $_GET['delete'];
    // echo $ADHAR;
    $delete = true;
    $sql = "DELETE FROM `insurance_details` WHERE `insurance_id` = $insurance_id ";
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
    <title>INSCRUD</title>
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

      <form action="ins.php" method="post">
      <div class="modal-body"> 
    <h1>INSURANCE DETAILS</h1>
    <input type="hidden" name="INSURANCE_IDEdit" id="INSURANCE_IDEdit">
    <div class="inssy">
    <label> INSURANCE ID :</label>
    <input type="text" name="insurance_idEdit" id="insurance_idEdit" placeholder="" required> <br>
    <label>INSURANCE TYPE :</label>
    <select name="ins_typeEdit" id="ins_typeEdit">
         <option disabled selected>INSURANCE</option>
         <option>CHILD INSURANCE</option>
         <option>TERM INSURANCE</option>
         <option>ENDOWMENT INSURANCE</option>
         <option>MONEY BACK INSURANCE </option>
         <option>UNIT LINK INSURANCE </option>
          <option>WHOLE LIFE INSURANCE </option>
 </select><br>
    <label> INSURANCE SCHEME :</label>
    <input type="text" name="ins_schemeEdit" id="ins_schemeEdit" placeholder="" required> <br>
    <label> MINIMUM SUM ASSURED :</label>
    <input type="text" name="min_sum_aEdit" id="min_sum_aEdit" placeholder="" required>  <br>
    <label> MAXIMUM SUM ASSURED :</label>
    <input type="text" name="max_sum_aEdit" id="max_sum_aEdit" placeholder="" required>  <br>
    <label>DATE OF COMMENCEMENT :</label>
    <input type="text" name="docEdit" id="docEdit" placeholder="" required>  <br>
  
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
                                 <th scope="col">INSURANCE ID :</th>
                                 <th scope="col">INSURANCE TYPE :</th>
                                 <th scope="col">INSURANCE SCHEME :</th>
                                 <th scope="col">MINIMUM SUM ASSURED :</th>
                                 <th scope="col">MAXIMUM SUM ASSURED :</th>
                                 <th scope="col">DATE OF COMMENCEMENT :</th>
                                 <th scope="col">ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $sql = "SELECT * FROM  insurance_details";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>
                    <td>". $row['insurance_id'] . "</td>
                    <td>". $row['ins_type'] . "</td>
                    <td>". $row['ins_scheme'] . "</td>
                    <td>". $row['min_sum_a'] . "</td>
                    <td>". $row['max_sum_a'] . "</td>
                    <td>". $row['doc'] . "</td>
                    <td> <button class='edit btn btn-sm btn-primary' id=".$row['insurance_id'].">Edit</button> 
                    <br>
                    <button class='delete btn btn-sm btn-primary' id=d".$row['insurance_id'].">DELETE</button> </td>
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
         insurance_id  = tr.getElementsByTagName("td")[0].innerText;
         ins_type = tr.getElementsByTagName("td")[1].innerText;
         ins_scheme = tr.getElementsByTagName("td")[2].innerText;
         min_sum_a = tr.getElementsByTagName("td")[3].innerText;
         max_sum_a = tr.getElementsByTagName("td")[4].innerText;
         doc = tr.getElementsByTagName("td")[5].innerText;
        //  PAY_FROM = tr.getElementsByTagName("td")[6].innerText;
        //  PAY_TO = tr.getElementsByTagName("td")[7].innerText;
        //  MAT_DATE = tr.getElementsByTagName("td")[8].innerText;
        //  POL_STATUS = tr.getElementsByTagName("td")[9].innerText;
        //  ADHAR = tr.getElementsByTagName("td")[10].innerText;
        //  gmail = tr.getElementsByTagName("td")[11].innerText;
         console.log(insurance_id, ins_type, ins_scheme, min_sum_a, max_sum_a, doc);
         insurance_idEdit.value = insurance_id;
         ins_typeEdit.value = ins_type;
         ins_schemeEdit.value = ins_scheme;
         min_sum_aEdit.value = min_sum_a;
         max_sum_aEdit.value = max_sum_a;
         docEdit.value = 	doc;
        //  PAY_FROMEdit.value = 	PAY_FROM;
        //  PAY_TOEdit.value = PAY_TO;
        //  MAT_DATEEdit.value = MAT_DATE;
        //  POL_STATUSEdit.value = POL_STATUS;
        //  ADHAREdit.value = ADHAR;
        //  gmailEdit.value = gmail;
         INSURANCE_IDEdit.value = e.target.id;
         console.log(e.target.id)
         $('#editModal').modal('toggle');

       })
     })

     deletes = document.getElementsByClassName('delete');
     Array.from(deletes).forEach((element)=>{
       element.addEventListener("click", (e)=>{
         console.log("edit ", );
         insurance_id = e.target.id.substr(1,);
         
        
        if(confirm("Are you sure you want to delete this?")){
          console.log("yes")
          window.location = `INSDIS.php?delete=${insurance_id}`;
        }
        else{
          console.log("no");
        }
       })
     })
    </script>
  </body>
</html>
