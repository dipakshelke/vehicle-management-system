<?php
$date=null;
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
	<li><a href = "d.php">Drivers</a></li>
	<li><a href = "u.php">Users</a></li>
	
	<li><a  href="index.php">Home</a></li>
	

<?php 
		echo "<h2 style ='font:12px;color:white;margin-left:700px;margin-top:14px;float:left;'>welcome  Admin</h1>";
	
?>
	</ul>
	</div>
</header>
<div class="userform">
	<form id="u_form" action="#" method="POST"> <!--action="/action_page.php"-->
		<label class="color"style="font-size:20px;">From date : </label>
		<input type="date"  class='input' name='fdate' placeholder='yyyy/mm/dd' style='width:300px;' required/>
		<label class="color"style="font-size:20px;">From date : </label>
		<input type="date"  class='input' name='todate' placeholder='yyyy/mm/dd' style='width:300px;' required/>

		<button type="submit" name="search"  onclick="myFunction()">Search</button>
	</form>
</div>

<?php		
include 'config.php';															/*********************************************display requested*****/
if(isset($_POST['search'])){
	$fdate=$_POST['fdate'];
	$todate=$_POST['todate'];
$check = mysqli_query($conn,"SELECT * FROM history natural join user where date_time between '$fdate' and '$todate'");	
$number_of_rows=mysqli_num_rows($check);
echo"<div class='panel' style='margin-top:250px;'>";
 echo " <form name='dash' style='border:none;' Action='#' Method='post'> ";
echo"<caption><label class='color'style='font-size:20px;' >Completed Rides :  </label></caption>";
if($number_of_rows>=1){
echo "<table border='1'>
<tr>
<th>User ID</th>
<th>Driver Id</th>
<th>Driver name</th>
		<th>Source</th>
		<th>Destination</th>
		<th>mobile no</th>
		<th>Cost</th>
		<th>Date</th>
</tr>";
while($row = mysqli_fetch_assoc($check))
{echo "<tr>";
				echo "<td>" . $row['u_id'] . "</td>";
				echo "<td>" . $row['d_id'] . "</td>";
				echo "<td>" . $row['u_name'] . "</td>";
				echo "<td>" . $row['source'] . "</td>";
				echo "<td>" . $row['destination'] . "</td>";
				echo "<td>" . $row['u_mob'] . "</td>";
				echo "<td>" . $row['est_cost'] . "</td>";
				echo "<td>" . $row['date_time'] . "</td>";
					}
echo "</tr>";
echo "</table>";

$dd="SELECT SUM(est_cost) AS cost FROM history where date_time between '$fdate' and '$todate'";
$result = $conn->query($dd);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<span style='color:white;margin-left:510px;font-size:20px;'>Total cost is : " . $row['cost']."</span>";
    }
} else {
    echo "0 results";
}
}
else{
	echo "No results found..!";
}
echo"</form>";	
}

?>

</body>
</html>

