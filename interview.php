<?php
  include('./dbConnection.php');
  // Header Include from mainInclude 
  include('./mainInclude/header.php'); 
?>  
    <div class="container-fluid bg-dark"> <!-- Start interview Page Banner -->
      <div class="row">
        <img src="./image/interviewbanner.jpg" alt="interview" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;"/>
      </div> 
    </div> <!-- End interview Page Banner -->

    <div class="container mt-5"> <!-- Start All interview -->
      <h1 class="text-center">All interview</h1>
      <div class="row mt-4"> <!-- Start All interview Row -->
      <?php
          $sql = "SELECT * FROM interview";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              $interview_id = $row['interview_id'];
              echo ' 
                <div class="col-sm-4 mb-4">
                  <a href="interviewdetails.php?interview_id='.$interview_id.'" class="btn" style="text-align: left; padding:0px;"><div class="card">
                    <img src="'.str_replace('..', '.', $row['interview_img']).'" class="card-img-top" alt="java" />
                    <div class="card-body">
                      <h5 class="card-title">'.$row['interview_name'].'</h5>
                      <p class="card-text">'.$row['interview_desc'].'</p>
                    </div>
                    <div class="card-footer">
                       <a class="btn btn-primary text-white font-weight-bolder float-right" href="./checkout.php?interview_id$interview_id='.$interview_id.'">Enroll</a>
                    </div>
                  </div> </a>
                </div>
              ';
            }
          }
        ?> 
        </div><!-- End All interview
   Row -->   
      </div><!-- End All interview -->   
     
<?php 
  // Contact Us
  include('./contact.php'); 
?> 

<?php 
  // Footer Include from mainInclude 
  include('./mainInclude/footer.php'); 
?>  