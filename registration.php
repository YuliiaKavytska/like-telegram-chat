<!-- План для регистрации:
	1. Дизайн или мокап  +
	2. Создать отправку формы +
	3. Проверить есть ли пользователь с таким емейл-адресом +
	4. Проверить заполнил ли пользователь поля формы +
	5. Если все выполнено, то делаем дальше +
		5.1. Добавить пользователя в БД +
-->
<?php
	include "configs/db.php";
	if(
		isset($_POST["name"]) && isset($_POST["login"]) && 
		isset($_POST["email"]) && isset($_POST["phone"]) && 
		isset($_POST["about"]) && isset($_POST["password"]) && 
		$_POST["name"] != "" && $_POST["login"] != "" &&
		$_POST["email"] != "" && $_POST["phone"] != "" &&
		$_POST["about"] != "" && $_POST["password"] != "" 
	){
		$sqlAddPerson = "INSERT INTO contacts (name, login, email, password, phone, about) VALUES " . 
		"('" . $_POST["name"] . "', '" . $_POST["login"] . 
		"', '" . $_POST["email"] . "', '" . $_POST["password"] .
		"', '" . $_POST["phone"] . "', '" . $_POST["about"] . "')";
		if(mysqli_query($connect, $sqlAddPerson)){
			echo "<h2>User was added!</h2>";
		}else{
			echo "<h2>Error!</h2>" . mysqli_error($connect);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>Registration</title>
</head>
<body>
<?php
		include "pice-of-site/header.php";
	?>
	
	<div class="modal" id="sign-up-modal" style="display:block;">
		<p>Sign Up</p>
		<form id="sign-up-form" action="registration.php" method="POST">
			<label for="login-up">Your name: *</label>
			<input id="login-up" type="text" placeholder="Ivan Ivanov" name="name" required>
			<label for="login-up">Your nicname for other users: *</label>
			<input id="login-up" type="text" placeholder="Storm123" name="login" required>
			<label for="login-up">Your email address: *</label>
			<input id="login-up" type="email" placeholder="aaa@gmail.com" name="email" required>
			<label for="login-up">Your phone: *</label>
			<input id="login-up" type="tel" placeholder="0999999999" name="phone" required>
			<label for="login-up">Short information about yourself: *</label>
			<input id="login-up" type="text" placeholder="I'm a..." name="about" required>
			<label for="password-up-1">Your password: *</label>
			<input id="password-up-1" type="password" placeholder="fIm62WF92z" name="password" required>
			<label for="password-up-2">Confirm password: *</label>
			<input id="password-up-2" type="password" placeholder="fIm62WF92z" required>
			<p id="passwords-match">Your passwords don't match!</p>
			<a id="go-to-log-in" href="log-in.php">I already have an acount!</a>
			<button id="sign-up">Sign Up</button>
		</form>
	</div>
	<script src="js/sign-login.js"></script>
</body>
</html>