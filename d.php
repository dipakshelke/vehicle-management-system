
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
$check = mysqli_query($conn,"SELECT * FROM driver");	
$number_of_rows=mysqli_num_rows($check);
echo"<div class='panel' style='margin-top:50px;'>";
 echo " <form name='dash' style='border:none;' Action='#' Method='post'> ";
echo"<caption><label class='color'style='font-size:20px;' >Drivers :  </label></caption>";
if($number_of_rows>=1){
echo "<table border='1'>
<tr>
<th>Driver ID</th>
		<th>Name</th>
		<th>Mobile No</th>
		<th>Email</th>
		<th>Password</th>
		<th>Area</th>
		<th>Licence No.</th>
		<th>Vehicle Type</th>
		<th>Vehicle ID</th>
		<th>Delete Driver</th>
			
</tr>";
while($row = mysqli_fetch_assoc($check))
{echo "<tr>";   
				echo "<td>" . $row['d_id'] . "</td>";
				echo "<td>" . $row['d_name'] . "</td>";
				echo "<td>" . $row['d_mob'] . "</td>";
				echo "<td>" . $row['d_email'] . "</td>";
				echo "<td>" . $row['d_password'] . "</td>";
				echo "<td>" . $row['d_area'] . "</td>";
				echo "<td>" . $row['d_licence'] . "</td>";
				echo "<td>" . $row['v_type'] . "</td>";
				echo "<td>" . $row['vehicle_id'] . "</td>";
				if( $row['d_id'])
						echo "<td> <input type='submit' name='submit' value=$row[vehicle_id]></td>";
					else
							echo "<td>Not Available</td>";
					
								
echo "</tr>";}
echo "</table>";
}
else
{
	echo'No Records Found..';
}
?>
</body>
</html>
<?php

	if (isset($_POST['submit'])){	
	 $d_id=$_POST['submit'];

	$q="delete from driver where vehicle_id='$d_id'";
	if($conn->query($q) === TRUE) {
    echo "<p style='font-size:20px;margin-top:5px;color:white;'>Record $d_id deleted successfully...!</p>";
	} else {
    echo "Error deleting record: " . $conn->error;
}

}
?>
