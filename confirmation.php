<!DOCTYPE html>
<html>
<head>
	<title>CONFIRMATION</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Unlike conventional macaron bakeries, The Macaron Man 
	is dedicated to producing in-house, high end, and premium quality macarons using world renowned ingredients.">
	<meta name="keywords" content="macaron shop, patisserie, all-natural, premium, treats">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
<?php
print <<<HERE
<link rel="stylesheet" href="css/confirmation.css">
HERE;
?>
</head>
<body>
	<div class="row">
		<div class="navbar navbar-default col-lg-12">
			<div class="row">
				<div class="navbar-header col-lg-offset-2 col-lg-2">
					<button type="button">	
						<span class="fa fa-home fa-1.75x"></span>
					</button>
					<button type="button">	
						<span class="fa fa-facebook-square fa-1.75x"></span>
					</button>
					<button type="button">	
						<span class="fa fa-twitter-square fa-1.75x"></span>
					</button>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">	
						<span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</span>
					</button>
				</div>	
				<div class="collapse navbar-collapse col-md-12 col-lg-8">
					<ul class="nav navbar-nav">
						<li class="dropdown text-center">
							<a href="#" data-toggle="dropdown"><strong>CHINA</strong><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="text-center"><a href="braised-pork.html"><strong>BRAISED PORK</strong></a></li>
								<li class="divider"></li>
								<li class="text-center"><a href="eggs-and-tomatoes.html"><strong>EGGS & TOMATOES</strong></a></li>
								<li class="divider"></li>
								<li class="text-center"><a href="beef-noodle-soup.html"><strong>BEEF NOODLE SOUP</strong></a></li>
							</ul>
						</li>
						<li class="dropdown text-center">
							<a href="#" data-toggle="dropdown"><strong>MIDDLE EAST</strong><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="text-center"><a href="saudi-kabsa.html"><strong>SAUDI KABSA</strong></a></li>
							</ul>
						</li>
						<li class="dropdown text-center">
							<a href="#" data-toggle="dropdown"><strong>CENTRAL ASIA</strong><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="text-center"><a href="uzbek-plov.html"><strong>UZBEK PLOV</strong></a></li>
							</ul>
						</li>
						<li class="dropdown text-center">
							<a href="#" data-toggle="dropdown"><strong>NORTH AMERICA</strong><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="text-center"><a href="mashed-potatoes.html"><strong>MASHED POTATOES</strong></a></li>
								<li class="divider"></li>
								<li class="text-center"><a href="chicken-caesar-salad.html"><strong>CHICKEN CAESAR SALAD</strong></a></li>
							</ul>
						</li>
						<li class="text-center">
							<a href="about.html"><strong>ABOUT</strong></a>
						</li>
						<li class="text-center">
							<a href="sources.html"><strong>SOURCES</strong></a>
						</li>
						<li class="text-center">
							<a href="contact.html"><strong>CONTACT</strong></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<div class="container">
	<div class="row">
		<h1 class="col-md-12 col-lg-12 pull-left">CONFIRMATION</h1>
		<p></p>
	</div>
<?php
$name=filter_input(INPUT_POST,"name");
$emailAddress=filter_input(INPUT_POST,"emailAddress");
$message=filter_input(INPUT_POST,"message");

if (isset($name) && isset($emailAddress) && isset($message)){
	#Call the PHPMailer package available for download on GitHub and set up the necessary details to send a SMTP email to the site administrator.
	require "phpmailer/PHPMailerAutoload.php";
	
	$mail = new PHPMailer();
	$mail->IsSMTP();                                      	
	$mail->Host = "smtp.live.com";  						
	$mail->SMTPAuth = true;                               				
	$mail->Username = "foodstop.outreach@hotmail.com";          
	$mail->Password = "realmadrid1";                       		
	$mail->SMTPSecure = "tls";                            	
	$mail->Port = "587";                                    		
	$mail->setFrom("foodstop.outreach@hotmail.com");
	$mail->addAddress("foodstop.outreach@hotmail.com");     
	$mail->isHTML(true); 
	$mail->Subject="SUBMITTED USER FEEDBACK/QUESTIONS";

	//In this project, I have set the timezone used in this PHP script to 'America/Vancouver'.
	date_default_timezone_set('America/Vancouver');

	//Create a date & time object so that the current time can be displayed in both the PHP page and the email.
	//The date and time should be as accurate as possible, so DateTime is initialized only prior to finalizing the body of the email.
	$date=new DateTime();
	$currentDayOfTheWeek=$date->format("l");
	$currentMonth=$date->format("F");
	$currentDayOfTheMonth=$date->format("j");
	$currentYear=$date->format("Y"); //I added 60 to the current year to get 2076, in line with the fictional year used in the website.
	$currentHour=$date->format("G"); //24-hour time format.
	$currentMinute=$date->format("i");

	$firstPart="<section><p style=\"font-weight:bold; text-transform: uppercase text-align: center;\">$name (email address: <span style=\"text-transform:lowercase;\">";
	$firstPart.="$emailAddress</span>) has submitted the following feedback/questions on $currentDayOfTheWeek, $currentMonth $currentDayOfTheMonth,";
	$firstPart.="$currentYear at $currentHour:$currentMinute.</p><p>$message</p></section>";
	$mail->Body=$firstPart;

	if(!$mail->send()) {
		print <<<HERE
		<div class="row">
			<p class="col-lg-12">The feedback was not successfully sent!</p>
		</div>
HERE;
	} else {
		print <<<HERE
		<div class="row">
			<p class="col-lg-offset-2 col-lg-">Your feedback/questions were successfully received via email by FOODSTOP on $currentDayOfTheWeek, $currentMonth $currentDayOfTheMonth, 
			$currentYear at $currentHour:$currentMinute.
			</p>
		</div>
HERE;
	}
} else {
	print <<<HERE
		<div class="row">
			<p class="col-lg-12 text-center">No information was received from the contact page.</p>
		</div>
		<div classs="row">
			<p class="col-lg-12 text-center">Therefore, no feedback/questions could be sent.</p>
		</div>
HERE;
}

$date=new DateTime();
$currentYear=$date->format("Y");
print <<<HERE
<div class="row">
	<footer class="col-lg-12 text-center">
		<p>&copy; $currentYear. ALL RIGHTS RESERVED.</p>
		<p>ANY PROBLEMS WITH THE WEB SITE AND SUGGESTIONS SHOULD BE DIRECTED TO WEBMASTER@FOODSTOP.COM</p>
	</footer>
</div>
HERE;
?>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>