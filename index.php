<?php
	define('BLUDIT', true);
	include('config.php');
?>
<!DOCTYPE html>
<html>
<?php include(PATH_HTML.'head.php'); ?>
<body>
	<!-- Top Bar -->
	<?php include(PATH_HTML.'topnavbar.php'); ?>

	<!-- Main -->
	<?php
		if ($_whereAmI==='item') {
			include(PATH_HTML.'item.php');
		} elseif ($_whereAmI==='author') {
			include(PATH_HTML.'author.php');
		} else {
			include(PATH_HTML.'home.php');
		}
	?>

	<!-- Footer -->
	<?php include(PATH_HTML.'footer.php'); ?>

	<!-- Javascript stuff -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

	<script>
	$(document).ready(function() {
		$("#search").on("keyup", function() {
			$("div.item").hide();
			var textToSearch = $(this).val().toLowerCase();
			$(".card-title, .card-description").each( function() {
				var element = $(this).text().toLowerCase();
				if (element.indexOf(textToSearch)!=-1) {
					$(this).parent().parent().parent().show();
				}
			});
		});

		$(".item-screenshot").on("error", function(){
			$(this).attr("src", "<?php echo SCREENSHOT_DEFAULT ?>");
		});
	});
	</script>

</body>
</html>