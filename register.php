<?php
   include("config.php");

   $password = null;
   $email = null;
   $cpassword = null;
   $cemail = null;
   $usernameerror = false;
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       
       
    $username = $_POST["username"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $email=$_POST["email"];
    $cemail=$_POST["cemail"];
    $state=$_POST["state"];
    
    if ($password === $cpassword && $email == $cemail){
        // Create connection
        $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "INSERT INTO user (fname,lname,username ,password,email,state) 
        VALUES ('$fname', '$lname', '$username', '$password', '$email', '$state')";


        if ($conn->query($sql) === TRUE) {
            header("Location: login.php?success=%20Congratulations!%20You%20have%20been%20successfully%20registered%20to%20Destnation%20Explorer! & message=%20Login%20to%20find%20your%20destinations.");    
        }
		else {
			$usernameerror = true;
		}
    }

   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Destination Explorer | User Registration</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/slider.css">
<script src="js/jquery.js"></script>
<script src="js/jquery.jqtransform.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.ui.totop.js"></script>

<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
<script type="text/javascript" src="js/myScript.js"></script>
<script>
$(window).load(function () {
    $('.slider')._TMS({
        show: 0,
        pauseOnHover: false,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 800,
        preset: 'random',
        pagination: false, //'.pagination',true,'<ul></ul>'
        pagNums: false,
        slideshow: 8000,
        numStatus: false,
        banners: true,
        waitBannerAnimation: false,
        progressBar: false
    });
    $("#tabs").tabs();
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
</script>
</head>
<body>
<header>
  <div class="container_12">
    <div class="grid_12">
      <h1><a href="index.html"><img src="images/Picture1.png" alt="Image cannot be loaded"></a></h1>
      <div class="clear"></div>
    </div>
    <div class="menu_block">
      <nav>
        <ul class="sf-menu">
		  <li>.</li>
          <li>.</li>
          <li>.</li>         
          
          <li>.</li>
          <li>.</li>
        </ul>
      </nav>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</header>
<div class="main">
  <div class="content">
    <div class="container_12">
      <div class="grid_8"> 
        <div class="slider-relative">
        <div class="slider-block">
          <div class="slider"> <a href="#" class="prev"></a><a href="#" class="next"></a>
            <ul class="items">
              <li><img src="images/slide.jpg" alt="Image cannot be loaded">
                <div class="banner">
                  <div>THERE ARE PLENTY OF PLACES</div>
                  <br>
                  <span> that are worth seeing</span> </div>
              </li>
              <li><img src="images/slide1.jpg" alt="Image cannot be loaded"></li>
              <li><img src="images/slide2.jpg" alt="Image cannot be loaded"></li>
              <li><img src="images/slide3.jpg" alt="Image cannot be loaded"></li>
            </ul>
          </div>
        </div>
      </div>
      </div>
      <div class="grid_3">
        <form id="loginform" method="post" action=" ">
		<br>
		<?php
			if ($usernameerror == true) {
				echo "<h5>Error: The username already exists. Please try another user name.</h5>";
        }
		?>
			<label>First Name: </label>
              <input type="text" name="fname" maxlength="20" placeholder="FirstName" required>
              <br class="clear">
			<label>Last Name: </label>
              <input type="text" name="lname" maxlength="20" placeholder="Lastname" required>
              <br class="clear">
			<label>User Name: </label>
              <input type="text" name="username" maxlength="20" placeholder="Username" required>
              <br class="clear">
			  <?php
				if ($password != null && $password !== $cpassword) {
				echo "<h5>Error: Confirm password should match the password.<br></h5>";
				}
			  ?>
			<label>Password: </label>
              <input type="password" name="password" maxlength="20" placeholder="Password" required>
              <br class="clear">
			<label>Confirm Password: </label>
              <input type="password" name="cpassword" maxlength="20" placeholder="Confirm Password" required>
              <br class="clear">
			  <?php
				if ($email != null && $email != $cemail) {
					echo "<h5>Error: Confirm email should match the email.<br></h5>";
				}
			  ?>
            <label>Email ID: </label>
              <input type="text" name="email" maxlength="20" placeholder="Email ID" required>
              <br class="clear">
			<label>Confirm Email ID: </label>
              <input type="text" name="cemail" maxlength="20" placeholder="Confirm email ID" required>
              <br class="clear">
			<label>State: </label>
              <input type="text" name="state" id="states" maxlength="20" placeholder="State" required>
              <br class="clear">
		  <div class="btns">
			<input type="submit" name="submit" value="Register" class="btn">
		 </div>
          
        </form>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
</body>
</html>