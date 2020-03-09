
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  
  
  <!-- Page level plugin CSS-->
  

  <!-- Custom styles for this template-->

  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="jquery.tabledit.min.js" ></script>
<script type="text/javascript">
    function selectAll() {
        var items = document.getElementsByName('deleteKey[]');
        for (var i = 0; i < items.length; i++) {
            if (items[i].type == 'checkbox')
              if(items[i].checked==true){

                  items[i].checked=false;

              }
              else{
                items[i].checked = true;
              }
              
        }
    }
</script>
  

</head>

<body id="page-top">

<nav class="navbar-dark bg-dark">
    
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="home.php">
      
      <img src="brandicon.png" width="150" height="60" alt="">
      Employee Payroll Management System</a>
   

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="myprofile.php">My Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        
      <li class="nav-item"><form action="logout.php">
          <input type="submit" value="Logout" a href="logout.php">
            </form>
          </li>

</ul>
  </div>
  

  </div>
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
           Add Employee</div>
          <div class="card-body">
            <div class="table-responsive">
              <div  style="padding-top:20px">
                <form method="post" action="addEmp.php">
                  <table>
                  <col width ="150">
                  <col width ="100">
      <tr>
                <td>
                <label>Employee Id</label> </td>
                <td>
                 <input type="text" name="empId" > </td>
               
</tr>
<tr>
  <td>
                <label>Employee Name</label> </td>
                <td>
                <input type="text" name="empName" ></td>
</tr>
<tr>

                <td>
                <label>Address</label></td>
                <td>
                <input type="text" name="empAd" > </td>
</tr>
<tr>
                <td>
                <label>Mobile No</label></td>
                <td>
                <input type="text" name="empNo" ></td>
</tr>

<tr>
  <td></td>
  <td>
             <input type ="submit" value="Add Employee" class="btn btn-info">

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
           Employees</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="dataTable">
              <thead>
              <tr >
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Mobile No</th>
                <form action="delete.php" method="post" >
                <th><input type="checkbox" class="checkbox" name="deleteKey[]" onclick="selectAll()"></th>
                
              </tr>
              </thead>
              <tbody>
              <?php while($row2=mysqli_fetch_array($result))
              {
                $id=$row2["emp_Id"];
                echo '
                <tr>
                
                <td>'.$row2["emp_Id"].'</td>
                <td>'.$row2["emp_name"].'</td>
                <td>'.$row2["emp_address"].'</td>
                <td>'.$row2["emp_no"].'</td>
                
                <td> <input type="checkbox" class="checkbox" name="deleteKey[]" value="'.$id.'"></td>
               
                
              ';
        
              }
               ?>

                  
               </tbody>
              </table>
            <input type="submit" name="btnDelete" value ="Delete Employee" class="btn btn-info">
            </form>
                
          
            
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
