<?php
include 'lib/Database.php';

$db = new Database();


if (isset($_POST['submit'])) {
	$u_id 	= mysqli_real_escape_string($db->link, $_POST['u_uid']);
	$u_pass = mysqli_real_escape_string($db->link, $_POST['user_pass']);



		$queryc = "SELECT * FROM users WHERE user_username='$u_id' OR user_email='$u_id'";
		$result = $db->select($queryc);
		$checkResult = mysqli_num_rows($result);

		if($checkResult < 1){
			header("Location: index.php?login=error");
			exit();	
		} else {
			if ($read = $result->fetch_assoc()) {
				$pass = md5($u_pass);
				if (!$pass == $read['user_pass']) {
					header("Location: index.php?login=error");
					exit();
				} else if ($pass == $read['user_pass']){
					$_SESSION['u_id'] = $read['	user_id'];
					$_SESSION['u_fname'] = $read['	user_first'];
					$_SESSION['u_lname'] = $read['	user_last'];
					$_SESSION['u_email'] = $read['	user_email'];
					$_SESSION['u_username'] = $read['	user_username'];

						header("Location: index.php?login=success!!!");
						exit();
				}
			}
		}

} 

?>

<?php include_once 'inc/header.php'; ?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>HOME</h2>
		<?php if (isset($_SESSION['u_id'])) {
			echo "You Are Logged in!!!";
		}?>
	</div>
</section>


<?php include_once 'inc/footer.php'; ?>