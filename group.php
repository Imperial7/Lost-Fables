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

				<h2 style="text-align: center;">Group Information</h2>

				<?php
					$sql = "SELECT * FROM `group` WHERE `groupname` = '$groupname'";
							$result = $db_conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									$groupimage = $row['groupimage'];
									$groupowner = $row['groupowner'];
									$grouppremium = $row['grouppremium'];
									$description = $row['description'];

									?>
									<div class="custom-container" style="display: inline-block; width: 160px; height: 200px; "><center><span> 

										<?php
										echo "<a href=\"group.php?group=".$groupname."\"><img src=\"".$groupimage."\" style=\"max-width: 150px; max-height: 150px;\"></a><br/> <b>Owner:</b> ".$groupowner;
										?>
										 </span></center></div>
										<div class="custom-container" style="display: inline;">
										<?php echo $description; ?>
										</div>
									<?php
								}
							}
							?>

					<!-- JOIN GROUP -->
							<?php
								$sql = "SELECT * FROM `usergroup` WHERE `membername` = '$login_session' AND `groupname` = '$groupname'";
								$result = $db_conn->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {

							?>
											<span><div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Joined! <span class="caret"></span></button>
											  <ul class="dropdown-menu">
											  	<form action="" method="POST">
													<span><input type="submit" class="btn btn-danger" id="Leave Group" value="Leave Group" name="submit"></span>
												</form>
											  </ul>
											</div></span>
							<?php
										if($_SERVER['REQUEST_METHOD'] == 'POST') {
											if($_POST['submit'] == 'Leave Group') {
												$delete = "DELETE FROM `usergroup` WHERE `membername` = '$login_session' AND `groupname` = '$groupname'";
												if ($db_conn->query($delete) === TRUE) {
																echo "<br />Sucessfully removed from Database ";
							?>
												<script type="text/javascript">location.reload();</script>
							<?php
												}
											}
											
				
										} else {}
									}

								} else {
									
							?>
										<form action='' method='POST'>
										<span><input type="submit" class="btn btn-warning" id="Join Group" value="Join Group" name="submit"></span>
										</form>
									
							<?php
										if($_SERVER['REQUEST_METHOD'] == 'POST') {
											if($_POST['submit'] == 'Join Group') {
												$insert = "INSERT INTO `usergroup` (`membername`, `groupname`, `memberrank`, `approved`)
													VALUES ('" . $login_session . "','" . $groupname . "', 'Member', '1');";
												if ($db_conn->query($insert) === TRUE) {
													echo "<br />Sucessfully added to Database ".$image;
							?>
													<script type="text/javascript">location.reload();</script>
							<?php
												}
											}
										}
								}

							?>
							
							<h2 style="text-align: center;">Group Members</h2>
							<?php
						$sql = "SELECT * FROM `usergroup` WHERE `groupname` = '$groupname' AND `approved` = '1'";
						$result = $db_conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								$membername = $row['membername'];
								$memberrank = $row['memberrank'];

								$sql2 = "SELECT * FROM `user` WHERE `username` = '$membername'";
								$result2 = $db_conn->query($sql2);
								if ($result2->num_rows > 0) {
									// output data of each row
									while($row2 = $result2->fetch_assoc()) {
										$username = $row2['username'];
										$profileimage = $row2['profileimage'];

										?>
									
										<div class="custom-container" style="display: inline-block; width: 160px; height: 200px; "><center><span> 

										<?php
										echo "<a href=\"profile.php?user=".$username."\"><img src=\"".$profileimage."\" style=\"max-width: 150px; max-height: 150px;\"></a><br/>";
										echo "<b>" . $username . "</b><br/>";
										echo $memberrank;
										?>
										 </span></center></div>
						<?php
									}
								}
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