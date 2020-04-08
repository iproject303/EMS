<?php 

$inte = $_GET["empid"];
$sql2= "select tbl_employees.emp_name,tbl_employees.staff_type,tbl_payrates.pay_rate,tbl_payrates.ot_rate from tbl_employees,tbl_payrates WHERE tbl_employees.staff_type=tbl_payrates.staff_type AND emp_Id=$inte";
$result2=mysqli_query($conn,$sql2);
$row3=mysqli_fetch_array($result2);

    $name=$row3['emp_name'];
    $staff=$row3['staff_type'];
    $payrate=$row3['pay_rate'];
    $otrate=$row3['ot_rate'];
  
?>