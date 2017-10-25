<?php 
include 'inc/header.php'; 
include 'lib/Database.php';

$db = new Database();
?>

<?php
if (isset($_POST['submit'])) {

	$fname		=	mysqli_real_escape_string($db->link,$_POST['fname']);
	$lname		=	mysqli_real_escape_string($db->link,$_POST['lname']);
	$email		=	mysqli_real_escape_string($db->link,$_POST['email']);
	$username	=	mysqli_real_escape_string($db->link,$_POST['username']);
	$pass		=	mysqli_real_escape_string($db->link,$_POST['pass']);

	$cquery = "SELECT * FROM users WHERE user_username = '$username'";
	$result = $db->select($cquery);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0) {
	 	header("Location: signup.php?signup=usertaken");

	 	exit();
	} else {
		$password = md5($pass);
		$query = "INSERT INTO users (user_first, user_last, user_email, user_username, user_pass) 	
					values('$fname', '$lname', '$email', '$username', '$password')";
		$insert = $db->create($query);
	}


}
?>


<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>

		<form action="signup.php" method="POST" class="signup">
			<input type="text" name="fname" placeholder = "Firstname" required>
			<input type="text" name="lname" placeholder = "Lastname" required>
			<input type="text" name="email" placeholder = "E-mail" required>
			<input type="text" name="username" placeholder = "Username" required>
			<input type="password" name="pass" placeholder = "Password" required>
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
</section>


<?php include_once 'inc/footer.php'; ?>