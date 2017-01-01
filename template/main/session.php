<?php
	include('config.php');
	session_start();
	
	$user_check = $_SESSION['login_user'];
	
	$ses_sql = mysqli_query($db_conn,"select * from user where username = '$user_check' ");
	
	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
	
	$login_session = $row['username'];
	$admin = $row['admin'];
	$profileimage = $row['profileimage'];
	
?>