<?php
	   include('session.php');
	   include("config.php");
	   include("admincheck.php");
	?>
<html>
	
	<head>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/font-awesome.min.css">
	</head>
	<body>

		<div class="wrapper">
			<div class="container">
				<div class="rollwrapper">
					<?php include("menu.php"); ?>
					<br />
					<div class="container">
					<?php
						$user = $_GET["user"];
						$resultid = $_GET["id"];
						$sql1 = "SELECT * FROM uploads WHERE id = '$resultid' ORDER BY id";
						$result1 = $db_conn->query($sql1);
						if ($result1->num_rows > 0) {
						    // output data of each row
						    while ($row1 = $result1->fetch_assoc()) {
						    	$id = $row1['id'];
								    	echo "<center>
								    		 <img src='../".$row1["image"]."'title='".$row1["title"]."' style='width: 500px;'><br />".
								    		 $row1['title'].
								    		 "<br /><b>Owner</b>: ".$row1['owner'];
							}
						}

				//TRANSFER ITEM
						?>
						<br /><br />
						<div class="panel panel-default">
							<div class="panel-heading" style="text-align: center;"">
							  <h2>Transfer Item</h2>
							</div>
							<form role="form" action="#" method="post">
								<fieldset id="transfer">
									<input type="text" name="player" value="<?php echo $_POST['player'] ? $_POST['player'] : ''; ?>" /><br /><br />
									<button type="submit" class="btn btn-default">Transfer Item</button><br /><br />
								</fieldset>
							</form>
							</div>
				<?php
					
					if ($_SERVER['REQUEST_METHOD'] = $_POST AND isset($_POST['player'])) {
						$transfer = $_POST['player'];
						$update = "UPDATE uploads SET owner = '$transfer' WHERE id = '$id'";
						if ($db_conn->query($update) === TRUE) {
							echo "<br />Ownership Transferred";
						} else {
							echo "Error: " . $insert . "<br>" . $db_conn->error;
						}
					}

					if ($_SERVER['REQUEST_METHOD'] = $_POST) {
					echo "<script type='text/javascript'>window.top.location='http://felvargs.com/adminsystem/itemedit.php?user=$user&id=$resultid';</script>"; exit;
					}

					echo "<br /><br /><a href='http://lostfables.com/admin/manageusers.php?user=".$user."'>Back to ".$user."'s Items</a><br /><br />";
					?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>