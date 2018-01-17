<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<?php include(PATH_PHP.'head.php'); ?>
<body>
	<!-- Top Bar -->
	<?php include(PATH_PHP.'topnavbar.php'); ?>

	<!-- Main -->
	<?php
		if ($_whereAmI==='item') {
			include(PATH_PHP.'item.php');
		} else {
			include(PATH_PHP.'home.php');
		}
	?>

	<!-- Footer -->
	<?php include(PATH_PHP.'footer.php'); ?>

	<!-- Javascript stuff -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>