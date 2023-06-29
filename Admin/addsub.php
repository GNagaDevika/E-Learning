<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Add interview');
define('PAGE', 'interviews');
include('./adminInclude/header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
 if(isset($_REQUEST['interviewSubmitBtn'])){
  // Checking for Empty Fields
  if(($_REQUEST['interview_name'] == "") || ($_REQUEST['interview_desc'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   // Assigning User Values to Variable
   $interview_name = $_REQUEST['interview_name'];
   $interview_desc = $_REQUEST['interview_desc'];
   
   $interview_image = $_FILES['interview_img']['name']; 
   $interview_image_temp = $_FILES['interview_img']['tmp_name'];
   $img_folder = '../image/interview_img/'. $interview_image; 
   move_uploaded_file($interview_image_temp, $img_folder);
    $sql = "INSERT INTO interview (interview_name, interview_desc, interview_img) VALUES ('$interview_name', '$interview_desc', '$img_folder')";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> interview Added Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add interview </div>';
    }
  }
  }
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Add New interview</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="interview_name">interview Name</label>
      <input type="text" class="form-control" id="interview_name" name="interview_name">
    </div>
    <div class="form-group">
      <label for="interview_desc">interview Description</label>
      <textarea class="form-control" id="interview_desc" name="interview_desc" row=2></textarea>
    </div>
    
   
    <div class="form-group">
      <label for="interview_img">interview Image</label>
      <input type="file" class="form-control-file" id="interview_img" name="interview_img">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="interviewSubmitBtn" name="interviewSubmitBtn">Submit</button>
      <a href="interviews.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
</div>  <!-- div Row close from header -->
</div>  <!-- div Conatiner-fluid close from header -->

<?php
include('./adminInclude/footer.php'); 
?>