<?php
   include 'config.php';
 
$uname =$_POST['d_name'];
$mob =$_POST['d_mob'];
$email =$_POST['d_email'];
$password1=$_POST['d_password1'];
$password2=$_POST['d_password2'];
$area=$_POST['d_area'];
$v_id=$_POST['vehicle_id'];
$v_type=$_POST['v_type'];
$licence=$_POST['d_licence'];

$querry="INSERT INTO driver(d_name,d_mob,d_email,d_password,d_area,vehicle_id,v_type,d_licence) 
VALUES('".$uname."','".$mob."','".$email."','".$password1."','".$area."','".$v_id."','".$v_type."','".$licence."')";
$success = $conn->query($querry);
if($success)
{
	echo "<script>
	alert('registered successfully...');
window.location.href='/mini_project/d_log.php';
</script>";
}
$conn->close();
?>


