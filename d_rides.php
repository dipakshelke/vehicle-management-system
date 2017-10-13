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
	<li><a  href="d_dash.php">Completed Rides</a></li>
	<li><a  href="index.php">Home</a></li>

	

	<?php 
			
			$result = mysqli_query($conn,"SELECT d_id,d_name FROM driver where d_mob='$user'");
			while($row = mysqli_fetch_array($result))
			{
			echo "<h2 style ='font:12px;color:white;margin-left:350px;float:left;'>welcome  " . $row['d_name']  ."   id: "  . $row['d_id'] ."</h1>";
				if( $row['d_id'])
					{
					$driver_name=$row['d_name'];
					$d_id=$row['d_id'];
					}
			} 
	?>
	</ul>
	</div>
</header>
</body>
</html>
	<?php																	/*********************************************display completed rides*****/
$check = mysqli_query($conn,"SELECT * FROM history natural join user where d_id='$d_id'");	
$number_of_rows=mysqli_num_rows($check);
echo"<div class='panel' style='margin-top:30px;'>";
 echo " <form name='dash' style='border:none;' Action='#' Method='post'> ";
echo"<caption><label class='color'style='font-size:20px;' >Completed Rides :  </label></caption>";
if($number_of_rows>=1){
echo "<table border='1'>
<tr>
<th>Driver name</th>
		<th>Source</th>
		<th>Destination</th>
		<th>mobile no</th>
		<th>Cost</th>
</tr>";
while($row = mysqli_fetch_assoc($check))
{echo "<tr>";
				echo "<td>" . $row['u_name'] . "</td>";
				echo "<td>" . $row['source'] . "</td>";
				echo "<td>" . $row['destination'] . "</td>";
				echo "<td>" . $row['u_mob'] . "</td>";
				echo "<td>" . $row['est_cost'] . "</td>";
					}
echo "</tr>";
echo "</table>";}
else{
	echo "No results found..!";
}
echo"</form>";				
?>