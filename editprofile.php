<?php
   include("config.php");
   session_start();
   $count = -1;
   $username = $_SESSION['user'];
   $success = null;
   $passworderror = null;
   $newpassworderror = null;
   $email = null;
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
	  // username and email sent from form 
	  //$email = mysqli_real_escape_string($conn,$_POST['email']);
	  $currentpassword = $_POST['currentpassword'];
	  $newpassword = $_POST['newpassword'];
	  $cnewpassword = $_POST['cnewpassword'];
	  
	  if ($newpassword === $cnewpassword){
	  
		  $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		  // Check connection
		  if ($conn->connect_error) {
		   	  die("Connection failed: " . $conn->connect_error);
		  } 
		  
		  $fetch_password_query = "SELECT password, email FROM user WHERE username = '$username'";
		  $result = mysqli_query($conn,$fetch_password_query);
		  
		  $count = mysqli_num_rows($result);
		  
		  // If result matched $username and $password, query must return just 1 row since Username is primary key.
			
		  if($count == 1) {
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$password = $row['password'];
			$email = $row['email'];
			if ($currentpassword == $password) {
				$update_password_query = "UPDATE user SET password = '$newpassword' WHERE username = '$username'";
				$updateresult = mysqli_query($conn,$update_password_query);
				$success = "Password changed successfully!";
			}
			if ($currentpassword != $password) {
				$passworderror = "Error: The current password you entered is incorrect. Please try again.";
			}    
		  }
	  }
	  if ($newpassword !== $cnewpassword) {
			$newpassworderror = "Error: Confirm new password should match the new password.";
	  }
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Destination Explorer | Edit Profile</title>
<meta charset="utf-8">
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

<body class="page1">
<header>
  <div class="container_12">
    <div class="grid_12">
      <h1><a href="homepage.php"><img src="images/Picture1.png" alt="Image cannot be loaded"></a></h1>
      <div class="clear"></div>
    </div>
    <div class="menu_block">
      <nav>
        <ul class="sf-menu">

		  <li>.</li>
		  <li>.</li>
          <li><a>Welcome <?php echo $_SESSION['user']; ?></a></li>

          <li><a href="editprofile.html">Edit Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
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
      <div class="grid_4">
        <h3>Edit Profile</h3>
		<?php 
			if ($success != null) {
				echo "<h4>$success</h4>";
			}
		?>
		<form id="loginform" method="post" action=" ">

              <label class = "text1"> User Name: <?php echo $_SESSION['user']; ?></label>
			  <br class="clear">
			  <br class="clear">
			  <label class = "text1"> Email ID: <?php if ($email != null) {echo $email;} ?></label>

			  <br class="clear">
			  <br class="clear">
			  <?php 
				if ($passworderror != null) {
					echo "<h5>$passworderror<br></h5>";
				}
			  ?>
              <label> Password: </label>
              <input type="password" name="currentpassword" maxlength="20" placeholder="Current Password" required ><br><br>
			
			  <?php 
				if ($newpassworderror != null) {
					echo "<h5>$newpassworderror<br></h5>";
				}
			  ?>
              <label> New Password: </label>
              <input type="password" name="newpassword" maxlength="20" placeholder="New Password" required><br><br>
			
			  <label> Confirm New Password: </label>
              <input type="password" name="cnewpassword" maxlength="20" placeholder="Confirm New Password" required><br><br>

			<!--
              <label style="padding: 15px"> Country: </label>
              <select name="Country">
                <option value="IN">IN</option>
                <option value="IL">IL</option>
                <option value="CA">CA</option>
                <option value="TN">TN</option>
              </select><br><br>
            </div><div>
			
              <label style="padding: 15px"> Upload Profile Picture</label>
              <input type="submit" name="submit" value="Upload" class="class="btns""><br><br>
            </div>
			-->
			<div class="btns">
			<input type="submit" name="submit" value="Save" class="btn">
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
