<?php

require 'mysql.php';

  $empid=(int)$_POST["emp_Id"];
  $empname=$_POST["emp_name"];
  $startDate=$_POST["start_date"];
  $endDate=$_POST["end_date"];
  $wh=(double)$_POST["work_hours"];
  $rph=(double)$_POST["rph"];
  $ot=(double)$_POST["ot_hours"];
  $rphOT=(double)$_POST["rph_ot"];
  $sal= ($wh*$rph)+($ot*$rphOT);
  $paystat="Waiting for Approval";

if(empty($empid))
{
  echo "<script> 
           
  alert('Please select Employee ID!');
  window.location.replace(\"payments.php\");
  
  </script>";
}
else{

  $sql2 = "insert into tbl_payments (emp_id,start_date,end_date,work_hours,ot_hours,salary,paystat) VALUES ($empid,'$startDate','$endDate',$wh,$ot,$sal,'$paystat')";
  if(mysqli_query($conn,$sql2))
  {
    
    echo "<script> 
     
      
        alert('Succesfully Added Payment Details');
        window.location.replace(\"payments.php\");
        
        </script>";
    
  }
  
  else
  {


    echo "<script> 
     
        
        alert('Error adding Employee, Please ensure all the fields are correctly entered.');
        window.location.replace(\"payments.php\");
        
        </script>";
 
  }
mysqli_close($conn);
}

?>
