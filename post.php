<?php
   include("config.php");

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       
    $username = $_SESSION['user'];   
    $place = $_POST["place"];
    $category=$_POST["category"];
    $state=$_POST["state"];
    $address=$_POST["address"];
    $about=$_POST["about"];
    
    if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png","JPEG","JPG","PNG");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file. It is " . $file_ext;
      }
      
      if($file_size >= 2097152){
         $errors[]='File size must be less than 2 MB';
      }
          
      if(empty($errors)==true){
            $new_file_name=$_FILES['image']['name'];
	   		$folder="places/";
	   		move_uploaded_file($_FILES['image']['tmp_name'], $folder . $_FILES['image']['name']);
			
			$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "INSERT INTO destination (username, place, category, address, state ,imagepath, about) 
			VALUES ('$username', '$place', '$category', '$address', '$state', '$new_file_name', '$about')";


			if ($conn->query($sql) === TRUE) {
				header('Location: homepage.php');    
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
       }else{
         echo $errors;
       }
   }

		

   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Destination Explorer | Post Destination</title>
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
<body>
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
          <li><a>Welcome <?php echo $_SESSION['user']; ?> </a></li>        
          
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
      <div class="grid_8"> 
        <div class="slider-relative">
        <div class="slider-block">
          <div class="slider"> <a href="#" class="prev"></a><a href="#" class="next"></a>
            <ul class="items">
              <li><img src="images/slide.jpg" alt="Image cannot be loaded">
                <div class="banner">
                  <div>Visited a New Place?</div>
                  <br>
                  <span> post it here!</span> </div>
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
        <form id="loginform" method="post" action=" " enctype="multipart/form-data">
			<label>Destination: </label>
              <input type="text" name="place" maxlength="20" placeholder="Place" required>
              <br class="clear">
			<label>Category: </label>
              <select class="label" id="category" name="category">
					<option value="mountain">Mountain</option>
					<option value="waterfall">Waterfall</option>
					<option value="lake">Lake</option>
					<option value="park">Park</option>
					<option value="hiking">hiking</option>
					<option value="city">City</option>
					<option value="nightlife">Nightlife</option>
					<option value="other">Other</option>
				</select>
              <br class="clear">
			<label>State: </label>
              <input type="text" name="state" id="states" maxlength="20" placeholder="State" required>
              <br class="clear">
			<label>Address: </label>
              <input type="textarea" class="address" name="address" maxlength="50" placeholder="Address" required>
              <br class="clear">
			<label>Upload Image: </label>
              <input type="file" name="image" placeholder="Upload a pic" required>
              <br class="clear">
            <label>About: </label>
              <input type="textarea" class="textarea" name="about" placeholder="Please enter more information about the place" required>
              <br class="clear">
		  <div class="btns">
			<input type="submit" name="submit" value="Save" class="btn">
		 </div>
          
        </form>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
</body>
</html>