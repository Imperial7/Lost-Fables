<?php

		include("template/main/session.php");

		include("template/main/include.php");

		include("template/main/menu.php");

?>

<!DOCTYPE html>

<html>

<head>
<?php
	$groupname = $_GET['group'];
?>
	<title>Lost Fables <?php echo $groupname; ?></title>

</head>

<body>

	<div class="container">

		<div class="custom-profilecontainer">

			<div class="row">

				<div class="custom-profilehead"></div>

				<br />

				<h1><?php echo $groupname; ?></h1>

			</div>

			<div class="row">

				<br />

				<div class="col-sm-1">
				</div>

				<div class="col-sm-10">

				<form action="creategroupsubmit.php" method="POST" enctype="multipart/form-data">
					<!-- Player's Name and ID.  -->
					<div class="panel panel-default">
					  <div class="panel-heading" style="text-align: center;">
					  <h2>Create Group</h2>
					  </div>
					  <center><br/>
							<fieldset id="groupname">
								<b>Group Name</b><br />
								<input type="text" name="groupname" value="<?php echo $_POST['groupname'] ? $_POST['groupname'] : ''; ?>" /><br />
								<b>Group Description</b><br />
								<textarea name="description" style="width: 400px; height: 100px;"></textarea><br/><br/>
								<span><input type="file" name="fileToUpload" id="fileToUpload" style="color: white;"></span>
								<button type="submit" class="btn btn-default">Create Group</button>
							</fieldset><br/>
						</center></div>
					</div>
				</form>
			


				</div>
				<div class="col-sm-1">
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