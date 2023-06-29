<?php 
include('./dbConnection.php');
session_start();
if(!isset($_SESSION['stuLogEmail'])) {
 echo "<script> location.href='loginorsignup.php'; </script>";
} else { 
 
  $co_id = $_POST['co_id'];
  $stu_email = $_SESSION['stuLogEmail'];
  $interview_id = $_SESSION['interview_id'];
  
  $sql = "INSERT INTO intervieworder(co_id, stu_email, interview_id) VALUES ('$co_id', '$stu_email', '$interview_id')";
   if($conn->query($sql) == TRUE){
    echo "Redirecting to My Profile....";
    echo "<script> setTimeout(() => {
     window.location.href = './Student/myinterview.php';
   }, 0); </script>";
   };
 
}
?>