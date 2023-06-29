<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'My interview');
define('PAGE', 'myinterview');
include('./stuInclude/header.php'); 
include_once('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $stuLogEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>

 <div class="container mt-5 ml-2">
  <div class="row">
   <div class="jumbotron">
    <h4 class="text-center">All interviews</h4>
    <?php 
   if(isset($stuLogEmail)){
    $sql = "SELECT  c.interview_id, c.interview_name, c.interview_desc, c.interview_img FROM intervieworder AS co JOIN interview AS c ON c.interview_id = co.interview_id WHERE co.stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
     while($row = $result->fetch_assoc()){ ?>
      <div class="bg-light mb-3">
        <h5 class="card-header"><?php echo $row['interview_name']; ?></h5>
          <div class="row">
          
              <div class="col-sm-3">
                <img src="<?php echo $row['interview_img']; ?>" class="card-img-top
                mt-4" alt="pic">
              </div>
              <div class="col-sm-6 mb-3">
                <div class="card-body">
                  <p class="card-title"><?php echo $row['interview_desc']; ?></p>
                  
                  <a href="watchquestion.php?interview_id=<?php echo $row['interview_id'] ?>" class="btn btn-primary mt-5 float-right">Watch interview</a>
                </div>
              </div>
          
          </div>
          
      </div> 
    <?php
     }
    }
   }
  
    ?>
    <hr/>
   </div>
  </div>
 </div>

 </div> <!-- Close Row Div from header file -->
 <?php
include('./stuInclude/footer.php'); 
?>