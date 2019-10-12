
<?php
require 'mysql.php';
session_start(); 
$date= date('Y-m-d');
$time= date("h:i:s");
$message='';


if (isset($_POST['submit'])) {
    
    $sql= "select in_time,out_time,a_date from tbl_attendance where id='" .$_SESSION['login_user']."' AND a_date='".$date."'";

    $result=mysqli_query($conn,$sql);
  
    
    while($row2 =mysqli_fetch_array($result)){
    if($row[0]=null) {
        $sqlinsert = "INSERT INTO tbl_attendance (in_time,a_date)
        VALUES ($time,$date)";
        
        if ($conn->query($sqlinsert) === TRUE) {
            $message= "Successfully Punched In!";
            header('location:home.php');
    
        }
    }
    else if ($row[1]=null) {
        $sqlinsert = "INSERT INTO tbl_attendance (out_time,a_date)
        VALUES ($time,$date)";
        
        if ($conn->query($sqlinsert) === TRUE) {
            $message= "Successfully Punched Out!";
            header('location:home.php');
        } 
    }
    $_SESSION['message']=$message;
    $conn->close();
}
    }

?>