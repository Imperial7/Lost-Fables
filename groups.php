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

	<div class="container">

		<div class="custom-profilecontainer">

			<div class="row">

				<div class="custom-profilehead"></div>

				<br />

				<h1>Groups</h1>

			</div>

			<div class="row">

				<br />

				<div class="col-sm-14">
				<center>
				<a href="creategroup.php">Create Group</a>
				</center>
				</div>

				<div class="col-sm-10">

				<h2 style="text-align: center;">Group List</h2>

				<?php

						$sql = "SELECT * FROM `group` ORDER BY `gid` DESC LIMIT 50";

							$result = $db_conn->query($sql);

							if ($result->num_rows > 0) {

								// output data of each row

								while($row = $result->fetch_assoc()) {

								$id = $row['gid'];

								$owner = $row['groupowner'];

								$title = $row['groupname'];

								$image = $row['groupimage'];

								echo "<div class=\"custom-container\" style=\"display: inline-block; width: 160px; height: 200px; \"><center><span>".

									 "<a href=\"group.php?group=".$title."&item=".$id."\"><img src=\"".$image."\" style=\"max-width: 150px; max-height: 150px;\"></a>".

									 "</span><span>".

									 $title.

									 "</span></center></div>";

								}

							}

					?>

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