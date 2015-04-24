<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
    session_start();

    if(!empty($_SESSION['auth']))
	{
		header("Location:profile.php");
		exit();
	}
	if(isset($_POST['submitButton']))
	{
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$notice = 'Wrong login-password.';
			$call= file("Users.csv");
			$numstrok = count ($call);
			for($icb=0; $icb<$numstrok; $icb++)
			{
				$cbpos = explode(";",$call[$icb]);
				if($cbpos[2] == $_POST['login'] && md5($cbpos[4]) == md5($_POST['password']))
				{
					$_SESSION['auth'] = array(
							'email'		=> $cbpos[2],
							'name'		=> $cbpos[0],
							'role'		=> $cbpos[5],
						);
					header('Location:profile.php');
					exit();
				}
			}
		}
	}
?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Authentication example</title>
  <style>
  	/* One width value for all labels - nice form view */
  	.form-line label{
  		display:inline-block;
  		width:150px;
  	}
  	.notice{
  		font-size:1.2em;
  		font-style:italic;
  	}
  </style>
</head>
<body>
	<form action="" method="POST">
		<?php
			// Some general notice(error) about form? Display it.
			if(!empty($notice)){
				echo '<div class="notice">'.$notice.'</div>';
			}
		?>
		<div class="form-line">
			<label for="login">E-mail</label>
			<?php /* Function htmlspecialchars is needed below for security reasons. Check out its description at php.net. */ ?>
			<input name="login" id="login" type="email" placeholder="email@example.com"<?php echo empty($_POST['login'])?'':' value="'.htmlspecialchars($_POST['login']).'"' ?>>
		</div>
		<div class="form-line">
			<label for="password">Password</label>
			<input name="password" id="password" type="password">
		</div>
		<input type="submit" name="submitButton" value="Login">
	</form>
</body>
</html>