<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="src/jquery2.js"></script>
	<script type="text/javascript">

	</script>
	<title>Sign in to City Center Hospital Management System</title>
</head>
<style type="text/css">
@font-face {
  font-family: 'OpenSans';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'), url(fonts/DXI1ORHCpsQm3Vp6mXoaTXhCUOGz7vYGh680lGh-uXM.woff) format('woff');
}
@font-face {
  font-family: 'OpenSansRegular';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(fonts/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
}
body{
	font-family: 'OpenSansRegular';
	color: #000;
	padding: 0;
	margin: 0;
	background: #fff url('./img/bg.jpg');
	background-size: cover;
}
div#signin{
	color: #fff;
	background: rgba(0,0,0,0.8);
	padding: 40px 60px;
	width:400px;
	height: 100%;
	position: relative;
	margin: 50px auto;
	border-radius: 4px;
}
h1,h2{
	font-weight: 100;
	padding: 0;
	margin: 0;
}
h1{
	font-size: 18pt;
}
h2{
	margin-bottom: 20px;
	color: #629f2f;
	font-size: 13pt;
}
input{
	font-family: 'OpenSansRegular';
	font-size: 13pt;
	padding:5px;
	margin:10px;
	margin-top: 4px;
	margin-left: 0;
	border: none;
	width: 100%;
	font-family: 
}
input[type=text], input[type=password]{
/*	width: 375px;*/
	border-radius: 2px;
}
input[type=submit]{
	margin-top: 10px;
	padding: 15px;
	color: #fff;
	background: #66a81f;
	border-radius: 2px;
	transition: all .3s;
}
input:focus{
	box-shadow: 0 0 10px 1px rgba(20,255,20,0.9);
	border-color: rgba(20,255,20,0.9);
}
hr{
	border: none;
	border-top: solid rgba(255,255,255,0.4) thin;
	padding: 10px;
}
span{
	color: #fff;
	background: #f25;
	padding: 10px 0;
	text-align: center;
	display: block;
	width: 100%;
	border-radius: 10px;
	margin-bottom: 10px;
}
</style>
<body>
	<div id="signin">
		<img src="img/icon.png" alt="" height="70" align="left" style="margin-right:20px;">
		<h1>Welcome to City Hospital</h1>
		<h2>Hospital Management Sytsem</h2>
		<br>
		<hr>
		<span id="error">invalid credentials try again!</span>
		<form id="signinForm" action="index.php">
			Username<br>
			<input id="username" type="text" required/><br>
			Password<br>
			<input id="password" type="password" required/><br>
			<input type="submit" onclick="" value="Sign in" />
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#error").hide();
		});
		$("#signinForm").submit(function(e){
			e.preventDefault();
			if($("#username").val() == "user0001"){
					
				// window.location.replace("index.php");
				$.ajax({
				  method: "POST",
				  url: "check_login.php",
				  data: { 	loggedIn: 1
					}
				})
				  .done(function( msg ) {
					window.location.replace("index.php");
				  });
			} else {
				$("#error").show(100);
				$("#username").val('').focus();
				$("#password").val('');
			}

		});
		$("#username").keydown(function(){
			$("#error").hide(300).fadeOut();
		});
	</script>
</body>
</html>