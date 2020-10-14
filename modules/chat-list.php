<!-- Это кусок кода для создания списка чатов в левой панели асайд -->
<!-- mb_strtolower() strtolower() приведение к нижнему регистру -->
<!-- stristr($var, "e") проверка подстроки в строке, регистронезависимая для английского языка -->


<div id="chat-list">
	<ul id="contacts-list">
		<?php
		if(isset($_GET["find"]) || isset($isFind)){
			include "modules/inner-chat-search.php";
		}else{
			$sqlContacts = "SELECT * FROM contacts WHERE id!=" . $_COOKIE["user_id"];
			//Выполнить скюл запрос в базе даных.
			$resultContacts = mysqli_query($connect, $sqlContacts);
			$quantityPerson = mysqli_num_rows($resultContacts);
			for($j = 0; $j < $quantityPerson; $j += 1){ //Проходимся по нашим всем персонам
				$namesBD = mysqli_fetch_assoc($resultContacts); //преобазовывает данные с базы данных в массив
				if(isset($_GET["user_chat"]) && ($_GET["user_chat"] == $namesBD["id"])){
					echo "<li class=\"active-chat\">";
				}else {
					echo "<li>";
				}
				//Создаем все элементы
				//При нажатии на аватарку мы передаем гет запрос с полем юзер и значением в нем, которое равно айди юзера. 
				//Но это значение на 1 больше, потому что массив неймс начинаемся с 0, а у первого персонажа айди 1. поэтому пото отнимем еще 1
				echo "<a href='index.php?user=" . $namesBD["id"] . "'>"; //Здесь в ссылку передаем айди. чтобы пото переходить на пользователя.
				// Добавляем аватарку с массива
					echo "<div class=\"avatar\">
								<img src='" . $namesBD["avatar"] . "' alt=\"user\"> 
							</div>";
				echo "</a>";
				//Оборачиваем блок имени и последнего сообщения в ссылку. При нажатии на этот элемнт мы отправляем гет запрос. с полем юзер чат. 
				//Тут с айди все в порядке. потому-то мы будем искать по массиву именно это число, а не персону(которую нужно искать начиная с 0)
				echo "<a id=\"infos-chat\" href='index.php?user_chat=" . $namesBD["id"] . "'>";
					echo "<h2>" . $namesBD["name"] . "</h2>";
					echo "<p>" . $namesBD["lastMessage"] . "</p>";
				echo "</a>";
				echo "<div class=\"time\">" . $namesBD["time"] . "</div>";
				echo "</li>";
			}
		}
		?>
	</ul>
</div>