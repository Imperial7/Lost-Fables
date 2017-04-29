<?php
if (isset($login_session)) {
	$sql1 = "SELECT * FROM `notification` WHERE `owner` = '$login_session' AND `read` = '0'";
		if ($result=mysqli_query($db_conn,$sql1)) {
			$num = $result->num_rows;
		}

?>
	<div class="container">
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="test.php"><img src="template/main/images/lostfables_icon.png" style="margin-top: -19px;"></a>
		    </div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						
						<li><a href="test.php">Browse</a></li>
						<li><a href="news.php">News</a></li>
						<li><a href="submit.php">submit</a></li>
						<li><a href="groups.php">Browse Groups</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Content <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="groups.php">Groups</a></li>
								<li><a href="">Another action</a></li>
								<li><a href="">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="">Separated link</a></li>
								<li class="divider"></li>
								<li><a href="https://trello.com/b/ZyEGUH6z/lost-fables-roadmap" target="_blank">Roadmap</a></li>
							</ul>
						</li>
					</ul>
					<!-- <form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
						</form> -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						<?php if ($num > 0) { ?>
						<a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bell-o fa-1x" aria-hidden="true"><div class="notification"><?php echo $num; ?></div></i><span class="caret"></span></a>
						<?php } else { ?>
						<a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bell-o fa-1x" aria-hidden="true"></i><span class="caret"></span></a>
						<?php } ?>
						<ul class="dropdown-menu" style="min-width: 200px; max-height: 500px; overflow-y: scroll;" role="menu">
							<?php
							$sql = "SELECT * FROM `notification` WHERE `owner` = '$login_session' AND `read` = '0' ORDER BY `id` DESC";
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
							?>
							<li class="divider"></li>
								<li><a href="notifications.php">Read all notifications</a></li>
						</ul>
						<li class="dropdown">
							<a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false"><img src="<?php echo $profileimage; ?>" style="margin-top: -11px; margin-bottom: -11px; max-width: 50px; max-height: 50px;"></a>
							<ul class="dropdown-menu" role="menu">
								<li><h2 style="font-size: 20px; padding-left: 20px"><?php echo $login_session; ?></h2"></li>
								<li><a href="profile.php">Profile</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="settings.php">Settings</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</li>
					</ul>
					
				</div>
			</div>
		</nav>
	</div>
<?php
} else {
?>
	<link rel="stylesheet" type="text/css"
	      href="https://fonts.googleapis.com/css?family=Great+Vibes|Cinzel+Decorative">
	<div class="container">
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="test.php"><img src="template/main/images/lostfables_icon.png" style="margin-top: -19px;"></a>
		    </div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="test.php">Browse</a></li>
						<li><a href="news.php">News</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="">Action</a></li>
								<li><a href="">Another action</a></li>
								<li><a href="">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="">Separated link</a></li>
								<li class="divider"></li>
								<li><a href="https://trello.com/b/ZyEGUH6z/lost-fables-roadmap" target="_blank">Roadmap</a></li>
							</ul>
						</li>
					</ul>
					<!-- <form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
						</form> -->
					<ul class="nav navbar-nav navbar-right">
						<li><a href="register.php">Register</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Login <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<form action="login.php" method="POST">
									<span>Username: <input type="text" value="" name="name" id="name" /></span>
									<span>Password: <input type="password" value="" name="password" id="password" /></span>

									<span><input type="submit" value="Submit" name="submit"></span>
								</form>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
<?php
}
?>