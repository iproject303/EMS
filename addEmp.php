<?php

require 'mysql.php';


  $empid=(int)$_POST["empId"];
  $empname=$_POST["empName"];
  $empAd=$_POST["empAd"];
  $empno=(int)$_POST["empNo"];
  $staff=$_POST["stype"];

if((!empty($empid) && !empty($empname) && !empty($empAd) && !empty($empno) && !empty($staff)))
{
  $sql2 = "insert into tbl_employees VALUES ($empid,'$empname','$empAd',$empno,'$staff')";
  mysqli_query($conn,$sql2);

    
    echo "<script> 
     
        
        alert('Succesfully Added Employee');
        window.location.replace(\"employees.php\");
        
        </script>";

}

else{
  echo "<script> 
     
        
  alert('Error adding Employee, Please ensure all the fields are correctly entered.');
  window.location.replace(\"employees.php\");
  
  </script>";
  
mysqli_close($conn);
}



function msgError($obj)
{


  echo "<script>   

  alert('Enter Value for the field -'.$obj.'');
  window.location.replace(\"employees.php\");
  
  </script>";


}

?>