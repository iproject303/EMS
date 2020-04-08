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

<body id="page-top">
<nav class="navbar-dark bg-dark">
 
      <a class="navbar-brand" href="home.php">
          
          <img src="brandicon.png" width="150" height="60" >
          Employee Payroll Management System</a>

          <div class="navbar-brand"  id="time"></div>
        
    
            <a class="navbar-brand" href="myprofile.php">My Profile</a>
      
          <a class="navbar-brand" href="logout.php">Logout </a>

    </nav>


  <div id="wrapper">

  
    

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

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           My Payslips</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr >
                <th>Payment ID</th>
                <th>Payment Date</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Total Hours</th>
                <th>Amount ($)</th>  
              </tr>
              <?php while($row1 =mysqli_fetch_array($result1)):;?>
              <tr>
                <td><?php echo $row1[0];?></td>
                <td><?php echo $row1[1];?></td>
                <td><?php echo $row1[2];?></td>
              </tr>
              <?php endwhile;?>
              </table>
            </div>
          </div>
          
        </div>

        
          </div>
          
        </div>

      



      </div>
      
      <div align="right" style="padding-right:20px" >
      <script>
          document.write('<a href="' + document.referrer + '" class="backbutton">Go Back</a>');
      </script>
      </div>


      </div>
     

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
