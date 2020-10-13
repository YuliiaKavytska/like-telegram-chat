<?php

/*
1. сделать таблицу друзей
2. сделать добавление (ссылку)
3. сделать странцу обработчик где добавляем в БД выбраного пользователя
4. перенаправляем пользователя на главную
*/

	include "configs/db.php";

	if(isset($_GET["user_id"])){
		$addSql = "INSERT INTO `action-friend` (you, friend) VALUES ('" . $_COOKIE["user_id"] . "', '" . $_GET["user_id"] . "')";
		if(mysqli_query($connect, $addSql)){
			header("Location: /");
		}else {
			mysqli_error(mysqli_query($connect, $addSql));
		}
	}

?>