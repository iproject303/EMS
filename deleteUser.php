<?php

require'mysql.php';

    
if(isset($_POST['btnDelete']))
    {
        $chkarr=$_POST['deleteKey'];
        $count=count($chkarr);
        foreach ($chkarr as $id)
        {
            $sql="Delete from tbl_User where userId=".$id;
        
        echo "<script> 
     
        
        alert('Succesfully Deleted $count record(s)');
        window.location.replace(\"useraccounts.php\");
        
        </script>";

    mysqli_query($conn,$sql);
        }
    }

?>