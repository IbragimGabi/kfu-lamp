<?php
header('Content-Type: text/html; charset=utf-8');
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
   session_start();
	if(empty($_SESSION['auth'])||strnatcasecmp ( $_SESSION['auth']['role'] , 'user' )>0)
	{
		header("Location:index2.php");
		exit();
	}
?>
<!DOCTYPE html>
	
	<?php
	$call= file("Users.csv");
	$numstrok = count ($call);
	echo "<table border='1'>";
	echo "<tr> <td>Nick</td><td>Name</td><td>Email</td><td>Sex</td><td>Role</td></tr>";
	$role=array();
	for ($icb=0; $icb<$numstrok; $icb++)
	{
		$cbpos = explode( ";",$call[$icb] );
		echo "<tr> <td>".$cbpos[0]."</td> <td>".$cbpos[1]."</td> <td>".$cbpos[2]."</td> <td>".$cbpos[3]."</td><td>".$cbpos[5]."</td></tr>";
	}
	
	$user=array();
	if(isset($_POST['submitButton']))
	{
		for ($icb=0; $icb<$numstrok; $icb++)
		{	
			$cbpos = explode( ";",$call[$icb] );
			if($icb==$_POST['q']&&$_POST['Right']=='Admin')
				$cbpos[5]='admin';
			if($icb==$_POST['q']&&$_POST['Right']=='User')
				$cbpos[5]='user';
			$user[]=$cbpos[0].";".$cbpos[1].";".$cbpos[2].";".$cbpos[3].";".$cbpos[4].";".$cbpos[5];
		}
		$f = 'Users.csv';
		file_put_contents($f, $user[0]);
		for($i=1;$i<$numstrok;$i++)
			file_put_contents($f, $user[$i],FILE_APPEND);
	}
    ?>
	
	<html>
 <head>
  <title> Table of passwords </title>
 </head>
 <body>
 <body bgcolor=Cornsilk>
 <form action="tableofpasswords.php" method="post" name="form">
   
	  Выберите номер пользователя:
	  <br><input type="number" name ="q" min="1"/><br><br/>
		Поменять права на
		<br>
     <select name="Right">
      <option value="Admin"   > Админ  </option>
      <option value="User"    > Пользователь  </option>
      </select><br><br />
	  <br><input type="submit" value ="Поменять права" name="submitButton"><br><br/>
		<a href=".'index2.php'.">На главную<br>
	  
</form>
</body>
 </body>
</html>