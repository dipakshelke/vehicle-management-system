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
	<li><a  href="d_rides.php">Completed Rides</a></li>
	<li><a  href="index.php">Home</a></li>

	

	<?php 
			
			$result = mysqli_query($conn,"SELECT d_id,d_name FROM driver where d_mob='$user'");
			while($row = mysqli_fetch_array($result))
			{
			echo "<h2 style ='font:12px;color:white;margin-left:600px;margin-top:14px;float:left;'>welcome  " . $row['d_name']  ."!!</h1>";
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
<?php													
			
			$src = "SELECT * from driver where d_mob= '".$user."' ";
			$data=mysqli_query($conn,$src);
			while($srcloc = mysqli_fetch_assoc($data)) 
			{
		
			$drisrc=$srcloc['d_area'];  
			$d_id=$srcloc['d_id'];
			$d_name=$srcloc['d_name'];  
			
			$d_mob=$srcloc['d_mob'];  
			$d_email=$srcloc['d_email'];  
			$d_password=$srcloc['d_password'];  
			$d_licence=$srcloc['d_licence']; 
			$v_id=$srcloc['vehicle_id'];
			$v_type=$srcloc['v_type'];
			
			}
			
			echo " <form name='u' style='border:none;' Action='d_dash.php' Method='post'> ";
			echo"<caption><h2 style='color:white;'>Requests:</h2	></caption>";
		echo "<table border='1'>
		<tr>
		<th>User name</th>
		<th>User mobile</th>
		<th>Source</th>
		<th>Destination</th>
		<th>Vehicle Type</th>
		<th>Date</th>
		<th>Action</th>
		</tr>"; 
		
				
  if (isset($_POST['accept'])){
		$rid=$_POST['rid'];
		$uid=$_POST['uid'];
		
		$dest=$_POST['dest'];
		$source=$_POST['source'];
		$estcost=$_POST['estcost'];	
		$q="delete from requests  where req_id=".$rid." ";
		$data=mysqli_query($conn,$q);
	
		if($data){
			$q="INSERT INTO rides(req_id,u_id,d_id,source,destination,est_cost,status) VALUES (".$rid.",".$uid.",".$d_id.",'".$source."','".$dest."',".$estcost.",'IN PROGRESS')";	
			
			$mata=mysqli_query($conn,$q);
			if($mata)
				{
				print "Inserted Succesfully";
				}
				else{
					echo "Unable to insert..";
				}
		}
		
		
	}
	$query="select d_id from rides where d_id='".$d_id."' ";
	
	$data=mysqli_query($conn,$query);
	
	$rowcount=mysqli_num_rows($data);
	
	if($rowcount>=1)
	{
		$flag=1;
	}
	else if($rowcount == 0)
	{
		$flag=0;
	}
	
	echo"<form name='AcceptForm' method ='post' Action='d_dash.php'>";
		$check=mysqli_query($conn,"SELECT * from requests natural join user");
		while($row = mysqli_fetch_assoc($check))
		{
						if(strcmp($drisrc,$row['source'])==0)
						{
							if(strcmp($v_type,$row['v_type'])==0)
							{
						
							echo "<tr>";
							echo "<td>" . $row['u_name'] . "</td>";
							echo "<td>" . $row['u_mob'] . "</td>";
							echo "<td>" . $row['source'] . "</td>";
							echo "<td>" . $row['destination'] . "</td>";
							echo "<td>" . $row['v_type'] . "</td>";
							echo "<td>" . $row['r_date'] . "</td>";
							echo "<input type='hidden' name='rid' value='".$row['req_id']."'>
							<input type='hidden' name='uid' value='".$row['u_id']."'>
							<input type='hidden' name='dest' value='".$row['destination']."'>
							<input type='hidden' name='source' value='".$row['source']."'>
							<input type='hidden' name='estcost' value='".$row['est_cost']."'>";
							
							if($flag == 1)
							{
								echo "<td>driver is busy...</td>";
							}
							else if( $row['status'] == 'pending')
							{
								echo "<td> <input type='submit' name='accept' value='".$row['req_id']."'></td>";
							}
							echo "</tr>";
							}
						}
		}
		echo"
		</form>
		</table>
		</tbody>
		</table>";

			echo" <form name='finishForm' style='border:none;'Action='d_dash.php' method='post'>";
			echo"<caption><h2 style='color:white;'>Rides in progress:</h2></caption>";
		echo"<table class='table table-bordered'>
		<thead>
		<tr>
        <th>Reg Id</th>
        <th>Source</th>
        <th>Destination </th>
        <th>cost </th>
		<th>Status</th>
		</tr>";
		
		
    	
		$q1 = mysqli_query($conn,"SELECT * from rides where d_id='".$d_id."' ");
		while($res = mysqli_fetch_assoc($q1)) 
		{
			
		print "
		<tr>
        <th>".$res['req_id']."</th>
        <th>".$res['source']."</th>
        <th>".$res['destination']."</th>
        <th>".$res['est_cost']."</th>
        <th><input type='submit' name='Finish' value='finish' ></th>
		</tr>";
		
		if (isset($_POST['Finish']))
		{
	
			$query="update rides set status='Finish' where d_id='".$d_id."'";
			$data=mysqli_query($conn,$query);
			if($data)
			{
				$q2 = mysqli_query($conn,"SELECT * from rides where d_id='".$d_id."'");
				while($data = mysqli_fetch_assoc($q2)) 
				{
		
				$bookid=$data['req_id'];  
				$uid=$data['u_id'];  
				$did=$data['d_id'];  
				$source=$data['source'];  
				$dest=$data['destination'];  
				$status=$data['status'];  
				$cost=$data['est_cost'];
				}
				
				$query="delete from rides  where d_id=".$did." ";
				$data=mysqli_query($conn,$query);
		
				if($data)
				{
					$q="INSERT INTO history(req_id,u_id,d_id,source,destination,est_cost) VALUES (".$bookid.",".$uid.",".$did.",'".$source."','".$dest."',".$cost.")";	
					$mata=mysqli_query($conn,$q);
					if($mata)
					{
						print "Inserted Succesfully";
					}
				} 
				
				
			}
			else
			{
				echo "error...";
			}
			
		
		echo"</form>";
		}
		}
		
			
?>
