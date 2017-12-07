<?php 
    session_start();
    include("config.php");
    if (! (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
        header('Location: login.php');
    }
	
	if(isset($_GET['category'])) {
		$category = $_GET['category'];
	
	}
	
	$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM destination WHERE category = '$category'";
	
	$result = mysqli_query($conn, $sql);

	if(isset($_POST['search'])) {
		
		$search = $_POST['search'];
		//$category_to_search = $_POST['category_to_search'];
		
		$sql2 = "SELECT * FROM destination WHERE category = '$category' AND place like '%" .  $search . "%'";		
	
		$result = mysqli_query($conn, $sql2);
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Destination Explorer | Category</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
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
        pagination: false, 
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
      <div class="grid_12">
        <h3><?php echo $category ?></h3>
	  </div>
		<div class="grid_9">.</div>
		  <div class="grid_3" align="right">
			<form action="" method="post">
				<input type="hidden" name="category_to_search" value="<?php $category; ?>" >
				<input type="text" name="search" maxlength="20" placeholder="Search Place">
				<input type="submit" name="submit" class="btn" value="Search">
			</form>
		  </div>
	  <div class="grid_12">
        <div class="tours">
          
		    <?php
			if (mysqli_num_rows($result) > 0) {
				$count = 0;
				$folder="places/";
				while($row = mysqli_fetch_array($result)) {
					$id = $row['id'];
					$owner = $row['username'];
					$place = $row['place'];
					$category = $row['category'];
					$address = $row['address'];
					$state = $row['state'];
					$about = $row['about'];
					$imagepath = $folder . $row['imagepath'];
					
					$user_details_query = mysqli_query($conn, "SELECT * FROM user WHERE username='$owner'");
					$user_row = mysqli_fetch_array($user_details_query);
					$first_name = $user_row['fname'];
					$last_name = $user_row['lname'];
					$email = $user_row['email'];
					$count = $count + 1;
					?>
				<div class="grid_4 alpha">
					<div class="tour"> <img src= "<?php echo $imagepath; ?>" alt="The image cannot be loaded." class="img_inner fleft">
					<div class="extra_wrapper">
					<p class="text1">Place: <?php echo $place; ?> </p>
					<p class="text1">State: <?php echo $state; ?> </p>
					
					
					<a href="place.php?place=<?php echo $place; ?> & owner=<?php echo $owner; ?>" class="btn">Details</a>
					<?php if ($_SESSION['user'] == "admin") { ?>
						<br><br><a href="deletedplace.php?deleteplace=<?php echo $place; ?> & owner=<?php echo $owner; ?>" class="btn">Delete</a> </div>
					<?php
						} else { ?> </div><?php
						}
					?>
					</div>
				</div>
				<?php if ($count%3 == 0) { ?>
					<div class="clear"></div>
				<?php
				}
			}
				
			} else {
				echo "<h3>There are no places posted to this category yet.</h3>";
			}
			?>
		  <div class="clear"></div>
        </div>
      </div>
      
      <div class="clear"></div>
    </div>
  </div>
  
</div>
</body>
</html>