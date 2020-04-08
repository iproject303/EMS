<?php

require 'mysql.php';


  $empid=(int)$_POST["empId"];
  $empname=$_POST["empName"];
  $empAd=$_POST["empAd"];
  $empno=(int)$_POST["empNo"];
  $staff=$_POST["stype"];

if(empty($empid))
{
 header("location:employees.php");
}
else{

  $sql2 = "insert into tbl_employees VALUES ($empid,'$empname','$empAd',$empno,'$staff')";
  if(mysqli_query($conn,$sql2))
  {
    
    echo "<script> 
     
        
        alert('Succesfully Added Employee');
        window.location.replace(\"employees.php\");
        
        </script>";
    
  }
  
  else
  {
    echo "<script> 
     
        
        alert('Error adding Employee, Please ensure all the fields are correctly entered.');
        window.location.replace(\"employees.php\");
        
        </script>";
 
  }
mysqli_close($conn);
}

?>