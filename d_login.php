<?php

	include 'config.php';
	
    $username =$_POST['d_mob'];
	$password =$_POST['d_password'];
    $sql = "SELECT d_id FROM driver WHERE d_mob = '$username' and d_password = '$password'";
    $result = mysqli_query($conn,$sql);

      $count = mysqli_num_rows($result);
      if($count == 1) {
		  session_start();
               $result=mysqli_query($conn,$sql);
		       $_SESSION['login_user'] = $username;
         echo "<script>
			alert('Login successfully...');
			window.location.href='/mini_project/d_dash.php';
			</script>";
      }else {
         
	echo "<script>
			alert('Please enter correct username and password...');
		//	window.location.href='/mini_project/index.php';
			</script>";
		
			
      }

   
   $conn->close();
?>
