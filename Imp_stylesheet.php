<?php
	header("Content-type: text/css");
?>

html
{
	background-image: url("images/Imperial/Login_Background.png");
	background-repeat: no-repeat;
	background-size: 100% 1080;
	margin: 0 auto;
}

h1
{
	font-size: 64px;
	font-family: Calibri;
	font-weight: bold;
	text-align: center;
	margin: 64px;
}

.btn-login
{
	padding: 15px 25px;
	color: white;
	background-color: #2ECC71;
}

.container1
{
	width: 500px;
	height: 400px;
	text-align: center;
	background-color: rgba(52,73,94,0.7);
	margin: 0 auto;
	margin-top: 128px;
}

.container1 img
{
	margin-top: -64px;
}

.container1 input
{
	width: 300px;
	height: 45px;
	font-size: 18px;
	background-color: #FFF;
	margin-bottom: 20px;
	padding-left: 35px;
}

.form_input::before
{
	content: "\f007";
	position: absolute;
	font-family: "FontAwesome";
	padding-left: 5px;
	color: #9B59B6;
	padding-top: 7px;
	font-size: 35px;
}

.form_input:last-child::before
{
	content: "\f023";
}
.form_inputpass::before
{
	content: "\f023";
	position: absolute;
	font-family: "FontAwesome";
	padding-left: 5px;
	color: #9B59B6;
	padding-top: 7px;
	font-size: 35px;
}

.btn-login
{
	width: 164px !important;
	color: white;
	border: none;
	margin: 0 auto;
	text-align: center;
	padding: 15px 25px !important;
    background-color: #2ECC71 !important;
}