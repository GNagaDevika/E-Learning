<?php 
include('./dbConnection.php');
session_start();
if(!isset($_SESSION['stuLogEmail'])) {
 echo "<script> location.href='loginorsignup.php'; </script>";
} else { 
 
  $co_id = $_POST['co_id'];
  $stu_email = $_SESSION['stuLogEmail'];
  $course_id = $_SESSION['course_id'];
  
  $sql = "INSERT INTO courseorder(co_id, stu_email, course_id) VALUES ('$co_id', '$stu_email', '$course_id')";
   if($conn->query($sql) == TRUE){
    echo "Redirecting to My Profile....";
    echo "<script> setTimeout(() => {
     window.location.href = './Student/myCourse.php';
   }, 0); </script>";
   };
 
}
?>