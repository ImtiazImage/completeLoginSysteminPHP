

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