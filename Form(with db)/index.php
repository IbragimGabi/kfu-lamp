<?php
	header('Content-Type: text/html; charset=utf-8');
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	session_start();
	if(empty($_SESSION['auth']))
	{
		header("Location:index2.php");
		exit();
	}
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>
        Покупка товаров
    </title>
</head>
<body>
    <form action="index.php" method="post" name="form">
        <p>
            Имя:
            <input type="text" name="name" />
            <br />
            <br />
            Фамилия:
            <input type="text" name="surname" />
            <br />
            <br />
            Количество:
            <input type="number" name="quantity" />
            <br />
            <br />
            <select name="Items">
                <option value="1"> Товар 1 Цена 20 р. </option>
                <option value="2"> Товар 2 Цена 30 р.</option>
                <option value="3"> Товар 3 Цена 50 р.</option>
                <option value="4"> Товар 4 Цена 70 р.</option>
            </select>
			
            <br />
            <br />
			Примечание:
			<textarea name="atributes"> </textarea>
			<br />
            <br />
            <input type="submit" name="btn" value="Отправить">
			<br>
			<a href="index2.php">На главную</a><br>
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
		$f=fopen('Order.csv','a+');
		fputcsv($f,$Order,';');	
		fclose($f);
		
		require 'connect.php';
		$insert_sql = "INSERT INTO orders (name, item, quantity, atributes)" .
		"VALUES('{$_POST['name']}', '{$Items2[$_POST['Items']]}', '{$_POST['quantity']}', '{$_POST['atributes']}');";
		mysql_query($insert_sql);
	}
	
    ?>
</body>
</html>


