<?php 
    session_start();
    include("config.php");
    if (! (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
        header('Location: login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Destination Explorer | User Home</title>
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
      <h1><a href=" "><img src="images/Picture1.png" alt="Image cannot be loaded"></a></h1>
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
	<br><br>
	<h2>Visited a New Place? Please help us improve our website by &nbsp <a href="post.php" class="post">Posting Here!</a></h2>
      <div class="grid_12">
        <h3>Top Categories</h3>
      </div>
	  <?php if ($_SESSION['user'] == "admin") { ?>
		  <div class="grid_9">.</div>
		  <div class="grid_3" align="right">
			<a href="users.php" class="btn">View All Users</a>
		  </div>
	  <?php } ?>
	  <div class="clear"></div>
      <div class="boxes">
	  <div class="gallery">
        <div class="grid_4">
          <figure>
            <div><img src="images/page1_img1.jpg" alt="The image cannot be loaded."></div>
            <figcaption>
              <h3>Mountain</h3>
              Lorem ipsum dolor site geril amet, consectetur cing eliti. Suspendisse nulla leo mew dignissim eu velite a rew qw vehicula lacinia arcufasec ro. Aenean lacinia ucibusy fase tortor ut feugiat. Rabi tur oliti aliquam bibendum olor quis malesuadivamu.
			  <a href="category.php?category=mountain" id="mountain" class="btn">Enter</a> 
			</figcaption>
          </figure>
        </div>
        <div class="grid_4">
          <figure>
            <div><img src="images/page1_img2.jpg" alt="The image cannot be loaded."></div>
            <figcaption>
              <h3>Waterfall</h3>
              Psum dolor sit ametylo gerto consectetur ertori hykill holit adipiscing lity. Donecto rtopil osueremo	kollit asec emmodem geteq tiloli. Aliquam dapibus neclol nami wertoli elittro eget vulpoli no
              utaterbil congue turpis in su. <a href="category.php?category=waterfall" id="waterfall" class="btn">Enter</a>
 		    </figcaption>
          </figure>
        </div>
        <div class="grid_4">
          <figure>
            <div><img src="images/page1_img3.jpg" alt="The image cannot be loaded."></div>
            <figcaption>
              <h3>Lake</h3>
              Lorem ipsum dolor site geril amet, consectetur cing eliti. Suspendisse nulla leo mew dignissim eu velite a rew qw vehicula lacinia arcufasec ro. Aenean lacinia ucibusy fase tortor ut feugiat. Rabi tur oliti aliquam bibendum olor quis malesuadivamu.
			  <a href="category.php?category=lake" id="lake" class="btn">Enter</a> 
			</figcaption>
          </figure>
        </div>
		<div class="clear"></div>
		<div class="grid_4">
          <figure>
            <div><img src="images/page1_img3.jpg" alt="The image cannot be loaded."></div>
            <figcaption>
              <h3>Park</h3>
              Lorem ipsum dolor site geril amet, consectetur cing eliti. Suspendisse nulla leo mew dignissim eu velite a rew qw vehicula lacinia arcufasec ro. Aenean lacinia ucibusy fase tortor ut feugiat. Rabi tur oliti aliquam bibendum olor quis malesuadivamu.
			  <a href="category.php?category=park" id="park" class="btn">Enter</a> 
			</figcaption>
          </figure>
        </div>
		<div class="grid_4">
          <figure>
            <div><img src="images/page1_img3.jpg" alt="The image cannot be loaded."></div>
            <figcaption>
              <h3>Hiking</h3>
              Lorem ipsum dolor site geril amet, consectetur cing eliti. Suspendisse nulla leo mew dignissim eu velite a rew qw vehicula lacinia arcufasec ro. Aenean lacinia ucibusy fase tortor ut feugiat. Rabi tur oliti aliquam bibendum olor quis malesuadivamu. 
			  <a href="category.php?category=hiking" id="hiking" class="btn">Enter</a> 
			</figcaption>
          </figure>
        </div>
		<div class="grid_4">
          <figure>
            <div><img src="images/page1_img3.jpg" alt="The image cannot be loaded."></div>
            <figcaption>
              <h3>City</h3>
              Lorem ipsum dolor site geril amet, consectetur cing eliti. Suspendisse nulla leo mew dignissim eu velite a rew qw vehicula lacinia arcufasec ro. Aenean lacinia ucibusy fase tortor ut feugiat. Rabi tur oliti aliquam bibendum olor quis malesuadivamu. 
			  <a href="category.php?category=city" id="city" class="btn">Enter</a> 
			</figcaption>
          </figure>
        </div>
		<div class="clear"></div>
		<div class="grid_4">
          <figure>
            <div><img src="images/page1_img3.jpg" alt="The image cannot be loaded."></div>
            <figcaption>
              <h3>Night Life</h3>
              Lorem ipsum dolor site geril amet, consectetur cing eliti. Suspendisse nulla leo mew dignissim eu velite a rew qw vehicula lacinia arcufasec ro. Aenean lacinia ucibusy fase tortor ut feugiat. Rabi tur oliti aliquam bibendum olor quis malesuadivamu. 
			  <a href="category.php?category=nightlife"  id="nightlife"class="btn">Enter</a> 
			</figcaption>
          </figure>
        </div>
		<div class="grid_4">
          <figure>
            <div><img src="images/page1_img3.jpg" alt="The image cannot be loaded."></div>
            <figcaption>
              <h3>Other</h3>
              Lorem ipsum dolor site geril amet, consectetur cing eliti. Suspendisse nulla leo mew dignissim eu velite a rew qw vehicula lacinia arcufasec ro. Aenean lacinia ucibusy fase tortor ut feugiat. Rabi tur oliti aliquam bibendum olor quis malesuadivamu. 
			  <a href="category.php?category=other" id="other" class="btn">Enter</a> 
			</figcaption>
          </figure>
        </div>
        <div class="clear"></div>
		</div>
      </div>
    </div>
  </div>
</div>

<footer>
  <div class="container_12">
    <div class="grid_12">
      
      <div class="copy"> Credits &copy; | <a href="#">Privacy Policy</a> | Design by: <a href="http://www.free-css.com/free-css-templates/page175/journey">free-css-templates.com</a> </div>
    </div>
    <div class="clear"></div>
  </div>
</footer>

</body>
</html>