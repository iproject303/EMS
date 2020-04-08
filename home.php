<?php
include 'login.php';
require 'mysql.php';


if(!isset($_SESSION['login_user'])){
  header("location: index.php");
  }

  if($_SESSION['userType']=="Accountant")
  {
    $userCtrl="display:none";
  }

  $sql= "select * from tbl_employees ";

  $result=mysqli_query($conn,$sql);
  $emp_no=mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EPMS</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="customstyle.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript" src="sysTime.js"> </script>

</head>

<body id="page-top" onload="startTime()" >
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
  
      <li class="nav-item active" >
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>DashBoard</span>
        </a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="payments.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Payments</span></a>
      </li>
      <li class="nav-item " >
        <a class="nav-link" href="payhistory.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Payments History</span></a>
      </li>
      <li class="nav-item" style ="<?php echo $userCtrl ?>">
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
        <table >
          <tr>
          <td style="padding-left:50px">
        <img src="logo.png" alt="CSU logo" width="400" height="200">
          </td>
          <td width="600"align="right" style="font-size: 50px;">
        <div id="time" style="color:red"></div>
          </td>
</tr>
<tr>
  <td style="padding-left:50px;padding-top:100px">
  <span style="font-weight:bold">Number of Employees currently working :   </span><?php echo $emp_no ?>
</td>
</tr>
          </table>     
        
       

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
