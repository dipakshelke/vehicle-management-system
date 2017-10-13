<!DOCTYPE html>
<html>
<head>
	<script typ="text/javascript" src="validation.js" >
</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/homepage.css">
<style>
.d_login{
	border:none;
	display:table-cell;
	background:none;
	
}

</style>
</head>
<body >
<header>
<div class="container">
<div class="logo">
<a  href="index.php" style="color:white;font-size:30px;">Tecvehicle</a>
</div>
 <ul>
  <li><a class="active" href="#">Driver</a></li>
  <li><a  href="index.php">Home</a></li>
</ul>
</div>
</header>
<div class="login">
<form action="d_login.php" style="margin-top:100px;"method="post">
  <center><h1 style="color:white;">Driver Login</h1></center>
  <div class="container">
    <label class="color"><b>Username</b></label>
    <input type="text" pattern="[1-9]{1}[0-9]{9}" placeholder="Enter Mobile No."  name="d_mob" required/>
    <label class="color"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="d_password" required/> 
    <button type="submit">Login	</button>
  </div>
</form>
	</div>
 <center><h2 style="color:white;text-size:20px;margin-top:0px;">Driver SignUp</h2></center>
  <div class="signup__container"style="width:500px;overflow-y:scroll;">
  <div class="container__child signup__form">
    <form name="u_form" method="post" action="d_register_server.php" >
      <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="d_name"  placeholder="Enter Username..." required />
      </div>
	  <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input class="form-control" type="text"  name="d_mob" pattern="[1-9]{1}[0-9]{9}" placeholder="Enter 10 digit Mobile No..." required/>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="text"id="d_email" name="d_email"  placeholder="james.bond@gmail.com" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="d_password1" name="d_password1"  placeholder="********" required />
      </div>
      <div class="form-group">
        <label for="Confirm Password">Confirm Password</label>
        <input class="form-control" type="password" id="d_password2" name="d_password2" placeholder="********" required />
		</div>
		<div class="form-group">
		<label for="area"> Area Name</label>
        <span><input type="text" list="area"  name="d_area" class="input" placeholder="Select Area"  required/>
			<datalist id="area">
				<option value="katraj">
				<option value="swargate">
				<option value="shivajinagar">
				<option value="vadgaon">
				<option value="kothrud">
			</datalist></div>
			      <div class="form-group">
			<label for="Vehicle no">vehicle ID</label>
        <input class="form-control" type="text" id="vehicle_id" name="vehicle_id" placeholder="Like MH12 3040" required />
		</div>
		<div class="form-group">
		 <label for="vehicle type">Vehicle </label>
		<input type="text" list="vehicles"  name="v_type" class="input" placeholder="Select Vehicle Type"  required/>
			<datalist id="vehicles">
				<option value="Container">
				<option value="JCB">
				<option value="Crane">
				<option value="Tractor">
				<option value="Pickup">
			</datalist>
			</div>
		<div class="form-group">
        <label for="licence">Licence</label>
        <input class="form-control" type="text" id="licence" name="d_licence" pattern="[A-Z]{2}[0-9]{13}" placeholder="Enter licence no.." required />
		</div>
      </div>
      </div><span><div class="m-t-lg"style="margin-right:700px;">
        <ul class="list-inline">
          <li>
            <input class="btn btn--form" type="submit" value="Register" onclick='Javascript:return validate();'/>
          </li>
          <li>
            <a class="signup__link"style="color:white;" href="index.php">I am already a member</a>
          </li>
        </ul>
      </div><span>
    </form>  
  </div>

  
 <script >
function validate() {

    var email = document.getElementById('d_email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
    var a = document.getElementById("d_password1").value;
	var b = document.getElementById("d_password2").value;
     if (a!=b) {
          alert("Passwords do no match");
             return false;
            }
}
</script>
</body>
</html>
