<!DOCTYPE HTML>
<html class="no-js">
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
  </head>

        <!-- Header -->
  <header role="banner" id="fh5co-header">
		<div class="fluid-container">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
					<a class="navbar-brand" href="index.html"><span>L</span>ando<span>M</span>edia</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				</div>
			</nav>
	  </div>
	</header>
        <!-- Three -->
		<?
			//initialize vars
			$nameErr = $emailErr = $instagramErr = $countErr = $schoolErr = $stateErr = "";
			$name = $email = $instagram = $count = $school = $state = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["name"])) {
					$nameErr = "Name is required";
				} else {
					$name = test_input($_POST["name"]);
					// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
						$nameErr = "Only letters and white space allowed";
					}
				}

				if (empty($_POST["email"])) {
					$emailErr = "Email is required";
				} else {
					$email = test_input($_POST["email"]);
					// check if e-mail address is well-formed
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$emailErr = "Invalid email format";
					}
				}

				if (empty($_POST["instagram"])) {
					$instagramErr = "Your instagram handle is required.";
				} else {
					$instagram = test_input($_POST["instagram"]);
					if (preg_match('/\s/',$instagram)) {
						$instagramErr = "No white space allowed.";
					} else if (!substr($instagram, 0, 1) == "@") {
						$instagramErr = "Your Instagram Handle must start with @.";
					}
				}

				if (empty($_POST["count"])) {
					$countErr = "Your follower count is required.";
				} else {
					$count = test_input($_POST["count"]);
					if (filter_var($count, FILTER_VALIDATE_INT)) {
						$countErr = "Please enter a number.";
					}
				}

				if (empty($_POST["school"])) {
					$schoolErr = "Your school is required.";
				} else {
					$school = test_input($_POST["school"]);
				}

				if (empty($_POST["state"])) {
					$stateErr = "Your state is required.";
				} else {
					$state = test_input($_POST["state"]);
				}
			}

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>

        <h3 class="align-center">Form</h3>

		<p><span class="error">* required field.</span></p>
        <form method="post" action="form_process.php">
            <div class="row uniform">
				<div class="12u$(xsmall)">
				<div class="select-wrapper">
                        <select name="method" id="method">
                            <option value="">How would you like to get paid?</option>
							<option value="Paypal">Paypal</option>
							<option value="Amazon">Amazon Gift Card</option>
						</select>
                </div>
				</div>
				<div class="12u$(xsmall)">
                    <input type="text" name="paypal" id="paypal" value="If Paypal, enter your Paypal email" placeholder="email" />
                </div>
                <div class="12u$(xsmall)">
                    <input type="text" name="name" id="name" value="<?php echo $name;?>" placeholder="Name" />
					<span class="error">* <?php echo $nameErr;?></span>
                </div>
                <div class="12u$(xsmall)">
                    <input type="email" name="email" id="email" value="<?php echo $email;?>" placeholder="Email" />
					<span class="error">* <?php echo $emailErr;?></span>
                </div>
                <div class="12u$(xsmall)">
                    <input type="text" name="instagram" id="instagram" value="<?php echo $instagram;?>" placeholder="@InstagramHandle" />
					<span class="error">* <?php echo $instagramErr;?></span>
                </div>
				<div class="12u$(xsmall)">
					<input type="text" name="school" id="school" value="<?php echo $school;?>" placeholder="School" />
					<span class="error">* <?php echo $schoolErr;?></span>
				</div>
                <div class="12u$(xsmall)">
                    <div class="select-wrapper">
                        <select name="state" id="state">
                            <option value="">What state do you live in?</option>
                            <option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District Of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
                        </select>
						<span class="error">* <?php echo $stateErr;?></span>
                    </div>
                </div>
                <div class="12u$(xsmall)">
                    <input type="text" name="count" id="count" value="" placeholder="CURRENT Follower Count" />
					<span class="error">* <?php echo $countErr;?></span>
                </div>
            </form>


                <div class="12u$">
                    <ul class="actions">
                        <td><input type="submit" name ="b1" value="Submit" onClick="store.php"/></td>
                    </ul>
                </div>
      </body>
    </html>
