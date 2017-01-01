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
<?php if (!isset($_SESSION['login_user'])) {
	header("Location: index.php");
	exit; } else { ?>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<br />
				<h1>Submit</h1>
			<div class="row">
				<br />
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<form action="upload.php" method="POST" enctype="multipart/form-data">
						<span>Title: <input type="text" name="title" id="title" /></span>
						<hr />
						<span>Category:
						<select name="category" id="category">
						  <option value="Short Story">Short Story</option>
						  <option value="Novel">Novel</option>
						  <option value="Poem">Poem</option>
						  <option value="Artwork">Artwork</option>
						  <option value="Contest">Contest</option>
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
						<span><textarea rows="8" cols="90" name="content" id="content"></textarea></span>
						<hr />
						<p>Choose artwork or your story 'Cover-Art' if applicable</p>
						<span><input type="file" name="fileToUpload" id="fileToUpload" style="color: white;"></span>

						<span><input type="submit" value="Submit" name="submit"></span>
					</form>
					</div>
					<div class="col-sm-2">
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
