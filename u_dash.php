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
	<li><a  href="u_rides.php">Rides</a></li>
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
<div class="userform">
	<form id="u_form" action="#" method="POST"> <!--action="/action_page.php"-->
		<label class="color"style="font-size:20px;">Vehicle : </label>
		<input type="text" list="vehicles"  name="v_type" class="input" placeholder="Select Vehicle Type"  required/>
			<datalist id="vehicles">
				<option value="Container">
				<option value="JCB">
				<option value="Crane">
				<option value="Tractor">
				<option value="Pickup">
			</datalist>
		<label class="color"style="font-size:20px;">Enter Area Code : </label>
		<input type="text" list="area"  name="area" class="input" placeholder="Select area"  required/>
			<datalist id="area">
				<option value="katraj">
				<option value="swargate">
				<option value="shivajinagar">
				<option value="vadgaon">
				<option value="kothrud">
			</datalist>
		<button type="submit" name="search"  onclick="myFunction()">Search</button>
	</form>
</div>
<?php
	
	if (isset($_POST['search'])){	
	 $v_type=$_POST['v_type'];
	$area=$_POST['area'];
	
echo"<div class='panel'>";
echo"<caption><label class='color'style='font-size:20px;' >Results For: $v_type </label></caption>";
 
 echo " <form name='dash' style='border:none;' Action='#' Method='post'> ";
$test = mysqli_query($conn,"SELECT * FROM driver where v_type='$v_type' and d_area='$area'");
$number_of_rows=mysqli_num_rows($test);
if($number_of_rows >= 1){
			echo"<caption><label class='color' ><br><br>Enter Desination area: </label></caption>";
				echo"<input type=text list='des'  name='des' class='input' placeholder='Select Area' style='width:300px;' required/>
				<datalist id='des'>
				<option value='katraj'>
				<option value='swargate'>
				<option value='shivajinagar'>
				<option value='vadgaon'>
				<option value='kothrud'>
			</datalist></input>";
			echo"<span><caption><label class='color' ><br><br>Enter Hours: </label></caption>";
			echo"<input type=text  name='hours' class='input' placeholder='Enter hours' style='width:300px;' required/></span>";
echo "<table border='1'>
<tr>
<th>Driver Id</th>
<th>Vehicle Id</th>
<th>Source 	Area</th>
<th>mobile no</th>
<th>Vehicle Type</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_assoc($test))
{
	$did=$row['d_id'];	
echo "<tr>";
echo "<td>" . $row['d_id'] . "</td>";
echo "<td>" . $row['vehicle_id'] . "</td>";
echo "<td>" . $row['d_area'] . "</td>";
echo "<td>" . $row['d_mob'] . "</td>";
echo "<td>" . $row['v_type'] . "</td>";
if( $row['vehicle_id'] == $row['vehicle_id'])
						echo "<td> <input type='submit' name='submit' value=$row[vehicle_id]></td>";
					else
							echo "<td>Not Available</td>";
					}
echo "</tr>";
echo "</table>";
	echo"</form>";}
	else{ echo"<h3 style='color:white;margin-left:400px;font-size:20px;'>No Results Found...!</h1>";}
	}
?>

<?php																	/*********************************************display requested*****/
if (isset($_POST['submit'])){
	 $dest=$_POST['des'];
	 $hours=$_POST['hours'];
	 $vid=$_POST['submit'];
			$check = mysqli_query($conn,"SELECT * FROM driver where vehicle_id='$vid'");	
			
			echo " <form name='u' style='border:none;' Action='user.php' Method='post'> ";
			echo"<caption><label class='color'style='font-size:20px;' ><br><br>Requested: </label></caption>";
		echo "<table border='1'>
		<tr>
		<th>Driver id</th>
		<th>Vehicle id</th>
		<th>Source</th>
		<th>Destination</th>
		<th>mobile no</th>
		<th>Vehicle Type</th>
		
		<th>Action</th>
		</tr>"; 
		while($row = mysqli_fetch_assoc($check))
		{
				$drid=$row['d_id'];
				$pin=$row['d_area'];
				$source=$row['d_area'];
				$v_type=$row['v_type'];
				echo "<tr>";
				echo "<td>" . $row['d_id'] . "</td>";
				echo "<td>" . $row['vehicle_id'] . "</td>";
				echo "<td>" . $row['d_area'] . "</td>";
				echo "<td>" . $dest . "</td>";
				echo "<td>" . $row['d_mob'] . "</td>";
				echo "<td>" . $row['v_type'] . "</td>";
											echo "<td> Requested </td>";									
				$querry="INSERT INTO requests(u_id,d_id,source,destination,v_type,hours) 
						 VALUES('$u_id','$drid','$source','$dest','$v_type','$hours')";		
				$success = $conn->query($querry);
						if($success)
						{
							echo "<script>
							alert('requested successfully...');
						window.location.href='/mini_project/u_rides.php';
						</script>";
						}
						else{
							echo "<script>
							alert('not requested...');
						window.location.href='/mini_project/u_rides.php';
						</script>";
						}
		}
				echo "</tr>";
		echo "</table>";
		}
				
?>

</body>
</html>

