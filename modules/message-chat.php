<!-- Это файл для вывода чатов -->
<!-- Создаем блок с сообщениями -->

<div id="messages"> 
	<ul>
		<?php 
			if(isset($_GET["user_chat"]) || isset($recipientUserId)){
				if(isset($_GET["user_chat"])){
					$user_id = $_GET["user_chat"];
				}else{
					$user_id = $recipientUserId;
				}
				$sqlMessage = "SELECT * FROM messages WHERE " .
				"(user_id = " . $user_id . " AND user_id_2 = " . $_COOKIE["user_id"] . ") OR " . 
				"(user_id = " . $_COOKIE["user_id"] . " AND user_id_2 = " . $user_id . ")";
				$resultMessage = mysqli_query($connect, $sqlMessage);
				$quanityMessages = mysqli_num_rows($resultMessage);
				if($quanityMessages != 0){
					$i = 0;
					while($i < $quanityMessages){ // Проходимся по массиву сообщений до конца
						$message = mysqli_fetch_assoc($resultMessage);
						echo "<li>";
						$findUserSql = "SELECT * FROM contacts WHERE id = " . $message["user_id"];
						$findResult = mysqli_query($connect, $findUserSql);
						$foundUser = mysqli_fetch_assoc($findResult);
						echo "<a href='index.php?user=" . $message["user_id"] . "'><div class=\"avatar\"> 
									<img src='" . $foundUser["avatar"] . "' alt=\"user\">
								</div></a>";
						echo "<div id=\"infos-chat\">";
							echo "<h2>" . $foundUser["name"] . "</h2>"; //Помещаем имя пользователя с полученого массива персоны
							echo "<p>" . $message["message"] . "</p>"; //Помещаем сообщение с истории
						echo "</div>";
						echo "<div class=\"time\">" . $message["time"] . "</div>";
						echo "</li>";
						$i += 1;
					}
				}else {
					echo "<h2 class=\"chose-contact\">Нет сообщений.</h2>";
				}
			}}else{ //Запросов ГЕТ не существует. значит чат еще нужно выбрать
				echo "<h2 class=\"chose-contact\">Чат не выбран. Выберете пользователя со списка контактов...</h2>";
			}
		?>
	</ul>
</div>