<?php
		include("template/main/session.php");
		include("template/main/include.php");
		include("template/main/menu.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lost Fables | News</title>
</head>
<body>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<h1>Notifications</h1>
				<br />
				<form method="POST">
					<span><input type="submit" value="Mark as Read" name="submit"></span>
				</form>
				<?php
					$sql = "SELECT * FROM `notification` WHERE `owner` = '$login_session' ORDER BY `id` DESC";
					$result = $db_conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						$notification = $row['notification'];
						$link = $row['link'];
						echo "<div class=\"custom-container\">".
							 "<a href=\"" . $link . "\">" . $notification . "</a></div>";
						}
					}
				if ('POST' === $_SERVER['REQUEST_METHOD']) {
					$update = "UPDATE `notification` SET `read` = 1 WHERE `owner` = '$login_session' AND `read` = 0";
					if($db_conn->query($update)) {}
					echo "<script type='text/javascript'>window.top.location='notifications.php';</script>"; exit;
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>