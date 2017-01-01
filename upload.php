<?php
include("template/main/session.php");
//include 'template/aside.php'; 

$name = $_POST['title'];
$name = str_replace(" ", "_", $name);

if (isset($_POST['mature'])) {
	$mature = 1;
} else {
	$mature = 0;
}

$sql = "SELECT * FROM uploads ORDER BY id DESC LIMIT 1";
    $result = $db_conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        $nextid = 1 + $row['id'];
        }
    }
if (!empty($_FILES["fileToUpload"]["name"])) {
	$target_dir = "images/uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	// if (file_exists($target_file)) {
	// 	echo "Sorry, file already exists.";
	// 	$uploadOk = 0;
	// }
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		$title = mysqli_real_escape_string($db_conn, $_POST['title']);
		$category = mysqli_real_escape_string($db_conn, $_POST['category']);
		$genre = mysqli_real_escape_string($db_conn, $_POST['genre']);
		$content = mysqli_real_escape_string($db_conn, $_POST['content']);
		$imageid = $name."_".$nextid;
		$image = "images/uploads/".$imageid.".".$imageFileType;
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$name."_".$nextid.".".$imageFileType)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			
			//$image = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$insert = "INSERT INTO uploads (owner, title, category, genre, content, image) VALUES ('$login_session', '$title', '$category', '$genre', '$content', '$image')";

			if ($db_conn->query($insert) === TRUE) {
				echo "<br />Sucessfully added to Database ".$image;
				echo "<script type='text/javascript'>window.top.location='profile.php';</script>"; exit;
			} else {
				echo "Error: " . $insert . "<br>" . $db_conn->error;
			}
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
} else {
	$title = mysqli_real_escape_string($db_conn, $_POST['title']);
	$category = mysqli_real_escape_string($db_conn, $_POST['category']);
	$genre = mysqli_real_escape_string($db_conn, $_POST['genre']);
	$content = mysqli_real_escape_string($db_conn, $_POST['content']);
	$imageid = $title."_".$nextid;
	$image = "images/uploads/".$imageid.".png";

		$insert = "INSERT INTO uploads (owner, title, category, genre, content) VALUES ('$login_session', '$title', '$category', '$genre', '$content')";

	if ($db_conn->query($insert) === TRUE) {
		echo "<br />Sucessfully added to Database ".$image;
		echo "<script type='text/javascript'>window.top.location='profile.php';</script>"; exit;
	} else {
		echo "Error: " . $insert . "<br>" . $db_conn->error;
	}
}

?>
						