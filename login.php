<?php
   include("config.php");
   session_start();
   $count = -1;

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
       
	  // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
	
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT username FROM user WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, query must return just 1 row
		
      if($count == 1) {
        $_SESSION['user'] = $username;
        $_SESSION['loggedin'] = true;
        header('Location: homepage.php');    
      }
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Destination Explorer | Login</title>
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
<?php
	if(isset($_GET['success']) && isset($_GET['message'])) {
		$success = $_GET['success'];
		$message = $_GET['message'];
		echo "<h3>$success</h3><br>";
		echo "<h3>$message</h3>";		
	}
?>
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
	  <?php
		 if ($count != 1 && $count != -1){
         $error = "<h5>Error: Your Login Name or Password is invalid</h5>";
		 echo $error.'.';
		}
	  ?>
        <form id="loginform" method="post" action=" ">
			<label>User Name: </label>
              <input type="text" name="username" maxlength="20" placeholder="Username" required >
              <br class="clear">
			
			<label>Password:</label>
              <input type="password" name="password" maxlength="20" placeholder="Password" required >
              <br class="clear">
            
		  <div class="btns">
			<a href="register.php" class="btn">Register</a>
			<div class="none"></div>
			<input type="submit" name="submit" value="Login" class="btn">
			<div class="clear"></div>
		 </div>
          
        </form>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
</body>
</html>