<?php
include('config.php');
include('session.php');
include('admincheck.php');
?>
<html>
	<head>
		<!-- This includes the CSS into the script. -->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		
		<!-- A wrapper is made to keep this content in line with each other. -->
		<div class="container">
		<?php include("menu.php"); ?>
			<div class="panel panel-default">
				  <div class="panel-heading" style="text-align: center;">
				  <h2>Admin Logger</h2>
				  </div>
						<center>
						<a href="http://felvargs.com/adminsystem/adminlog.php">Show All</a>
							<form role="form" action="" method="post">
								<fieldset id="player">
									<b>Admin</b>
									<input type="text" name="name" value="<?php echo $_POST['name'] ? $_POST['name'] : ''; ?>" />
									<b>Number of Results</b>
									<input type="text" name="num" value="<?php echo $_POST['num'] ? $_POST['num'] : ''; ?>" />
									<button type="submit" class="btn btn-default">Get Results</button>
								</fieldset>
							</form>
							</center>
							<?php
								
if ($loggedadmin >= 800) {
								$name = $_POST["name"];
								$num = $_POST["num"];
								if ($num > 0) {
									$num = $_POST["num"];
								}
								else{
									$num = 100;
								}
								
								if (isset($name)) {
									
									$sql = "SELECT * FROM adminlogger WHERE username = '$name' ORDER BY id DESC LIMIT $num";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<center><div class='container'>". "<div class='custom-container'> <b>Date</b> </br></br>" . $row["timeadded"]. "</div><div class='custom-container'><b>Admin</b><br/></br>" . $row["username"]. "</div><div class='custom-container'><b>Action</b></br></br>" . $row["action"]. "</div><div class='custom-container'><b>Who</b></br></br>" . $row["user"]. "</div><div class='custom-container'><b>Previous Items</b></br></br>" . $row["previous"]. "</div><div class='custom-container'><b>Edits</b></br></br>" . $row["changes"]."</div><div class='custom-container'><b>Points</b></br></br>" . $row["points"]. "</div></div><br></center>";
									    }
									} else {
								    echo "0 results";
									}
								}
								if (!isset($name))
								{
									$sql = "SELECT * FROM adminlogger ORDER BY id DESC LIMIT $num";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<center><div class='container'>". "<div class='custom-container'> <b>Date</b> </br></br>" . $row["timeadded"]. "</div><div class='custom-container'><b>Admin</b><br/></br>" . $row["username"]. "</div><div class='custom-container'><b>Action</b></br></br>" . $row["action"]. "</div><div class='custom-container'><b>Who</b></br></br>" . $row["user"]. "</div><div class='custom-container'><b>Previous Items</b></br></br>" . $row["previous"]. "</div><div class='custom-container'><b>Edits</b></br></br>" . $row["changes"]."</div><div class='custom-container'><b>Points</b></br></br>" . $row["points"]. "</div></div><br></center>";
									    }
									} else {
								    echo "0 results";
									}
								}

								
								
}
							?>
					
		</div>
	</body>
</html>