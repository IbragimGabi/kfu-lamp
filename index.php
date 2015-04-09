<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>
        Регистрация
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
                <option id="item1" value="20"> Товар 1 </option>
                <option id="item2" value="30"> Товар 2 </option>
                <option id="item3" value="50"> Товар 3 </option>
                <option id="item4" value="70"> Товар 4 </option>
            </select>
            <br />
            <br />
            <input type="submit" name="btn" value="Отправить">
            <input type="reset" value="Очистить">
        </p>
    </form>
    <?php
	if(isset($_POST['btn']))
	{    
		echo $_POST['name'];
		echo " ";
		echo $_POST['surname'];
		echo " ";
		$quan =$_POST['quantity'] ;
		$numb =$_POST['Items'];
		if($quan!=0&&$numb!=0)
		echo $quan*$numb;
	}
    ?>
</body>
</html>
