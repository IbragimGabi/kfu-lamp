<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
  // Initialize session for this request.
  session_start();
?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Authentication example</title>
</head>
<body>
  <h1>Hello, <?php echo !empty($_SESSION['auth'])?$_SESSION['auth']['name']:"Guest"  ?>!</h1>
  <a href="login.php">Войти</a><br>
  <a href="index.php">Форма заказов</a><br>
  <a href="registration.php">Регистрация</a><br>
  <a href="orders.php">Заказы</a><br>
  <a href="tableofpasswords.php">Пользователи</a><br>
  <a href="exit.php">Выйти</a><br>
</body>
</html>