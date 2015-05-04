<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
  session_start();
?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Authentication example</title>
</head>
<body>
  <?php
  	if(!empty($_SESSION['auth'])){
  		?>
		  <h1>Hello, <?php echo $_SESSION['auth']['name'] ?>!</h1>
	  	<a href="index2.php">Index page</a><br>
		  <a href="exit.php">Exit page</a><br>
		  <h3>
		  	Role: <?php echo $_SESSION['auth']['role']; ?>
		  </h3>
  		<?php
  	}
  	else{
  		?>
  		<h1>Authentication is needed</h1>
	  	<a href="index2.php">Index page</a><br>
	  	<a href="login.php">Login page</a><br>
	  	<a href="exit.php">Exit page</a><br>
  		<?php
  	}
  ?>
</body>
</html>