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
            <input type="text" name="login" />
            <br />
            <br />
            Имя:
            <input type="text" name="name" />
            <br />
            <br />
            Пароль:
            <input type="password" name="pass" />
            <br />
            <br />
			e-mail:
            <input type="text" name="email" />
            <br />
            <br />
            <select name="sex">
                <option value="man"> Мужской </option>
                <option value="woman"> Женский </option>
            </select>
            <input type="submit" name="btn" value="Отправить">
        </p>
    </form>
    <?php
	function validateEMAIL($EMAIL) {
		$v = "/[a-zA-Z0-9_\-.+]+@[a-zA-Z0-9\-]+.[a-zA-Z]+/";
		return (bool)preg_match($v, $EMAIL);
		}
	if(!empty($_POST['login'])&&!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['sex']))
	{
		if(isset($_POST['btn']))
		{    
			if(validateEMAIL($_POST['email']))
			{
				$user=array(
								"login"=>$_POST['login'],
								"name"=>$_POST['name'],
								"email"=>$_POST['email'],
								"sex"=>$_POST['sex'],
								"pass"=>$_POST['pass']
							);
				$f=fopen('Users.csv','a+');
				fputcsv($f,$user,';');	
				fclose($f);
				echo "Вы загестрированы";
			}
			else
				echo "Неверная почта";
			
		}
	}
	else
	{
		echo"Введите данные";
	}
    ?>
	
</body>
</html>


