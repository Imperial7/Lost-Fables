<?php
	include('config.php');
	session_start();
	
	$user_check = $_SESSION['login_user'];
	
	$ses_sql = mysqli_query($db_conn,"select username from user where username = '$user_check' ");
	
	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
	
	$login_session = $row['username'];
	
	if(!isset($_SESSION['login_user'])){
		echo "<script type='text/javascript'>window.top.location='http://felvargs.com/adminsystem/login.php';</script>"; exit;
	}
?>