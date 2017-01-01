<?php
		include("template/main/session.php");
		include("template/main/include.php");
		include("template/main/menu.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lost Fables</title>
</head>
<body>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<br />
				
				<div class="col-sm-2">
				<center><img src="images/profilepic/earl_trip.png" style="width: 80px;"></center>
				<p style="text-align: center;">A message from The Founder</p>
				</div>
				<div class="col-sm-10">
				<p class="letter" style="text-align: center; font-size: 40px;">Thank You!</p>
				<h2>Dear <?php echo $login_session; ?>,</h2>
					<p>"I would personally like to thank you for joining our community!</p>
					<p><b>Lost Fables</b> is still under development and currently in testing. This means that some features may not work as intended and there may be bugs lurking around. I am trying my best to ensure everything runs smoothly for you, however if you do happen upon a bug/error/issue, please do not hesitate to contact me at any time via mail@lostfables.com</p>
					<p>I am happy to recieve your comments and suggestions. Your thoughts help to shape the future of this little website and all your time here is hugely appreciated!</p>
					<p class="letter" style="font-size: 25px; text-align: right;">~ Earl Grey</p>
				</div>
			</div>
			<div class="custom-footer">
				<div class="custom-profilefoot"></div>
			</div>
		</div>
	</div>
			<?php include("template/main/footer.php"); ?>
</body>
</html>