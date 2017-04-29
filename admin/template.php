<?php 
	include("config.php");
	include('session.php');
	include("admincheck.php");
	   if ($loggedadmin >= 100) {
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	  <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Lost Fables Admin Panel</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	 <!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	 <!-- MORRIS CHART STYLES-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	 <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
		<!-- /. NAV SIDE  -->
	<?php include 'menu.php';
	?>
		<div id="page-wrapper" >
				<?php include("warning.php"); ?>
			<div id="page-inner">
				       
	</div>
			 <!-- /. PAGE INNER  -->
			</div>
		 <!-- /. PAGE WRAPPER  -->
		</div>
	 <!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	  <!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	 <!-- MORRIS CHART SCRIPTS -->
	 <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>
	  <!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>
	
   <?php } ?>
</body>
</html>
