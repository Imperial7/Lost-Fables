<?php
include("config.php");
include('session.php');
?><!doctype html>
<html>
	<?php
		include("admincheck.php");
	   if ($loggedadmin >= 100) {
	?>
	<head>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			<?php include("menu.php"); ?>
	<?php if ($loggedadmin >= 600) { ?>

			<div class="panel panel-default">
			  <div class="panel-heading" style="text-align: center;">
			  <h2>Admin Links</h2>
			  </div>

			<div class="panel-body">
			  <div class="btn-group btn-group-justified">
				  <a href="" class="btn btn-default">Admin Handbook</a>
				  <a href="adminlist.php" class="btn btn-default">--</a>
				</div>
				<div class="btn-group btn-group-justified">
				  <a href="" class="btn btn-default">Ticket System</a>
				  <a href="" class="btn btn-default">Ticket System Login</a>
				</div>
			  </div>
			</div>

				  <br />

			<?php } if ($loggedadmin >= 800) { ?>
				<div class="panel panel-default">
					  <div class="panel-heading" style="text-align: center;">
					  <h2><i class="fa fa-user-secret fa-1x"></i> Guardian Links</h2>
					  </div>

					  <div class="panel-body">
					    <div class="btn-group btn-group-justified">
						  <a href="adminlog.php" class="btn btn-default">Admin Logger</a>
						</div>
					  </div>
					</div>
			<?php } ?>
		</div>
		
	</body>
	<?php } //Overall Admin Level Check ?>
</html>