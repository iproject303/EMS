<?php

require'mysql.php';


  $userid=(int)$_POST["userId"];
  $username=$_POST["userName"];
  $userPwd=$_POST["userPwd"];
  $pass=md5($userPwd);
  $atype=$_POST["atype"];


if((!empty($userid) && !empty($username) && !empty($userPwd) && !empty($atype))){
$sql="update tbl_User SET user_name='$username',userPwd='$pass',userType='$atype' where userId=$userid";
mysqli_query($conn,$sql);
    
    echo "<script> 
     
        
        alert('Succesfully Updated User $username');
        window.location.replace(\"useraccounts.php\");
        
        </script>";
}
else{    
    echo "<script> 
     
        
        alert('Error updating user, Please ensure all the fields are correctly entered');
        window.location.replace(\"useraccounts.php\");
        
        </script>";
}
mysqli_close($conn);

?>