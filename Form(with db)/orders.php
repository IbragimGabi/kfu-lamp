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
	$call= file("order.csv");
	$numstrok = count ($call);
	echo "<table border='1'>";
	echo "<tr> <td>Name</td><td>Surname</td><td>Items</td><td>Attributes</td><td>Price</td><td>Sum</td></tr>";
	for ($icb=0; $icb<$numstrok; $icb++)
	{
		$cbpos = explode( ";",$call[$icb] );
		echo "<tr> <td>".$cbpos[0]."</td> <td>".$cbpos[1]."</td> <td>".$cbpos[2]."</td> <td>".$cbpos[3]."</td><td>".$cbpos[4]."</td><td>".$cbpos[5]."</td>  </tr>";
	}
	echo "</table>";
	 echo "<br> <a href=".'index2.php'.">На главную</a><br>";
    ?>
	