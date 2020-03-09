<?php

require 'mysql.php';


  $empid=$_POST["empId"];
  $empname=$_POST["empName"];
  $empAd=$_POST["empAd"];
  $empno=$_POST["empNo"];


  $intemp=(int)$empid;
  $intno=(int)$empno;

  $sql2 = "insert into tbl_employees VALUES ($intemp,'$empname','$empAd',$intno)";
  if(mysqli_query($conn,$sql2))
  {
    $_SESSION ['status']="success";
    
  }
  else
  {
    $_SESSION['status']="unsuccess";
 
  }

header("Location: employees.php");

?>