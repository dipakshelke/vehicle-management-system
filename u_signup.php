<!DOCTYPE html>
<html>
<head>
	<script typ="text/javascript" src="validation.js" >
</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/homepage.css">
<script >

function validate() {

    var email = document.getElementById('u_email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
    var a = document.getElementById("u_password1").value;
	var b = document.getElementById("u_password2").value;
     if (a!=b) {
          alert("Passwords do no match");
             return false;
            }
}
</script>
</head>
<body>
<header>
<div class="container">
<div class="logo">
<a  href="index.html" style="color:white;font-size:30px;">Tecvehicle</a>
</div>
 <ul>
  <li><a  href="d_log.php">Driver</a></li>
  <li><a  href="index.php">Home</a></li>
</ul>
</div>
</header>
 <center><h1 style="color:white">User SignUp</h1></center>
  <div class="signup__container">

  <div class="container__child signup__form">
    <form name="u_form" method="post" action="u_register_server.php" >
      <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" name="u_name"  placeholder="Enter Username..." required />
      </div>
	  <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input class="form-control" type="text"  name="u_mob" pattern="[1-9]{1}[0-9]{9}" placeholder="Enter 10 digit Mobile No..." required/>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="text"id="u_email" name="u_email"  placeholder="james.bond@gmail.com" required />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="u_password1" name="u_password1"  placeholder="********" required />
      </div>
      <div class="form-group">
        <label for="Confirm Password">Repeat Password</label>
        <input class="form-control" type="password" id="u_password2" name="u_password2" placeholder="********" required />
      </div>
      <div class="m-t-lg">
        <ul class="list-inline">
          <li>
            <input class="btn btn--form" type="submit" value="Register" onclick='Javascript:return validate();'/>
          </li>
          <li>
            <a class="signup__link" href="index.php">I am already a member</a>
          </li>
        </ul>
      </div>
    </form>  
  </div>
</div>
  
  
</body>
</html>
