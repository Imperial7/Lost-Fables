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
<?php if (!isset($_SESSION['login_user'])) { ?>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<br />
				<h1>Lost Fables</h1>
				<div class="col-sm-4">
					<div class="custom-contenttable">
					<i class="fa fa-envelope-o fa-5x" aria-hidden="true"></i>
					<h2>Contact Us</h2>
					<p>Like something? Have a suggestion or issue?</p>
					<p>Email us: mail@lostfables.com</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="custom-contenttable">
					<i class="fa fa-puzzle-piece fa-5x" aria-hidden="true"></i>
					<h2>Contribute</h2>
					<p>Can you offer your help? Coding, Artwork?</p>
					<p>Email us: mail@lostfables.com</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="custom-contenttable">
					<br /> <i class="fa fa-shield fa-5x" aria-hidden="true"></i><br /><br />
					Things and Stuff
					</div>
				</div>
			</div>
			<div class="row">
				<br />
				<div class="col-sm-10">
				<h2 style="text-align: center;">Recent Uploads</h2>
				<?php
						$sql = "SELECT * FROM `uploads` ORDER BY `id` DESC LIMIT 50";
							$result = $db_conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								$id = $row['id'];
								$owner = $row['owner'];
								$title = $row['title'];
								$image = $row['image'];
								echo "<div class=\"custom-container\" style=\"display: inline-block; width: 160px; height: 200px; \"><center><span>".
									 "<a href=\"profile.php?user=".$owner."&item=".$id."\"><img src=\"".$image."\" style=\"max-width: 150px; max-height: 150px;\"></a>".
									 "</span><span>".
									 $title.
									 "</span></center></div>";
								}
							}
					?>
				</div>
			</div>
			<div class="custom-footer">
				<div class="custom-profilefoot"></div>
			</div>
		</div>
	</div>
	<?php include("template/main/footer.php"); ?>
<?php } else { ?>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<br />
				<h1>Lost Fables</h1>
				<div class="col-sm-4">
					<div class="custom-contenttable">
					<i class="fa fa-envelope-o fa-5x" aria-hidden="true"></i>
					<h2>Contact Us</h2>
					<p>Like something? Have a suggestion or issue?</p>
					<p>Email us: mail@lostfables.com</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="custom-contenttable">
					<i class="fa fa-puzzle-piece fa-5x" aria-hidden="true"></i>
					<h2>Contribute</h2>
					<p>Can you offer your help? Coding, Artwork?</p>
					<p>Email us: mail@lostfables.com</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="custom-contenttable">
					<br /> <i class="fa fa-shield fa-5x" aria-hidden="true"></i><br /><br />
					Things and Stuff
					</div>
				</div>
			</div>
			<hr />
			<div class="row">
				<br />
				<div class="col-sm-8">
				<h2 style="text-align: center;">Recent Uploads</h2>
				<?php
						$sql = "SELECT * FROM `uploads` ORDER BY `id` DESC LIMIT 50";
							$result = $db_conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								$id = $row['id'];
								$owner = $row['owner'];
								$title = $row['title'];
								$image = $row['image'];
								echo "<div class=\"custom-container\" style=\"display: inline-block; width: 160px; height: 200px; \"><center><span>".
									 "<a href=\"profile.php?user=".$owner."&item=".$id."\"><img src=\"".$image."\" style=\"width: 150px; height: 150px; object-fit: cover;\"></a>".
									 "</span><span>".
									 $title.
									 "</span></center></div>";
								}
							}
					?>
				</div>
				<div class="col-sm-4">
					<div class="custom-container">
					<h2 style="text-align: center;">Newest Members</h2>
					<?php
						$sql = "SELECT `username`, `profileimage` FROM `user` ORDER BY `id` DESC LIMIT 12";
							$result = $db_conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								$user = $row['username'];
								$profileimage = $row['profileimage'];
								echo "<div class=\"custom-container\" style=\"display: inline-block; width: 100px; overflow-x: hidden; margin: 2px;\"><center><span>".
									 "<a href=\"profile.php?user=".$user."\"><img src=\"".$profileimage."\" style=\"max-width: 70px; max-height: 70px;\"></a>".
									 "</span><span>".
									 $user.
									 "</span></center></div>";
								}
							}
					?>
					</div>
				</div>
			</div>
			<div class="custom-footer">
				<div class="custom-profilefoot"></div>
			</div>
		</div>
	</div>
	<?php include("template/main/footer.php"); ?>

<?php } ?>
</body>
</html>