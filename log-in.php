<?php
// План для регистрации:
// 1. Дизайн или мокап +
// 2. Сделать отправку формы +
// 3. Сделать обработку данных формы +
// 	3.1. Заполнили ли емейл и пароль +
// 4. Есть ли пользователь в бд +

	include "configs/db.php";
	setcookie("user_id", "", 0);
	if(isset($_POST["email"]) && isset($_POST["password"]) && 
		$_POST["email"] != "" && $_POST["password"] != "" ){
			$sqlLogin = "SELECT * FROM contacts WHERE email LIKE '" . 
			$_POST["email"] . "' AND password LIKE '" . $_POST["password"] ."'";
			$resaltLogin = mysqli_query($connect, $sqlLogin);
			$quanintyPerson = mysqli_num_rows($resaltLogin);
			if($quanintyPerson == 1){
				$user = mysqli_fetch_assoc($resaltLogin);
				setcookie("user_id", $user["id"], time() + 60*60);
				header("Location: /");
			}else{
				echo "<h2>Something wrong...</h2>";
			}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>Log In</title>
</head>
<body>
	<?php
		include "pice-of-site/header.php";
	?>
	
	<div class="modal" id="log-in-modal" style="display:block;">
		<p>Log In</p>
		<form id="log-in-form" action="log-in.php" method="POST">
			<label for="login-in">Your login:</label>
			<input id="login-in" type="email" name="email" placeholder="aaa@gmail.com" required>
			<label for="password-in">Your password:</label>
			<input id="password-in" type="password" name="password" placeholder="fIm62WF92z" required>
			<a id="go-to-sign-up" href="registration.php">Don't have an acount? Sign up!</a>
			<button type="submit">Log In</button>
		</form>
	</div>
</body>
</html>
