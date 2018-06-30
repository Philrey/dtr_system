<<<<<<< HEAD
<?php
	include("functions.php");
?>
<!DOCTYPE html>
<html>
	<header>
		<title>DTR System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</header>
	
	<div>
		<h2>DTR System v1.0</h2>
		
		<form method="POST" action="">
			<input type="text" name="uPin" placeholder="Enter User Pin">
			<button type="submit" name="submit" value="timeIn">TIME IN</button>
		</form>
	</div>
</html>
||||||| merged common ancestors
<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
?>
Something is wrong with the XAMPP installation :-(
=======
<?php
	include("functions.php");
?>
<!DOCTYPE html>
<html>
	<header>
		<title>DTR System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</header>
	
	<div>
		<h2>DTR System v1.0</h2>
		
		<form method="POST" action="">
			<input type="text" name="uPin" placeholder="Enter User Pin">
			<button type="submit" name="submit" value="timeIn">TIME IN</button>
		</form>
	</div>
</html>
>>>>>>> added index
