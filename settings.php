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
<?php if (!isset($_SESSION['login_user'])) { echo "<script type='text/javascript'>window.top.location='index.php';</script>"; exit; } else { ?>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<br />
				<h1>Settings</h1>
			<div class="row">
				<br />
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<div class="custom-container">
					<h2 style="text-align: center;">Settings</h2>
					<?php
						$sql = "SELECT * FROM `user` WHERE `username` = '$login_session'";
							$result = $db_conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								$profileimage = $row['profileimage'];
								$email = $row['email'];
								$password = $row['password'];
								$location = $row['location'];
								$profession = $row['profession'];
								$mature = $row['mature'];
								}
							}
					?>
					<form action="settingupdate.php" method="POST" enctype="multipart/form-data">
						<span>Password: <input type="password" name="password" id="password" /></span>
						<span>Email: <input type="text" name="email" id="email" value="<?php echo $email ? $email : ''; ?>" /></span><hr />
						<span>I am a:
						<select name="profession" id="profession">
						  <option selected="<?php echo $profession; ?>"><?php echo $profession; ?></option>
						  <option value="">None</option>
						  <option value="Writer">Writer</option>
						  <option value="Artist">Artist</option>
						  <option value="Poet">Poet</option>
						  <option value="Developer">Games Developer</option>
						  <option value="Ninja">Ninja</option>
						</select></span>
						<span>Location: <input type="text" name="location" id="location" placeholder="Where are you from?" value="<?php echo $location ? $location : ''; ?>" /></span>
						<hr />
						<span>Mature: <input type="checkbox" name="mature" id="mature" placeholder="Where are you from?" <?php  if ($mature == 1) echo 'checked="checked"'; ?> /> (Display Mature/NSFW content?)</span>
						<hr />
						<span><input type="file" name="fileToUpload" id="fileToUpload" style="color: white;"></span>

						<span><input type="submit" value="Submit" name="submit"></span>
					</form>
					</div>
					<div class="col-sm-4">
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>
</body>
</html>