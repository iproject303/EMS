<?php

require 'mysql.php';

  $empid=(int)$_POST["emp_Id"];
  $empname=$_POST["emp_name"];
  $startDate=$_POST["start_date"];
  $endDate=$_POST["end_date"];
  $wh=(double)$_POST["work_hours"];
  $rph=(int)$_POST["rph"];
  $ot=(double)$_POST["o/t_hours"];
  $rphOT=(int)$_POST["rph_ot"];
  $sal= ($wh*$rph)+($ot*$rphOT);

  $startTimeStamp = strtotime($startDate);
  $endTimeStamp = strtotime($endDate);
  
  $timeDiff = abs($endTimeStamp - $startTimeStamp);
  
  $numberDays = $timeDiff/86400;  // 86400 seconds in one day
  
  // and you might want to convert to integer
  $numberDays = intval($numberDays);

if(isset($_POST['addPay'])){
if(empty($empid))
{
  echo "<script> 
           
  alert('Please select Employee ID!');
  window.location.replace(\"payments.php\");
  
  </script>";
}
else{

  $sql2 = "insert into tbl_payments (emp_id,start_date,end_date,work_hours,ot_hours,salary) VALUES ($empid,'$startDate','$endDate',$wh,$ot,$sal)";
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
}
?>
