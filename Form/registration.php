<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>
        Регистрация
    </title>
</head>
<body>
    <form action="registration.php" method="post" name="form">
        <p>
            Логин:
            <input type="text" name="name" />
            <br />
            <br />
            Имя:
            <input type="text" name="surname" />
            <br />
            <br />
            Пароль:
            <input type="text" name="surname" />
            <br />
            <br />
			e-mail:
            <input type="text" name="surname" />
            <br />
            <br />
            <input type="submit" name="btn" value="Отправить">
        </p>
    </form>
    <?php
	$Items1=array();
	$file=file_get_contents("Items1");
	$j=0;
	for ($i = 0; $i < strlen($file); $i++) 
	{
		if($file[$i]==" ")
		{
			$Items1[]=substr($file,$j,$i-$j);
			$j=$i+1;
		}
	}
	$Items2=array();
	$file=file_get_contents("Items2");
	$j=0;
	for ($i = 0; $i < strlen($file); $i++) 
	{
		if($file[$i]==" ")
		{
			$Items2[]=substr($file,$j,$i-$j);
			$j=$i+1;
		}
	}
	if(isset($_POST['btn']))
	{    
		echo $_POST['name']." ".$_POST['surname']."<br />".$Items2[$_POST['Items']]."<br />".$_POST['atributes']." ";
		echo "<br />";
		echo $_POST['quantity']."<br /> ".$_POST['quantity']*$Items1[$_POST['Items']];
		
		$Order=array(
						"name"=>$_POST['name'],
						"surname"=>$_POST['surname'],
						"item"=>$Items2[$_POST['Items']],
						"atributes"=>$_POST['atributes'],
						"quantity"=>$_POST['quantity'],
						"price"=>$Items1[$_POST['Items']],
						"sum"=>$_POST['quantity']*$Items1[$_POST['Items']]
					);
		// foreach($newFileds as $fields)
		// fputcsv($f),$fields,';');	
		// fclose($f);
		// fputcsv('Orders.csv',$Order,";");
		file_put_contents('Order.csv',$Order, FILE_APPEND);
	}
    ?>
</body>
</html>


