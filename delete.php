<?php

require'mysql.php';

    
if(isset($_POST['btnDelete']))
    {
        $chkarr=$_POST['deleteKey'];
        foreach ($chkarr as $id)
        {
            $sql="Delete from tbl_employees where emp_Id=".$id;

        

    mysqli_query($conn,$sql);
        }
    }

    header("location:employees.php");


?>