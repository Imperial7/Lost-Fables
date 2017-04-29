<?php
include("template/main/session.php");
//include 'template/aside.php'; 

$name = $login_session;

$groupname = $_POST['groupname'];
$description = $_POST['description'];
$group = str_replace(" ", "_", $groupname);

if (!empty($_FILES["fileToUpload"]["name"])) {
	$target_dir = "images/groups/";
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
		$imageid = $group;
		$image = "images/groups/".$groupname.".png";
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$groupname.".".$imageFileType)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			
			//$image = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			if (empty($_POST['password'])) {
			$insert = "INSERT INTO `group` (`groupname`, `groupowner`, `description`, `groupimage`)
							VALUES ('" . $groupname . "', '" . $name . "', '" . $description . "', '" . $image . "');";
			$insert2 = "INSERT INTO `usergroup` (`membername`, `groupname`, `memberrank`, `approved`)
							VALUES ('" . $name . "','" . $groupname . "', 'Owner', '1');";
			} else {
				$insert = "INSERT INTO `group` (`groupname`, `groupowner`, `description`, `groupimage`)
							VALUES ('" . $groupname . "', '" . $name . "', '" . $description . "', '" . $image . "');";
				$insert2 = "INSERT INTO `usergroup` (`membername`, `groupname`, `memberrank`, `approved`)
							VALUES ('" . $name . "','" . $groupname . "', 'Owner', '1');";
			}
			
			if ($db_conn->query($insert) === TRUE) {
				echo "<br />Sucessfully added to Database ".$image;
			} else {
				echo "Error: " . $insert . "<br>" . $db_conn->error;
			}
			if ($db_conn->query($insert2) === TRUE) {
				echo "<br />Sucessfully added to Database ".$image;
				echo "<script type='text/javascript'>window.top.location='groups.php';</script>"; exit;
			} else {
				echo "Error: " . $insert2 . "<br>" . $db_conn->error;
			}
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
} else {
	$imageid = $title."_".$nextid;
	$image = "images/groups/".$imageid.".png";
		if (empty($_POST['password'])) {
			$insert = "INSERT INTO `group` (`groupname`, `groupowner`, `description`)
							VALUES ('" . $groupname . "', '" . $name . "', '" . $description . "','" . "');";
			$insert2 = "INSERT INTO `usergroup` (`membername`, `groupname`, `memberrank`, `approved`)
							VALUES ('" . $name . "','" . $groupname . "', 'Owner', '1');";
		} else {
			$insert = "INSERT INTO `group` (`groupname`, `groupowner`, `description`)
							VALUES ('" . $groupname . "', '" . $name . "', '" . $description . "','" . "');";
			$insert2 = "INSERT INTO `usergroup` (`membername`, `groupname`, `memberrank`, `approved`)
							VALUES ('" . $name . "','" . $groupname . "', 'Owner', '1');";
		}
	if ($db_conn->query($insert) === TRUE) {
		echo "<br />Sucessfully added to Database ".$image;
		echo "<script type='text/javascript'>window.top.location='groups.php';</script>"; exit;
	} else {
		echo "Error: " . $insert . "<br>" . $db_conn->error;
	}
	if ($db_conn->query($insert2) === TRUE) {
				echo "<br />Sucessfully added to Database ".$image;
				echo "<script type='text/javascript'>window.top.location='groups.php';</script>"; exit;
			} else {
				echo "Error: " . $insert . "<br>" . $db_conn->error;
			}
}

?>
						