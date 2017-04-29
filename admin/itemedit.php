<?php 
	include("config.php");
	include('session.php');
	include("admincheck.php");
	   if ($loggedadmin >= 100) {
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	  <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Lost Fables Admin Panel</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	 <!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	 <!-- MORRIS CHART STYLES-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	 <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
		<!-- /. NAV SIDE  -->
	<?php include 'menu.php';
	?>
		<div id="page-wrapper" >
				<?php include("warning.php"); ?>
			<div id="page-inner">
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
			 <!-- /. PAGE INNER  -->
			</div>
		 <!-- /. PAGE WRAPPER  -->
		</div>
	 <!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	  <!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	 <!-- MORRIS CHART SCRIPTS -->
	 <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>
	  <!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>
	
   <?php } ?>
</body>
</html>
