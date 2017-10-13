<?php

	include 'config.php';
	
    $username =$_POST['u_name'];
	$password =$_POST['u_password'];
    $sql = "SELECT u_id FROM user WHERE u_mob = '$username' and u_password = '$password'";
    $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);
      if($count == 1) {
				session_start();
		       $_SESSION['login_user'] = $username;
			echo "<script>
			alert('Login successfully...');
			window.location.href='/mini_project/u_dash.php';
			</script>";
      }else {
         
		
	echo "<script>
			alert('Please enter correct username and password...');
			window.location.href='/mini_project/index.php';
			</script>";
		
			
      }

   
   $conn->close();
?>
s