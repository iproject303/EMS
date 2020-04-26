<?php

require'mysql.php';

$pid=(int)$_POST["userId"];
$pname=$_POST["username"];
$ppwd=md5($_POST["userPwd"]);


if((!empty($pname) && !empty($ppwd) && !empty($ppwd))){
$sql="update tbl_User SET user_name='$pname',userPwd='$ppwd' where userid=$pid";
    
    mysqli_query($conn,$sql);
    
    echo "<script> 
     
        
        alert('Succesfully Updated Account $pid');


        if (confirm('Do you want to logout to make changes?') == true) {
          window.location.replace(\"logout.php\");
        } else {
          window.location.replace(\"myprofile.php\");
        }
    
      
        
        </script>";
    
  }
  
  else
  {
    echo "<script> 
     
        
        alert('Error updating Account details, Please ensure all the fields are correctly entered.');
        window.location.replace(\"myprofile.php\");
        
        </script>";
 
  }
mysqli_close($conn);

?>