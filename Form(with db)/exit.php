<?php
	//Turn on all errors
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
  // Initialize session for this request.
  session_start();
  // Delete important session data - not all array, but only auth element!!!
  unset($_SESSION['auth']);
  // Forward user to main page
  header('Location: index2.php');
  exit();