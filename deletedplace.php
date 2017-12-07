<?php 
    session_start();
    include("config.php");
    if (! (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
        header('Location: login.php');
    }
	
	$noplace = null;
	$username = $_SESSION['user'];
	
	if(isset($_GET['deleteplace'])) {
		$deleteplace = $_GET['deleteplace'];
	}
	
	if(isset($_GET['owner'])) {
		$owner = $_GET['owner'];
	}
	
	$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "DELETE FROM destination WHERE place = '$deleteplace' AND username = '$owner'";
	
	$result = mysqli_query($conn, $sql);
	
	$placedeletesuccess = "success";

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Destination Explorer | Deleted Place</title>
<meta charset="utf-8">
<link rel="icon" href="images/picture2_Huf_icon.ico">
<link rel="shortcut icon" href="images/picture2_Huf_icon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.jqtransform.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
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

          <li><a href="editprofile.php">Edit Profile</a></li>
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
      <div>
        <div class="grid_12">

          <br>

		  <h4>The place <?php echo $deleteplace; ?> posted by <?php echo $owner; ?> is deleted successfully!</h4>


        </div>

      </div>

      <div class="clear"></div>
    </div>
  </div>

</div>
</body>
</html>
