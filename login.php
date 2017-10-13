<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="validation.js" >
</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/homepage.css">
<style>

</style>
</head>
<body>
<header>
<div class="container">
<div class="logo">
<a  href="index.php" style="color:white;font-size:30px;">Tecvehicle</a>
</div>
 <ul>
  <li><a  href="admin.php">Admin</a></li>
  <li><a  href="d_log.php">Driver</a></li>
  <li><a  href="#" class="active">Home</a></li>
  
</ul>
</div>
</header>
<div class="slides">
 <div class="mySlides"> <img  src="images/tractor.jpg" style="width:100%;"><center><label class="color"style="font-size:25px;">Search For Tractor's</label></center></div>
 <div class="mySlides"><img src="images/truck.jpg" style="width:100%"><center><label class="color"style="font-size:25px;">Container's</label></center></div>
 <div class="mySlides"> <img  src="images/jcb.jpg" style="width:100%"><center><label class="color"style="font-size:25px;">JCB's</label></center></div>
    <div class="mySlides"><img src="images/crane.jpg" style="width:100%"><center><label class="color"style="font-size:25px;">Crane's</label></center></div>
</div>
<div class="login">
<form action="admin.php" method="post">
  <center><h1 style="color:white">User Login</h1></center>
  <div class="container">
    <label class="color"><b>Username</b></label>
    <input type="text" pattern="[1-9]{1}[0-9]{9}" placeholder="Enter Mobile No." value="admin"name="u_name" required>

    <label class="color"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="u_password" value="admin" required>
        
    <button type="submit">Login	</button>
    <input type="hidden" checked="checked"> <span  style="display:none;color:white;">Remember me <a href="#"  style="display:none;float:right;color:#16E3E9;">Forgot password?</a></span>	
  </div>
</form>
<script>
var myIndex = 0;
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>
