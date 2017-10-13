<?php
   include 'config.php';
$uname =$_POST['u_name'];
$mob =$_POST['u_mob'];
$email =$_POST['u_email'];
$password1=$_POST['u_password1'];
$password2=$_POST['u_password2'];
$querry="INSERT INTO user(u_name,u_mob,u_email,u_password) 
VALUES('".$uname."','".$mob."','".$email."','".$password1."')";
echo $querry;
$success = $conn->query($querry);
if($success)
{
	echo "<script>
	alert('registered successfully...');
window.location.href='/mini_project/index.php';
</script>";
	/*
print '<script type="text/javascript">';
window.location.href='admin/ahm/panel';
print 'alert("registered successfully...")';
print '</script>';*/
}
echo "Regisered Successfully...<a href=\"index.php\">Click here to login</a>";
$conn->close();

?>


