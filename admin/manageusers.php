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

//CHECK ADMIN LEVELS
if ($loggedadmin >= 100) {
						
						$user = $_GET["user"];
							if (isset($user)) {
								$sql = "SELECT * FROM user WHERE username = '$user'";
								$result = $db_conn->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
										$prevpoints = $row["points"];
										$points = number_format($row['points']);
										echo 	"<center><div class='custom-container'>" . 
													$row["id"] . 
												"</div>
												<div class='custom-container'>" . 
													"<a href='http://felvargs.com/adminsystem/manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . 
												"</div><br />";
										echo 	"<div class='custom-container'><b>Admin Level:</b> " . $row["admin"] . "</div><br/>";
										echo 	"<div class='custom-container'><b>points:</b> " . $points . "</div><br/>";
									}
								
												?>
												<div class="panel panel-default">
													<div class="panel-heading" style="text-align: center;">
														<h2>Content</h2>
													</div>
													<div class='panel-body'>
													<center>
													<?php
													$user = $_GET["user"];
													$sql1 = "SELECT * FROM uploads WHERE owner = '$user' ORDER BY id DESC";
													$result1 = $db_conn->query($sql1);
													if ($result1->num_rows > 0) {
														// output data of each row
														while ($row1 = $result1->fetch_assoc()) {
																	echo "<div class='custom-container' style='text-align:center;'>
																		 <a href='itemedit.php?user=".$user."&id=".$row1['id']."'><img src='../".$row1["image"]."'title='".$row1["name"]."' style='width: 100px;'></a><br />".
																		 $row1['title']."</div> ";
														}
													}
													?>
													</center>
													</div>
												</div>

								        		<div class="panel panel-default">
								        		<div class="panel-heading" style="text-align: center;">
													<h2>Edit Points</h2>
												</div> <center>
												<div class="panel-body">
								        		<form role="form" action="#" method="post">
													<b>points</b>: <textarea style="height:20px; width:100px;" name="points" value="points" /><?php echo $points; ?></textarea><hr>
													<button type="submit" class="btn btn-default">submit items</button>
												</form></div></div>
												<?php

												$points = $_POST['points'];
												$points = str_replace(',','', $points);
												if ($_SERVER['REQUEST_METHOD'] = $_POST AND isset($_POST['points'])) {
													$insert = "UPDATE user SET points = '$points' WHERE username = '$user' ";
													
													//ADMIN LOGGER FOR ITEMS
													$session = $_SESSION['login_user'];
													$pointupdate = "from: ".$prevpoints."<br/>to: ".$points;
													$time = date("Y/m/d - h:i:sa");
														$insertlog = "INSERT INTO adminlogger (username, action, user, previous, changes, points, timeadded)
														VALUES ('$session', 'point update', '$user', '$prevpoints', '$pointupdate', '$pointupdate', '$time')";

													if ($db_conn->query($insert) === TRUE) {
													    echo "<br />Items Successfully Updated";
													}
													if ($db_conn->query($insertlog) === TRUE) {
													    echo "<br />Log Successfully Updated";
													}
												}
											?>
												
								   		<!-- ACHIEVEMENTS -->
												<div class="panel panel-default">
													<div class="panel-heading" style="text-align: center;">
														<h2>Achievements</h2>
														</div> <center>
												<?php
												$sql1 = "SELECT * FROM playerachievement WHERE username = '$user'";
												$result1 = $db_conn->query($sql1);
												if ($result1->num_rows > 0) {
												    // output data of each row
												    while ($row1 = $result1->fetch_assoc()) {
												    	$achid = $row1['achievement'];
														$sql2 = "SELECT * FROM achievements WHERE id = '$achid'";
														$result2 = $db_conn->query($sql2);
														if ($result2->num_rows > 0) {
													    		while($row2 = $result2->fetch_assoc()) {
															    	echo "<img src='".$row2["image"]."'title='".$row2["achievementname"]."'</img>";
															    }
														}
													}
												}
											?>
												</div></div></center>
										<?php
								    //Add Achivement
									if ($loggedadmin >= 600) {
										 ?>
										<div class="panel panel-default">
										 <div class="panel-heading" style="text-align: center;">
										  <h2>Add Achievement</h2>
										  </div> <center>
										  <div class="panel-body">
											<form role="form" action="#" method="post">
												Username:<br />
												<select name="achievement">
													<option value="0">None</option>
												    <option value="1">Master Tracker</option>
												    <option value="2">Master Fisher</option>
												    <option value="3">Berry Funny</option>
												    <option value="4">Lore Galore</option>
												    <option value="5">You had One Job</option>
												    <option value="6">Luck</option>
												    <option value="7">Battleground Warrior</option>
												    <option value="8">Loner</option>
												    <option value="9">Every Slot Matters</option>
												    <option value="10">Well That happened</option>
												    <option value="11">Star Player</option>
												    <option value="12">Achievement Warrior</option>
												    <option value="13">Honor Ones Elders</option>
												    <option value="14">Bloodline</option>
												    <option value="15">Crazy Cat Wolf</option>
												    <option value="16">The Butcher</option>
												    <option value="17">Traited Up</option>
												    <option value="18">Is That Even Possible</option>
												    <option value="19">Stick that in your pipe and smoke it</option>
												    <option value="20">Freyjas Gratitude</option>
												    <option value="21">Personal Pack</option>
												    <option value="22">Veteran</option>
												    <option value="23">On Second Thought</option>
												    <option value="24">Traveler</option>
												    <option value="25">There can be only one</option>
												    <option value="26">Loot Junky</option>
												    <option value="27">Mighty Trait Tracker</option>
												    <option value="28">Beast Taming Master</option>
												</select>
												<br /><br />
												<button type="submit" class="btn btn-default">Add Achievement</button>
												</form>
												
										  </div> </center>
										  </div>
												<?php

										$achievement = $_POST['achievement'];
										if ($_SERVER['REQUEST_METHOD'] = $_POST AND $achievement >= 1) {
											
											$insert = "INSERT INTO playerachievement (username, achievement) VALUES ('$user', '$achievement')";
											
											if ($db_conn->query($insert) === TRUE) {
											    echo "<br />Achievement added successfully";
											    echo "<script type='text/javascript'>window.top.location='manageusers.php?user=$user';</script>"; exit;
											} else {
											    echo "Error: " . $insert . "<br>" . $db_conn->error;
											}
										} 
									}
									else {
										echo "<br />
												<div class='container'><b>Update Password:</b> 
													You do not have access to edit usernames
												</div>";
									}

								    //CHANGE USER Name
									if ($loggedadmin >= 600) {
										echo "<div class='panel panel-default'><div class='panel-heading' style='text-align: center;'>
													  <h2>Update Username</h2>
													  </div> <center>
													  <div class='panel-body'>";
										echo 	"<form role='form' action='#' method='post'>
													Username:<br />
													<input type='text' name='username' />
													<br /><br />
													<button type='submit' class='btn btn-default'>Update Username</button>
													</form>
												</div></div>";

										if ($_SERVER['REQUEST_METHOD'] = $_POST AND isset($_POST['username'])) {
											$username = $_POST['username'];
											$insert = "UPDATE user SET username = '$username' WHERE username = '$user' ";
											$insert2 = "UPDATE playeritems SET owner = '$username' WHERE owner = '$user' ";
											$insert3 = "UPDATE playerachievement SET username = '$username' WHERE username = '$user' ";
											$insert4 = "UPDATE felvargs SET owner = '$username' WHERE owner = '$user' ";

									//ADMIN LOGGER FOR USERNAME UPDATE
											$session = $_SESSION['login_user'];
											$userupdate = "from: ".$user."<br/>to: ".$username;
											$time = date("Y/m/d - h:i:sa");
												$insertlog = "INSERT INTO adminlogger (username, action, user, previous, changes, timeadded)
												VALUES ('$session', 'Username Change', '$username', '$user', '$username', '$time')";

											if ($db_conn->query($insertlog) === TRUE) {
											    echo "<br />Log Successfully Updated";
											}
											if ($db_conn->query($insert) === TRUE) {
												echo "<br />Username Successfully Updated";
												$user = $username;
											}if ($db_conn->query($insert2) === TRUE) {
												echo "<br />Username Successfully Updated";
												$user = $username;
											}if ($db_conn->query($insert3) === TRUE) {
												echo "<br />Username Successfully Updated";
												$user = $username;
											}if ($db_conn->query($insert4) === TRUE) {
												echo "<br />Username Successfully Updated";
												$user = $username;
											} else {
												echo "Error: " . $insert . "<br>" . $db_conn->error;
											}
										} 
									}
									else {
										echo "<br />
												<div class='container'><b>Update Password:</b> 
													You do not have access to edit usernames
												</div>";
									}

								    //CHANGE USER PASSWORD
									if ($loggedadmin >= 800) {
										echo "<div class='panel panel-default'><div class='panel-heading' style='text-align: center;'>
													  <h2>Update Password</h2>
													  </div> <center>
													  <div class='panel-body'>";
										echo 	"<form role='form' action='#' method='post'>
													Password:<br />
													<input type='text' name='password' />
													<br /><br />
													<button type='submit' class='btn btn-default'>Update Password</button>
													</form>
												</div></div>";

										$password = hash('sha512', isset($_POST['password']) ? $_POST['password'] : '');
										if ($_SERVER['REQUEST_METHOD'] = $_POST AND isset($_POST['password'])) {
											$insert = "UPDATE user SET password = '$password' WHERE username = '$user' ";
											
											if ($db_conn->query($insert) === TRUE) {
												echo "<br />Password Successfully Updated";
											} else {
												echo "Error: " . $insert . "<br>" . $db_conn->error;
											}
										} 
									}
									else {
										echo "<br />
												<div class='container'><b>Update Password:</b> 
													You do not have access to edit passwords
												</div>";
									}

									//UPDATE ADMIN LEVEL
									if ($loggedadmin >= 900) {
										echo "<div class='panel panel-default'><div class='panel-heading' style='text-align: center;'>
													  <h2>Update Admin Access</h2>
													  </div> <center>
													  <div class='panel-body'>";
										echo 	"Creator = 900, Guardian = 800, Admin = 700, Trial Admin = 600.
													<hr />
													<form role='form' action='#' method='post'>
													Access Level:<br />
													<input type='text' name='adminlevel' />
													<br /><br />
													<button type='submit' class='btn btn-default'>Update Admin Level</button>
													</form>
												</div></div>";

										$adminlevel = $_POST['adminlevel'];
										if ($_SERVER['REQUEST_METHOD'] = $_POST AND isset($_POST['adminlevel'])) {
											$insert = "UPDATE user SET admin = '$adminlevel' WHERE username = '$user' ";
											
											if ($db_conn->query($insert) === TRUE) {
												echo "<br />Admin Level Successfully Updated";
											} else {
												echo "Error: " . $insert . "<br>" . $db_conn->error;
											}
										} 
									}
									else {
										echo "<br />
												<div class='container'><b>Update Admin Level:</b> 
													You do not have access to edit Admin Levels
												</div>";
									}

									//REFRESH PAGE ADTER CHANGES MADE
									if ($_SERVER['REQUEST_METHOD'] = $_POST) {
										echo "<script type='text/javascript'>window.top.location='manageusers.php?user=$user';</script>"; exit;
									}

								} else {
									echo "There is no ".$user ." on record";
								}
							} else {
								echo "<br/ ><div class='container' style='font-size: 25px;'>";
						echo "<a href='http://felvargs.com/adminsystem/manageusers.php?us="; echo $user."&search=0-9'>0-9</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=A'>A</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=B'>B</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=C'>C</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=D'>D</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=E'>E</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=F'>F</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=G'>G</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=H'>H</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=I'>I</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=J'>J</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=K'>K</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=L'>L</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=M'>M</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=N'>N</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=O'>O</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=P'>P</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=Q'>Q</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=R'>R</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=S'>S</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=T'>T</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=U'>U</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=V'>V</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=W'>W</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=X'>X</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=Y'>Y</a>";
						echo " - <a href='manageusers.php?us="; echo $user."&search=Z'>Z</a>";
						echo "</div>";
						echo "</br></br>";
						if ($_GET['search'] == "0-9")
						{
							echo "<b>0-9</b></br>";
							$sql = "SELECT * FROM user WHERE username REGEXP '^[0-9]' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						if ($_GET['search'] == "A")
						{
							echo "<b>A</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'A%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "B")
						{
							echo "<b>B</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'B%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "C")
						{
							echo "<b>C</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'C%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "D")
						{
							echo "<b>D</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'D%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "E")
						{
							echo "<b>E</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'E%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "F")
						{
							echo "<b>F</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'F%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "G")
						{
							echo "<b>G</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'G%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "H")
						{
							echo "<b>H</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'H%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "I")
						{
							echo "<b>I</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'I%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "J")
						{
							echo "<b>J</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'J%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "K")
						{
							echo "<b>K</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'K%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "L")
						{
							echo "<b>L</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'L%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "M")
						{
							echo "<b>M</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'M%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "N")
						{
							echo "<b>N</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'N%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "O")
						{
							echo "<b>O</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'O%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "P")
						{
							echo "<b>P</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'P%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "Q")
						{
							echo "<b>Q</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'Q%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "R")
						{
							echo "<b>R</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'R%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "S")
						{
							echo "<b>S</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'S%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "T")
						{
							echo "<b>T</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'T%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "U")
						{
							echo "<b>U</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'U%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "V")
						{
							echo "<b>V</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'V%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "W")
						{
							echo "<b>W</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'W%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "X")
						{
							echo "<b>X</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'X%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "Y")
						{
							echo "<b>Y</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'Y%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}
						elseif ($_GET['search'] == "Z")
						{
							echo "<b>Z</b></br>";
							$sql = "SELECT * FROM user WHERE username LIKE 'Z%' ORDER BY username";
									$result = $db_conn->query($sql);
									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									        echo "<div class='custom-container'>" . "<a href='manageusers.php?user=".$row["username"]."'>".$row["username"]."</a>" . "</div> ";
									    }
									}
						}

								    

								    	//ADD USER
								    if ($loggedadmin >= 600) {
								    	echo "<br/><br/><div class='panel panel-default'><div class='panel-heading' style='text-align: center;'>
													  <h2>Create User</h2>
													  </div> <center>
													  <div class='panel-body'>";
										echo 	"<form role='form' action='#' method='post'>
														Username:<br />
														<input type='text' name='create' />
														<br /><br />
														<button type='submit' class='btn btn-default'>Create User</button>
														</form>
												</div></div></center>";

										//CREATE USER
										$createuser = $_POST['create'];
										if ($_SERVER['REQUEST_METHOD'] = $_POST) {
											$insert = "INSERT INTO user (username, password, admin) VALUES ('$createuser', 'LOSTFABLES', '0')";

									//ADMIN LOGGER FOR USERNAME UPDATE
										$session = $_SESSION['login_user'];
										$time = date("Y/m/d - h:i:sa");
											$insertlog = "INSERT INTO adminlogger (username, action, user, previous, changes, timeadded)
											VALUES ('$session', 'User Created', '$username', 'User Created', '$createuser', '$time')";

										if ($db_conn->query($insertlog) === TRUE) {
										    echo "<br />Log Successfully Updated";
										}
											
											if ($db_conn->query($insert) === TRUE) {
											    echo "<br />New User created successfully";
											    echo "<script type='text/javascript'>window.top.location='manageusers.php';</script>"; exit;
											} else {
											    echo "Error: " . $insert . "<br>" . $db_conn->error;
											}
										}
								    
								} else {
								    echo "<br />
								        		<div class='container'><b>Create User:</b> 
								        			You do not have access to add new users
											</div>";
								}
							}

							
} //Admin Level Checks
						
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>