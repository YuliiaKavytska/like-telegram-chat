<?php 
	if(isset($isFind)){
		$userFind = $isFind;
	}
	$findSql = "SELECT * FROM contacts WHERE name LIKE '%" . $userFind . "%'";
	$findResult = mysqli_query($connect, $findSql);
	if(mysqli_num_rows($findResult) > 0){
		for($i = 0; $i < mysqli_num_rows($findResult); $i++){
			$user = mysqli_fetch_assoc($findResult);
			echo "<li>";
			echo "<a href='index.php?user=" . $user["id"] . "'>"; //Здесь в ссылку передаем айди. чтобы пото переходить на пользователя.
			// Добавляем аватарку с массива
				echo "<div class=\"avatar\">
							<img src='" . $user["avatar"] . "' alt=\"user\"> 
						</div>";
			echo "</a>";
			//Оборачиваем блок имени и последнего сообщения в ссылку. При нажатии на этот элемнт мы отправляем гет запрос. с полем юзер чат. 
			//Тут с айди все в порядке. потому-то мы будем искать по массиву именно это число, а не персону(которую нужно искать начиная с 0)
			echo "<a id=\"infos-chat\" href='index.php?user_chat=" . $user["id"] . "'>";
				echo "<h2>" . $user["name"] . "</h2>";
				echo "<p>" . $user["lastMessage"] . "</p>";
			echo "</a>";
			echo "<div class=\"time\">" . $user["time"] . "</div>";
			echo "</li>";
		}
	}else{
		echo "<h2 class=\"chose-contact\">Пользователь не найден.</h2>";
	}
?>