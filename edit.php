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
				<h1>Lost Fables</h1>
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
				<?php
					$user = $_GET['user'];
					$item = $_GET['item'];
					$sql = "SELECT * FROM `uploads` WHERE `owner` = '$user' AND `id` = '$item' ORDER BY `id` DESC LIMIT 1";
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

								if ($user == $login_session) {
									?>
									<form method="POST">
										<span>Title: <input type="text" name="title" id="title" value="<?php echo $title ? $title : ''; ?>"/></span>
										<hr />
										<span>Category:
										<select name="category" id="category">
										  <option value="Short Story">Short Story</option>
										  <option value="Novel">Novel</option>
										  <option value="Poem">Poem</option>
										  <option value="Artwork">Artwork</option>
										</select></span>
										<span>Genre:
										<select name="genre" id="genre">
										  <option value="Action">Action</option>
										  <option value="Adventure">Adventure</option>
										  <option value="Comedy">Comedy</option>
										  <option value="Crime">Crime</option>
										  <option value="Drama">Drama</option>
										  <option value="Fable">Fable</option>
										  <option value="Fairy Tale">Fairy Tale</option>
										  <option value="Fantasy">Fantasy</option>
										  <option value="Fiction">Fiction</option>
										  <option value="Historical">Historical</option>
										  <option value="Horror">Horror</option>
										  <option value="Mystery">Mystery</option>
										  <option value="Non-fiction">Non-fiction</option>
										  <option value="Romance">Romance</option>
										  <option value="Sci-Fi">Sci-Fi</option>
										  <option value="Other">Other</option>

										</select></span>
										<hr />
										<p>Use of HTML is accepted</p>
										<span><textarea rows="8" cols="90" name="content" id="content"><?php echo $content; ?></textarea></span>
										<hr />

										<span><input type="submit" value="Submit" name="submit"></span>
									</form>
									<?php
									$title = mysqli_real_escape_string($db_conn, $_POST['title']);
									$image = mysqli_real_escape_string($db_conn, $_POST['image']);
									$category = mysqli_real_escape_string($db_conn, $_POST['category']);
									$genre = mysqli_real_escape_string($db_conn, $_POST['genre']);
									$content = mysqli_real_escape_string($db_conn, $_POST['content']);

									if('POST' === $_SERVER['REQUEST_METHOD']) {
										$insert = "UPDATE `uploads` SET `title` = '$title', `category` = '$category', `genre` = '$genre', `content` = '$content' WHERE `id` = '$item'";

										if($db_conn->query($insert)) {
									        echo "<script type='text/javascript'>window.top.location='profile.php?user=$user&item=$item';</script>"; exit;
									    } else {
									        echo "Error: " . $insert . "<br>" . $db_conn->error;
										}
									}
								}
								
							}
						}

				?>
				</div>
				<div class="col-sm-4">
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