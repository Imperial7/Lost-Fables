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
				<h1>News</h1>
				<br />
				<?php
				$sql = "SELECT * FROM `news` ORDER BY `id` DESC LIMIT 20";
					$result = $db_conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						$content = $row['content'];
						echo $content."<hr />";
						}
					}
				?>
			</div>
			<div class="custom-footer">
				<div class="custom-profilefoot"></div>
			</div>
		</div>
	</div>
			<?php include("template/main/footer.php"); ?>
</body>
</html>