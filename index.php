<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Contact Form';
		$to = 'jwalkerlyle@gmail.com';
		$subject = 'Message from walkerlyle.com ';

		$body = "From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}

		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You, I will be in touch shortly!</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
	}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Walker Lyle</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/modernizr.custom.js"></script>



    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Arimo|Raleway" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#theMenu">

	<!-- Menu -->
	<nav class="menu" id="theMenu">
		<div class="menu-wrap">
			<h1 class="logo"><a href="index.html#home">W</a></h1>
			<i class="icon-remove menu-close"></i>
			<a href="#home" class="smoothScroll">Home</a>
			<a href="#about" class="smoothScroll">About</a>
			<a href="https://github.com/donjuanpedro" target="_blank" class="smoothScroll">Projects</a>
			<a href="#contact" class="smoothScroll">Contact</a>
			<a href="https://www.facebook.com/walker.lyle.9" target="_blank"><i class="icon-facebook"></i></a>
			<a href="https://twitter.com/JWalkerLyle" target="_blank"><i class="icon-twitter"></i></a>
			<a href="https://github.com/donjuanpedro" target="_blank"><i class="icon-github"></i></a>
		</div>

		<!-- Menu button -->
		<div id="menuToggle"><i class="icon-reorder"></i></div>
	</nav>



	<!-- ========== HEADER SECTION ========== -->
	<section id="home" name="home"></section>
	<div id="headerwrap">
		<div class="container">
			<div class="logo">
				<h3><a href="#">W</a></h3>
			</div>
			<br>
			<div class="row">
				<h3>Hello, I'm Walker.</h3>
				<br>
				<br>
				<div class="col-lg-6 col-lg-offset-3">
          <div class="text-xs-center">
            <img src="assets/img/walker.jpg" class="img-circle img-thumbnail" alt="...">
          </div>
				</div>
			</div>
		</div><!-- /container -->
	</div><!-- /headerwrap -->

	<!-- ========== ABOUT SECTION ========== -->
	<section id="about" name="about"></section>
	<div id="f">
		<div class="container">
			<div class="row">
				<h3>ABOUT ME</h3>
				<p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>

				<!-- INTRO INFORMATIO-->
				<div class="col-lg-6 col-lg-offset-3">
					<p>A full-stack developer / web designer based in Austin, TX.</p>
				</div>
			</div>
		</div><!-- /container -->
	</div><!-- /f -->

	<!-- ========== CONTACT SECTION ========== -->
	<section id="contact" name="contact"></section>
	<div id="f">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
				<h3>Contact Me</h3>
        <form id="send_message" class="form-horizontal" role="form" method="post" action="#send_message">
        	<div class="form-group">
        		<label for="name" class="col-sm-2 control-label">Name</label>
        		<div class="col-sm-8">
        			<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
        			<?php echo "<p class='text-danger'>$errName</p>";?>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="email" class="col-sm-2 control-label">Email</label>
        		<div class="col-sm-8">
        			<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
        			<?php echo "<p class='text-danger'>$errEmail</p>";?>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="message" class="col-sm-2 control-label">Message</label>
        		<div class="col-sm-8">
        			<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
        			<?php echo "<p class='text-danger'>$errMessage</p>";?>
        		</div>
        	</div>
        	<div class="form-group">
        		<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
        		<div class="col-sm-8">
        			<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
        			<?php echo "<p class='text-danger'>$errHuman</p>";?>
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="col-sm-8 col-sm-offset-4">
        			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="col-sm-10 col-sm-offset-2">
        			<?php echo $result; ?>
        		</div>
        	</div>
        </form>
			</div>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/js/classie.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>
