<?php
session_start();

	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'lms_db');

	
		 $id=$_POST['txt1'];
		echo "hello sunil";
		$q="select * from lesson where lesson_id=$lesson_id";
		$result=mysqli_query($con,$q);
		$res=mysqli_fetch_array($result); 

	?>
      <div class="card col-md-6">
           <?php $_SESSION['message']=$res['lesson_desc'];
           	
           //echo $res['description'];
            header("location:java_programming.php?lesson_name=".$res['lesson_name']); ?>


      </div>

	
	<?php ?>