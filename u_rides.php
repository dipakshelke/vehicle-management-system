<?php
	session_start();
	$user = $_SESSION['login_user'];
	 $dest=NULL;
	 $v_type=null;
	$v_pin=null;
   include 'config.php';
?>
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
	<li><a  href="u_dash.php">Next Ride</a></li>
	<li><a  href="index.php">Home</a></li>

<?php 
	include 'config.php';
	$result = mysqli_query($conn,"SELECT u_id,u_name FROM user where u_mob='$user'");
	while($row = mysqli_fetch_array($result))
	{
		echo "<h2 style ='font:12px;color:white;margin-left:350px;float:left;'>welcome  " . $row['u_name']  ."   id: "  . $row['u_id'] ."</h1>";
		if( $row['u_id'])
			{
			$user_id=$row['u_name'];
			$u_id=$row['u_id'];
			}
	} 
?>
	</ul>
	</div>
</header>

<?php
	
/*************************requested***********/
echo"<div class='panel' style='margin-top:30px;'>";
echo"<caption><label class='color'style='font-size:20px;' >$user_id you Requested :  </label></caption>";
 echo " <form name='dash' style='border:none;' Action='#' Method='post'> ";
$test = mysqli_query($conn,"SELECT * FROM requests natural join driver where u_id='$u_id'");
echo "<table border='1'>
<tr>
<th>Driver Name</th>
<th>Vehicle Id</th>
<th>Source 	Area</th>
<th>mobile no</th>
<th>Vehicle Type</th>
<th>hours</th>
<th>Estimated Cost</th>
<th>Date</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_assoc($test))
{
	$did=$row['d_id'];	
echo "<tr>";
echo "<td>" . $row['d_name'] . "</td>";
echo "<td>" . $row['vehicle_id'] . "</td>";
echo "<td>" . $row['source'] . "</td>";
echo "<td>" . $row['d_mob'] . "</td>";
echo "<td>" . $row['v_type'] . "</td>";
echo "<td>" . $row['hours'] . "</td>";
echo "<td>" . $row['est_cost'] . "</</td>";
echo "<td>" . $row['r_date'] . "</td>";
echo "<td>pending</td>";
					}
echo "</tr>";
echo "</table>";
echo"</form>";
?>
<br/>
<br/>
<?php																	/*********************************************display completed rides*****/
			echo"<caption><label class='color'style='font-size:20px;' >Completed Rides :  </label></caption>";
			$check = mysqli_query($conn,"SELECT * FROM history natural join driver where u_id='$u_id'");	
			echo " <form name='u' style='border:none;' Action='user.php' Method='post'> ";
		echo "<table border='1'>
		<tr>
		<th>Driver name</th>
		<th>Source</th>
		<th>Destination</th>
		<th>mobile no</th>
		<th>Vehicle Type</th>
		</tr>"; 
		while($row = mysqli_fetch_assoc($check))
		{
				echo "<tr>";
				echo "<td>" . $row['d_name'] . "</td>";
				echo "<td>" . $row['source'] . "</td>";
				echo "<td>" . $row['destination'] . "</td>";
				echo "<td>" . $row['d_mob'] . "</td>";
				echo "<td>" . $row['v_type'] . "</td>";
		}
				echo "</tr>";
				echo "</table>";		
?>

</body>
</html>

