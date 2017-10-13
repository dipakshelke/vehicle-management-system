
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/user.css">
	<link rel="stylesheet" href="css/homepage.css">
<style>
.panel{
	display:block;
	margin-top:200px;
	margin-left:250px;
}
</style>
</head>
<body>
<header>
<div class="container">
	<div class="logo">
		<a  href="index.html" style="color:white;font-size:30px;">Tecvehicle</a>
	</div>
	<ul>
	<li><a href = "logout.php">Sign Out</a></li>	
	<li><a href = "d.php">Drivers</a></li>
	<li><a href = "u.php">Users</a></li>
	
	<li><a  href="index.php">Home</a></li>
	</ul>
	</div>
</header>
<?php		
include 'config.php';															/****************************************users***/
$check = mysqli_query($conn,"SELECT * FROM user");	
$number_of_rows=mysqli_num_rows($check);
echo"<div class='panel' style='margin-top:50px;'>";
 echo " <form name='dash' style='border:none;' Action='#' Method='post'> ";
echo"<caption><label class='color'style='font-size:20px;' >Users :  </label></caption>";
if($number_of_rows>=1){
echo "<table border='1'>
<tr>
<th>user ID</th>
		<th>User Name</th>
		<th>Mobile</th>
		<th>Email</th>
		<th>Password</th>
</tr>";
while($row = mysqli_fetch_assoc($check))
{echo "<tr>";   
				echo "<td>" . $row['u_id'] . "</td>";
				echo "<td>" . $row['u_name'] . "</td>";
				echo "<td>" . $row['u_mob'] . "</td>";
				echo "<td>" . $row['u_email'] . "</td>";
				echo "<td>" . $row['u_password'] . "</td>";
					
echo "</tr>";}
echo "</table>";
}
else
{
	echo'no records ggggggggggggggggggggg';
}

?>

</body>
</html>

