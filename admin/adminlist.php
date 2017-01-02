<?php
	   include('session.php');
	   include("config.php");
	   include("admincheck.php");
	   if ($loggedadmin >= 100) {
	?>
<html>
	
	<head>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			<?php include("menu.php"); ?>
			<br />
			<center><p>This is an automated Admin List</p></center>
			<div class="panel panel-default">
				  <div class="panel-heading" style="text-align: center;">
				  <h2>Creators</h2>
			</div>
		    <div class="btn-group btn-group-justified">
				<?php
					$sql = "SELECT * FROM user WHERE admin >= 900 ORDER BY admin DESC";
					$result = $db_conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo 	"<center><div class='custom-container'>" . 
										$row["id"] . 
									"</div>
									<div class='custom-container'>" . 
										"<a href='http://felvargs.com/adminsystem/manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . 
									"</div><br />";
							echo 	"<div class='custom-container'><b>Admin Level:</b> " . $row["admin"] . "</div><br/>";
							echo 	"</center><hr/>";
						}
				}
				?>
			</div>
			</div>

			<div class="panel panel-default">
				  <div class="panel-heading" style="text-align: center;">
				  <h2>Admin Panel Guardians</h2>
			</div>
		    <div class="btn-group btn-group-justified">
				<?php
					$sql = "SELECT * FROM user WHERE admin = 800 ORDER BY admin DESC";
					$result = $db_conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo 	"<center><div class='custom-container'>" . 
										$row["id"] . 
									"</div>
									<div class='custom-container'>" . 
										"<a href='http://felvargs.com/adminsystem/manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . 
									"</div><br />";
							echo 	"<div class='custom-container'><b>Admin Level:</b> " . $row["admin"] . "</div><br/>";
							echo 	"</center><hr/>";
						}
				}
				?>
			</div>
			</div>

			<div class="panel panel-default">
				  <div class="panel-heading" style="text-align: center;">
				  <h2>Admin</h2>
			</div>
			<div class="btn-group btn-group-justified">
				<?php
					$sql = "SELECT * FROM user WHERE admin = 700 ORDER BY admin DESC";
					$result = $db_conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo 	"<center><div class='custom-container'>" . 
										$row["id"] . 
									"</div>
									<div class='custom-container'>" . 
										"<a href='http://felvargs.com/adminsystem/manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . 
									"</div><br />";
							echo 	"<div class='custom-container'><b>Admin Level:</b> " . $row["admin"] . "</div><br/>";
							echo 	"</center><hr/>";
						}
				}
				?>
			</div>
			</div>

			<div class="panel panel-default">
				  <div class="panel-heading" style="text-align: center;">
				  <h2>Trial Admin</h2>
			</div>
			<div class="btn-group btn-group-justified">
				<?php
					$sql = "SELECT * FROM user WHERE admin = 600 ORDER BY admin DESC";
					$result = $db_conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo 	"<center><div class='custom-container'>" . 
										$row["id"] . 
									"</div>
									<div class='custom-container'>" . 
										"<a href='http://felvargs.com/adminsystem/manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . 
									"</div><br />";
							echo 	"<div class='custom-container'><b>Admin Level:</b> " . $row["admin"] . "</div><br/>";
							echo 	"</center><hr/>";
						}
				}
				?>
			</div>
			</div>
		</div>
		
	</body>
	<?php } //Overall Admin Level Check ?>
</html>

				