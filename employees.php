
<?php
include 'login.php';
require 'mysql.php';


if($_SESSION['userType']=="Accountant")
  {
    $userCtrl="display:none";
  }
  else{
    $userCtrl="";
  }

  $sql= "select * from tbl_employees ";
  $result=mysqli_query($conn,$sql);


  if(isset($_GET['edit']))
  {
  $empid= $_GET['edit'];
  $sql1="select * from tbl_employees where emp_Id=$empid";
  $result1=mysqli_query($conn,$sql1);
  $row=mysqli_fetch_array($result1);

  $hiddenattr="hidden";
  $colattr="Update";
  $idattr="readonly";
  
  }
  else{
    $colattr="Add";
    $btnCancel="hidden";

  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

  <title>EPMS</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="customstyle.css" rel="stylesheet" type="text/css">

  
  
  <!-- Page level plugin CSS-->
  

  <!-- Custom styles for this template-->

  <link href="css/sb-admin.css" rel="stylesheet"> 

<script type="text/javascript" src="sysTime.js"> </script>
<script type="text/javascript" src="formulas.js"> </script>

<script type="text/javascript">

function clear()
{
document.getElementById("searchemp").value='';
}


function search() {

  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchemp");
  filter = input.value.toUpperCase();
  table = document.getElementById("editable_table");
  tr = table.getElementsByTagName("tr");

 
  for (i = 0; i < tr.length; i++) {
   
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  
  }
}

function myFunction() {
 
}


function submitForm(action)
    {
      var number = document.getElementById('empno').value;
      var compare = "/^[0-9]{1,10}$/g";
      if (number.match(compare)) {
        return true;
        document.getElementById('empform').action = action;
        document.getElementById('empform').submit();

      } else {
       alert(number);
      return false;
  }
        
    }

</script>

</head>

<body id="page-top" onload="startTime()">
<nav class="navbar-dark bg-dark">
 
      <a class="navbar-brand" href="home.php">
          
          <img src="brandicon.png" width="150" height="60" >
          Employee Payroll Management System</a>

          <div class="navbar-brand"  id="time"></div>
        
    
            <a class="navbar-brand" href="myprofile.php">My Profile</a>
      
          <a class="navbar-brand" href="logout.php">Logout </a>

    </nav>

  

  <div id="wrapper">

  
  <ul class="sidebar navbar-nav">
    <li class="nav-item " >
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>DashBoard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="payments.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Payments</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="payhistory.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Payments History</span></a>
      </li>
      <li class="nav-item active" style ="<?php echo $userCtrl?>">
        <a class="nav-link" href="employees.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Employees</span></a>
      </li>
    </ul>


    <div id="content-wrapper">

      <div class="container-fluid">
      

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Welcome <?php echo
              $_SESSION['login_user'];
              ?> !</a>
          </li>
        </ol>
        
       

        <!-- Area Chart Example-->
        
        
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <?php echo $colattr;?> Employee</div>
          <div class="card-body">
            <div class="table-responsive">
              <div  style="padding-top:20px">
                <form id="empform" method="post" >
                  <table>
                  <col width ="150">
                  <col width ="100">
      <tr>
                <td>
                <label>Employee Id</label> </td>
                <td>
                 <input <?php echo $idattr; ?> type="text" name="empId" value="<?php echo $row['emp_Id']; ?>" > </td>
               
</tr>
<tr>
  <td>
                <label>Employee Name</label> </td>
                <td>
                <input type="text" name="empName" value="<?php echo $row['emp_name']; ?>"  ></td>
</tr>
<tr>

                <td>
                <label>Address</label></td>
                <td>
                <input type="text"   name="empAd" value="<?php echo $row['emp_address']; ?>"> </td>
</tr>
<tr>
                <td>
                <label>Mobile No</label></td>
                <td>
                <input type="text" id="empno"  name="empNo"value="<?php echo $row['emp_no']; ?>" ></td>
</tr>
<tr>
                <td>
                <label>Staff Type</label></td>
                <td><select name="stype">
                <?php 

                if(isset($_GET['edit'])){
                
                  if($row['staff_type']=="ACADEMIC")
                  {
                  echo'
                  <option selected="selected" value="ACADEMIC">ACADEMIC</option>
                  <option value="NON-ACADEMIC">NON-ACADEMIC</option>
                  ';
                  }
                  else 
                  {
                    echo'
                    <option value="ACADEMIC">ACADEMIC</option>
                    <option selected="selected" value="NON-ACADEMIC">NON-ACADEMIC</option>
                  ';
                  }
                }
                else
                {
                echo'
                <option disabled selected="selected"> Select Staff Type </option>';
                $rpayrates=mysqli_query($conn,"select staff_type from tbl_payrates");
                while($rowpays=mysqli_fetch_array($rpayrates)){
                 echo'
                   
                    <option value="'.$rowpays["staff_type"].'">'.$rowpays["staff_type"].'</option>
                    ';
                  
                }
              }
                  ?>
                </select></td>
              
</tr>
<tr>
 
  <td>
             <input type ="submit" value="Add Employee" id="btnadd" <?php echo $hiddenattr; ?> class="btn btn-info" onclick="submitForm('addEmp.php')"></td>
            <td> <input type =submit id="updatebtn" value ="Update Employee" class="btn btn-info" <?php echo $btnCancel; ?> onclick="submitForm('updateEmp.php')"></td>
            <td><input type =submit id="clearbtn" value ="Cancel" class="btn btn-info" <?php echo $btnCancel; ?> onclick="clear();window.history.go(-1); return false;" >
           </form>
  </td>


</tr>
                 
                
                
               
               
                
               
                  </table>
        
                
              

              </div>
            </div>
             
            </div>
          </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Employees
          </div>
          <div class="card-body">
            <div align="right">
            <label> <b> Search : </b> </label>
            <input type="text" id="searchemp" onkeyup="search()"></div>
            <div class="table-responsive">
            <table  id="editable_table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Mobile No</th>
                <th>Staff Type</th>
                <th <?php echo $hiddenattr ?> ></th>
                <form action="deleteEmp.php" method="post" >
                <th <?php echo $hiddenattr?> ><input type="checkbox" class="checkbox" name="selectKey[]" onclick="selectAll()"></th>
                
              </tr>
              </thead>
              <tbody>
              <?php while($row2=mysqli_fetch_array($result))
              {
                $id=$row2["emp_Id"];
                echo '
                <tr>
                
                <td >'.$row2["emp_Id"].'</td>
                <td >'.$row2["emp_name"].'</td>
                <td >'.$row2["emp_address"].'</td>
                <td>'.$row2["emp_no"].'</td>
                <td >'.$row2["staff_type"].'</td>
                <td '.$hiddenattr.'  ><a href="employees.php?edit='.$id.'" class="btn btn-info" ">Edit</a></td>
                <td '.$hiddenattr.'> <input type="checkbox" class="checkbox" name="deleteKey[]" value="'.$id.'"></td>
               
                </tr>
              ';
        
              }
               ?>

                  
               </tbody>
              </table>
            <input type="submit" id="deletebtn" name="btnDelete" value ="Delete Employee" <?php echo $hiddenattr ?> class="btn btn-info" > </form>
            <br>
            <br>
            
            
            </div>
          </div>
          
          
        </div>
        
          
        </div>





      </div>

      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Charles Sturt University 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
 
  
  <!-- Bootstrap core JavaScript-->
 
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  
 

</body>

</html>
