<?php
		include("template/main/session.php");
		include("template/main/include.php");
		include("template/main/menu.php");
		$user = $_GET['user'];
		$item = $_GET['item'];
		if (isset($user)) {
			$user = $_GET['user'];
		} elseif (!isset($user) && isset($login_session)) {
			$user = $login_session;
			echo "<script type='text/javascript'>window.top.location='profile.php?user=$user';</script>"; exit;
		}
		$sql = "SELECT * FROM `user` WHERE `username` = '$user'";
			$result = $db_conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				$adminlevel = $row['admin'];
				$profileimage = $row['profileimage'];
				$location = $row['location'];
				$premium = $row['premium'];
				$profession = $row['profession'];
				}
			}
		if ($adminlevel < 1 && $premium < 1) { $member = "Member";
		} elseif ($adminlevel < 1 && $premium == 1) { $member = "Premium Member";
		} elseif ($adminlevel == 100) { $member = "Volunteer Moderator";
		} elseif ($adminlevel == 200) { $member = "Volunteer Admin";
		} elseif ($adminlevel == 300) { $member = "Staff";
		} elseif ($adminlevel == 900) { $member = "Creator";

		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lost Fables | <?php echo $user; ?></title>
</head>
<body>
<?php if (!isset($user) && !isset($login_session)) { ?>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<br />
				<h1>Whoops!</h1>
				Please Login/Register
				</div>
			</div>
		</div>
	</div>
<?php } elseif (!isset($item)) { ?>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<br />
				<h1><?php echo $user; ?></h1>
				<div class="col-sm-3">
					<span><center><img src="<?php echo $profileimage; ?>" style="max-width: 200px;"></center></span><hr />
					<h2 style="text-align: center;"><?php echo $member; ?></h2><hr />
					<?php if (!empty($location)) { ?>
					<p><b>Location</b>: <?php echo $location; ?></p>
					<?php } ?>
					<?php if (!empty($profession)) { ?>
					<p><b>Profession</b>: <?php echo $profession; ?></p>
					<?php } ?>
				</div>
				<div class="col-sm-9">
					<h2>Recent Submissions</h2>
					<?php
						$sql = "SELECT * FROM `uploads` WHERE `owner` = '$user' ORDER BY `id` DESC LIMIT 12";
							$result = $db_conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								$id = $row['id'];
								$title = $row['title'];
								$image = $row['image'];
								echo "<div class=\"custom-container\" style=\"display: inline-block; width: 200px; overflow-x: hidden;\"><center><span>".
									 "<a href=\"profile.php?user=".$user."&item=".$id."\"><img src=\"".$image."\" style=\"width: 150px; height: 150px; object-fit: cover;\"></a>".
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

<?php } elseif (isset($item)) { ?>
<div class="container">
	<div class="custom-profilecontainer">
		<div class="row">
			<div class="custom-profilehead"></div>
			<br />
			
			<div class="col-sm-3">
				<span><center><a href="profile.php?user=<?php echo $user; ?>"><img src="<?php echo $profileimage; ?>" style="max-width: 200px;"></a></center></span><hr />
				<h1><?php echo $user; ?></h1>
				<h2 style="text-align: center;"><?php echo $member; ?></h2><hr />
				<?php if (!empty($location)) { ?>
				<p><b>Location</b>: <?php echo $location; ?></p>
				<?php } ?>
				<?php if (!empty($profession)) { ?>
				<p><b>Profession</b>: <?php echo $profession; ?></p>
				<?php } ?>
				<span><?php
					if ($user == $login_session) {
						?>
						<a href="edit.php?user=<?php echo $user; ?>&item=<?php echo $item; ?>">Edit Item</a>
						<?php
					}?>
				</span>
				<hr />
				<h2 style="font-size: 20px;">More by <?php echo $user; ?></h2>
				<?php
						$sql = "SELECT * FROM `uploads` WHERE `owner` = '$user' ORDER BY `id` DESC LIMIT 50";
							$result = $db_conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								$id = $row['id'];
								$owner = $row['owner'];
								$title = $row['title'];
								$image = $row['image'];
								echo "<div class=\"custom-container\" style=\"display: inline-block; max-width: 100px; max-height: 110px; overflow: hidden; margin: 5px;\"><center><span>".
									 "<a href=\"profile.php?user=".$owner."&item=".$id."\"><img src=\"".$image."\" style=\"width: 80px; height: 80px; object-fit: cover;\"></a>".
									 "</span><span>".
									 $title.
									 "</span></center></div>";
								}
							}
					?>
			</div>
			<div class="col-sm-9">
				<?php
					$sql = "SELECT * FROM `uploads` WHERE `owner` = '$user' AND `id` = '$item' ORDER BY `id` DESC LIMIT 12";
						$result = $db_conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								$id = $row['id'];
								$title = $row['title'];
								$image = $row['image'];
								$category = $row['category'];
								$genre = $row['genre'];
								$content = $row['content'];
								$content = str_replace("\n", "\n", $content);
								echo "<center><span><h2>".$title."</h2>".
									 "<a href=\"profile.php?user=".$user."&item=".$id."\"><img src=\"".$image."\" style=\"width: 100%; max-width: 850px;\"></a>".
									 "</span><hr /></center><span>".
									 implode("</p><p>", explode("\n", $content)) . "</p>".
									 "</span>";

								
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
<?php } ?>
</body>
</html>