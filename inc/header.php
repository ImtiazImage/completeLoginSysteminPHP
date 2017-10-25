<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="loginpro.php">HOME</a></li>
			</ul>
			<div class="nav-login">
				<form action="index.php" method="POST">
					<input type="text" name="u_uid" placeholder="Username/e-mail" />
					<input type="password" name="user_pass" placeholder="Password" />
					<button type="submit" name="submit">Login</button>
				</form>
				<a href="signup.php">Sign up</a>
			</div>
		</div>		
	</nav>
</header>

