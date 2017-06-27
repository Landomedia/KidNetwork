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
			$nameErr = $emailErr = $instagramErr = $countErr = $schoolErr = $stateErr = $methodErr = $paypalErr = $passwordErr = $confirmpasswordErr = "";
			$name = $email = $instagram = $count = $school = $state = $method = $paypal = $password = $confirmpassword = "";
			$state = "sign in";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$valid = true;
                if ($_POST["password"] == $_POST["confirm"]) {
                    // success!
                    }
                    else {
                        $confirmpasswordErr = "Passwords do not match";
                        // failed :(
                    }

				if (empty($_POST["name"])) {
					$nameErr = "Name is required";
					$valid = false;
				} else {
					$name = test_input($_POST["name"]);
					// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
						$nameErr = "Only letters and white space allowed";
						$valid = false;
					}
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

				if (empty($_POST["instagram"])) {
					$instagramErr = "Your instagram handle is required.";
					$valid = false;
				} else {
					$instagram = test_input($_POST["instagram"]);
					if (preg_match('/\s/',$instagram)) {
						$instagramErr = "No white space allowed.";
						$valid = false;
					} else if (!substr($instagram, 0, 1) == "@") {
						$instagramErr = "Your Instagram Handle must start with @.";
						$valid = false;
					}
				}

				if (empty($_POST["count"])) {
					$countErr = "Your follower count is required.";
					$valid = false;
				} else {
					$count = test_input($_POST["count"]);
					if (!filter_var($count, FILTER_VALIDATE_INT)) {
						$countErr = "Please enter a number.";
						$valid = false;
					}
				}

				if (empty($_POST["school"])) {
					$schoolErr = "Your school is required.";
					$valid = false;
				} else {
					$school = test_input($_POST["school"]);
				}

				if (empty($_POST["location"])) {
					$locationErr = "Your state is required.";
					$valid = false;
				} else {
					$location = test_input($_POST["location"]);
				}

				if (empty($_POST["method"])) {
					$methodErr = "Your payment method is required.";
					$valid = false;
				} else {
					$method = test_input($_POST["method"]);
					if ($method == "Paypal") {
						if (empty($_POST["paypal"])) {
							$methodErr = "Your Paypal email is required.";
							$valid = false;
						} else {
							$paypal = test_input($_POST["paypal"]);
							// check if e-mail address is well-formed
							if (!filter_var($paypal, FILTER_VALIDATE_EMAIL)) {
								$paypalErr = "Invalid email format";
								$valid = false;
							}
						}
					}
				}
                if (empty($_POST["password"])) {
                  $passwordErr = "Your password is required.";
                  $valid = false;
                } else {
                  $password = test_input($_POST["password"]);
                }
                if (empty($_POST["confirm"])) {
                  $confirmpasswordErr = "Your passwords do not match";
                  $valid = false;
                }

				if ($valid) {
					//proceed
					$state = "store data";
				}
			}

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			if ($state == "sign in") {
		?>
<section id="fh5co-explore" style="text-align: left; padding-left:20%;">
  <div class="col-md-12">

      <h3 class="section-title">Sign up!</h3>

  		<p><span class="error">* required field.</span></p>
          <form method="post" class="contact-form">
			<div class="form-group">
        <select name="method" id="method">
            <option <?php if ($_POST['method'] == "") {?> selected="true" <?php }; ?> value="">How would you like to get paid?</option>
			<option <?php if ($_POST['method'] == "Paypal") {?> selected="true" <?php }; ?> value="Paypal" id="paypal-option">Paypal</option>
			<option <?php if ($_POST['method'] == "Amazon") {?> selected="true" <?php }; ?> value="Amazon" id="amazon-option">Amazon Gift Card</option>
		</select>

           <span class="error">* <?php echo $methodErr;?></span>
        </div>

		<div class="form-group">
			<div id="paypal-div" <?php if ($_POST['method'] == "Paypal") {?> style="display:block;" <?php }; ?> style="display:none;">
				<input type="text" name="paypal" id="paypal" value="<?php echo $paypal;?>" placeholder="Enter your Paypal email" />
				<span class="error">* <?php echo $paypalErr;?></span>
			</div>
		</div>
		<div class="form-group">
			<input type="text" name="name" id="name" value="<?php echo $name;?>" placeholder="Name"/>
			<span class="error">* <?php echo $nameErr;?></span>
		</div>
		<div class="form-group">
			<input type="text" name="email" id="email" value="<?php echo $email;?>" placeholder="Email" />
			<span class="error">* <?php echo $emailErr;?></span>
		</div>
		<div class="form-group">
            <input type="password" name="password" id="password" value="<?php echo $password;?>" placeholder="Password" />
            <span class="error">* <?php echo $passwordErr;?></span>
        </div>
            <div class="form-group">
			<input type="password" name="confirm" id="confirm" value="<?php echo $confirm;?>" placeholder="Confirm your password" />
			<span class="error"> * <?php echo $confirmpasswordErr;?></span>
          </div>
		<div class="form-group">
			<input type="text" name="instagram" id="instagram" value="<?php echo $instagram;?>" placeholder="@InstagramHandle" />
			<span class="error">* <?php echo $instagramErr;?></span>
        </div>
		<div class="form-group">
			<input type="text" name="school" id="school" value="<?php echo $school;?>" placeholder="School" />
			<span class="error">* <?php echo $schoolErr;?></span>
		</div>
  		<div class="form-group">
            <select name="location" id="location">
                <option <?php if ($_POST['location'] == "") {?> selected="true" <?php }; ?> value="">What state do you live in?</option>
                <option <?php if ($_POST['location'] == "AL") {?> selected="true" <?php }; ?> value="AL">Alabama</option>
				<option <?php if ($_POST['location'] == "AK") {?> selected="true" <?php }; ?> value="AK">Alaska</option>
				<option <?php if ($_POST['location'] == "AZ") {?> selected="true" <?php }; ?> value="AZ">Arizona</option>
				<option <?php if ($_POST['location'] == "AR") {?> selected="true" <?php }; ?> value="AR">Arkansas</option>
				<option <?php if ($_POST['location'] == "CA") {?> selected="true" <?php }; ?> value="CA">California</option>
				<option <?php if ($_POST['location'] == "CO") {?> selected="true" <?php }; ?> value="CO">Colorado</option>
				<option <?php if ($_POST['location'] == "CT") {?> selected="true" <?php }; ?> value="CT">Connecticut</option>
				<option <?php if ($_POST['location'] == "DE") {?> selected="true" <?php }; ?> value="DE">Delaware</option>
				<option <?php if ($_POST['location'] == "DC") {?> selected="true" <?php }; ?> value="DC">District Of Columbia</option>
				<option <?php if ($_POST['location'] == "FL") {?> selected="true" <?php }; ?> value="FL">Florida</option>
				<option <?php if ($_POST['location'] == "GA") {?> selected="true" <?php }; ?> value="GA">Georgia</option>
				<option <?php if ($_POST['location'] == "HI") {?> selected="true" <?php }; ?> value="HI">Hawaii</option>
				<option <?php if ($_POST['location'] == "ID") {?> selected="true" <?php }; ?> value="ID">Idaho</option>
				<option <?php if ($_POST['location'] == "IL") {?> selected="true" <?php }; ?> value="IL">Illinois</option>
				<option <?php if ($_POST['location'] == "IN") {?> selected="true" <?php }; ?> value="IN">Indiana</option>
				<option <?php if ($_POST['location'] == "IA") {?> selected="true" <?php }; ?> value="IA">Iowa</option>
				<option <?php if ($_POST['location'] == "KS") {?> selected="true" <?php }; ?> value="KS">Kansas</option>
				<option <?php if ($_POST['location'] == "KY") {?> selected="true" <?php }; ?> value="KY">Kentucky</option>
				<option <?php if ($_POST['location'] == "LA") {?> selected="true" <?php }; ?> value="LA">Louisiana</option>
				<option <?php if ($_POST['location'] == "ME") {?> selected="true" <?php }; ?> value="ME">Maine</option>
				<option <?php if ($_POST['location'] == "MD") {?> selected="true" <?php }; ?> value="MD">Maryland</option>
				<option <?php if ($_POST['location'] == "MA") {?> selected="true" <?php }; ?> value="MA">Massachusetts</option>
				<option <?php if ($_POST['location'] == "MI") {?> selected="true" <?php }; ?> value="MI">Michigan</option>
				<option <?php if ($_POST['location'] == "MN") {?> selected="true" <?php }; ?> value="MN">Minnesota</option>
				<option <?php if ($_POST['location'] == "MS") {?> selected="true" <?php }; ?> value="MS">Mississippi</option>
				<option <?php if ($_POST['location'] == "MO") {?> selected="true" <?php }; ?> value="MO">Missouri</option>
				<option <?php if ($_POST['location'] == "MT") {?> selected="true" <?php }; ?> value="MT">Montana</option>
				<option <?php if ($_POST['location'] == "NE") {?> selected="true" <?php }; ?> value="NE">Nebraska</option>
				<option <?php if ($_POST['location'] == "NV") {?> selected="true" <?php }; ?> value="NV">Nevada</option>
				<option <?php if ($_POST['location'] == "NH") {?> selected="true" <?php }; ?> value="NH">New Hampshire</option>
				<option <?php if ($_POST['location'] == "NJ") {?> selected="true" <?php }; ?> value="NJ">New Jersey</option>
				<option <?php if ($_POST['location'] == "NM") {?> selected="true" <?php }; ?> value="NM">New Mexico</option>
				<option <?php if ($_POST['location'] == "NY") {?> selected="true" <?php }; ?> value="NY">New York</option>
				<option <?php if ($_POST['location'] == "NC") {?> selected="true" <?php }; ?> value="NC">North Carolina</option>
				<option <?php if ($_POST['location'] == "ND") {?> selected="true" <?php }; ?> value="ND">North Dakota</option>
				<option <?php if ($_POST['location'] == "OH") {?> selected="true" <?php }; ?> value="OH">Ohio</option>
				<option <?php if ($_POST['location'] == "OK") {?> selected="true" <?php }; ?> value="OK">Oklahoma</option>
				<option <?php if ($_POST['location'] == "OR") {?> selected="true" <?php }; ?> value="OR">Oregon</option>
				<option <?php if ($_POST['location'] == "PA") {?> selected="true" <?php }; ?> value="PA">Pennsylvania</option>
				<option <?php if ($_POST['location'] == "RI") {?> selected="true" <?php }; ?> value="RI">Rhode Island</option>
				<option <?php if ($_POST['location'] == "SC") {?> selected="true" <?php }; ?> value="SC">South Carolina</option>
				<option <?php if ($_POST['location'] == "SD") {?> selected="true" <?php }; ?> value="SD">South Dakota</option>
				<option <?php if ($_POST['location'] == "TN") {?> selected="true" <?php }; ?> value="TN">Tennessee</option>
				<option <?php if ($_POST['location'] == "TX") {?> selected="true" <?php }; ?> value="TX">Texas</option>
				<option <?php if ($_POST['location'] == "UT") {?> selected="true" <?php }; ?> value="UT">Utah</option>
				<option <?php if ($_POST['location'] == "VT") {?> selected="true" <?php }; ?> value="VT">Vermont</option>
				<option <?php if ($_POST['location'] == "VA") {?> selected="true" <?php }; ?> value="VA">Virginia</option>
				<option <?php if ($_POST['location'] == "WA") {?> selected="true" <?php }; ?> value="WA">Washington</option>
				<option <?php if ($_POST['location'] == "WV") {?> selected="true" <?php }; ?> value="WV">West Virginia</option>
				<option <?php if ($_POST['location'] == "WI") {?> selected="true" <?php }; ?> value="WI">Wisconsin</option>
				<option <?php if ($_POST['location'] == "WY") {?> selected="true" <?php }; ?> value="WY">Wyoming</option>
                          </select>
                  <span class="error">* <?php echo $locationErr;?></span>
                </div>

  				<div class="form-group">
                    <input type="text" name="count" id="count" value="<?php echo $count;?>" placeholder="Instagram Follower Count" />
  					<span class="error">* <?php echo $countErr;?></span>
                  </div>
  				<div class="form-group">
                      <ul class="actions">
                          <td><input type="submit" name ="submit" value="Submit"/></td>
                      </ul>
                  </div>

				</form>
            <li class = "call-to-action"><a onclick="window.location.href='log_in.php'"><span>Already have an account? Log in!</span></a></li>
            </div>
         </section>
		<?php
			} else if ($state == "store data") {
				$method = $_POST["method"];
				$paypal = $_POST["paypal"];
				$name = $_POST["name"];
				$email = $_POST["email"];
				$instagram = $_POST["instagram"];
				$count = $_POST["count"];
				$school = $_POST["school"];
				$state = $_POST["location"];
                $password = $_POST["password"];
				$db = new SQLite3('userinfo.db');
				$db->exec(" CREATE TABLE IF NOT EXISTS users (method TEXT NOT NULL,paypal TEXT,
				name TEXT NOT NULL,email TEXT NOT NULL, instagram TEXT NOT NULL, count INTEGER NOT NULL,
				 school TEXT NOT NULL, state TEXT NOT NULL, password TEXT NOT NULL)");
				$db->exec("INSERT INTO users"."(method, paypal, name, email, instagram, count, school, state, password)"." VALUES
				('$method', '$paypal', '$name', '$email', '$instagram', $count, '$school', '$state', '$password');");
				$db->close();

		?>
		<h1>Thank you for signing up!</h1>
		<?php
			}
		?>
		<script>
		$(document).ready(function(){
			$("#method").change(function(){
				changeMethod();
			});

			$( "#submit" ).click(function() {
				changeMethod();
			});

			function changeMethod() {
				var value = $('#method').find("option:selected").attr("value");

				switch (value) {
					case "Amazon":
						$("#paypal-div").hide();
						break;
					case "Paypal":
						$("#paypal-div").show();
						break;
					default:
						$("#paypal-div").hide();
						break;
				}
			}
		});
		</script>
      </body>
    </html>
