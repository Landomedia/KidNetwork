<!DOCTYPE HTML>
<html class="no-js">
<style> .error {color:red;} </style>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign up!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landomedia" />
    <meta name="keywords" content="make money quick, form, post, socialmedia, instagram" />
    <meta name="author" content="FREEHTML5.CO" />
    <meta property="og:title" content=""/>
  	<meta property="og:image" content=""/>
  	<meta property="og:url" content=""/>
  	<meta property="og:site_name" content=""/>
  	<meta property="og:description" content=""/>
  	<meta name="twitter:title" content="" />
  	<meta name="twitter:image" content="" />
  	<meta name="twitter:url" content="" />
  	<meta name="twitter:card" content="" />
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">


    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

        <!-- Header -->
  <header role="banner" id="fh5co-header">
		<div class="fluid-container">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					<a class="navbar-brand" href="index.html"><span>Lando</span>Media</a>
				</div>
        <div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
						<li><a href="index.html" data-nav-section="explore"><span>Explore</span></a></li>
						<li><a href="index.html" data-nav-section="testimony"><span>Testimony</span></a></li>
						<li><a href="index.html" data-nav-section="team"><span>Team</span></a></li>
						<li><a href="index.html" data-nav-section="faq"><span>FAQ</span></a></li>
						<li class="call-to-action"><a onclick="window.location.href='sign_in.php'"><span>Sign up!</span></a></li>
					</ul>
				</div>
			</nav>
	  </div>
	</header>
		<?
			//initialize vars
			$emailErr = $passwordErr = "";
			$email = $password = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$valid = true;
				}

				if (empty($_POST["email"])) {
					$emailErr = "Email is required";
					$valid = false;
				} else {
					$email = test_input($_POST["email"]);
					// check if e-mail address is well-formed
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$emailErr = "Invalid email format";
						$valid = false;
					}
				}
                if (empty($_POST["password"])) {
                  $passwordErr = "Your password is required.";
                  $valid = false;
                } else {
                  $password = test_input($_POST["password"]);
                }

				if ($valid) {
					//proceed
					$state = "store data";
				}

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			if ($state == "sign in") {
		?>
<section id="fh5co-explore" style="text-align: center;">
  <div class="col-md-12">

      <h3 class="section-title">Log In!</h3>

  				<div class="form-group">
                      <input type="email" name="email" id="email" value="<?php echo $email;?>" placeholder="Email" />
  					<span class="error">* <?php echo $emailErr;?></span>
          </div>
          <div class="form-group">
                      <input type="password" name="password" id="password" value="<?php echo $password;?>" placeholder="Password" />
            <span class="error">* <?php echo $passwordErr;?></span>
            <div class="form-group">
  		              <div class="form-group">
                      <ul class="actions">
                          <td><input type="submit" name ="submit" value="Log In"/></td>
                      </ul>
                  </div>

				</form>
            <li class = "call-to-action"><a onclick="window.location.href='log_in.php'"><span>Already have an account? Log in!</span></a></li>
            </div>
          </section>
		<?php
			} else if ($state == "store data") {
				$email = $_POST["email"];
                $password = $_POST["password"];
				$db = new SQLite3('userinfo.db');
				$db->exec(" CREATE TABLE IF NOT EXISTS users (email TEXT NOT NULL, password TEXT NOT NULL)");
				$db->exec("INSERT INTO users"."(method, paypal, name, email, instagram, count, school, state)"." VALUES
				('$method', '$paypal', '$name', '$email', '$instagram', $count, '$school', '$state');");
				$db->close();

		?>
		<h1>Thank you for signing up!</h1>
		<?php
			}
		?>
		<script>
		$(document).ready(function(){
			$("#method").change(function(){
				var value = $(this).find("option:selected").attr("value");

				switch (value) {
					case "Amazon":
						$("#paypal").hide();
						break;
					case "Paypal":
						$("#paypal").show();
						break;
					default:
						$("#paypal").hide();
						break;
				}
			});
		});
		</script>
      </body>
    </html>
