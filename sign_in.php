<!DOCTYPE HTML>
<!--
    Theory by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>Sign up!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="icon" href="images/widget.png">
    </head>
    <body class="subpage">

        <!-- Header -->
        <header id="header">
            <div class="inner">
                <a href="index.html" class="logo">Landomedia</a>
                <nav id="nav">
                    <a href="index.html">Home</a>
                </nav>
                <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
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
