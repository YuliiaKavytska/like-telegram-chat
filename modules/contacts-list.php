<!-- Это кусок кода для создания модального окна с контактами -->

<div class="contacts-list">
	<ul>
	<?php
		$j = 0;
		$sqlContacts = "SELECT * FROM contacts";
		$resultContacts = mysqli_query($connect, $sqlContacts);
		$quantityPerson = mysqli_num_rows($resultContacts);
	
		while($j < $quantityPerson){
			$person = mysqli_fetch_assoc($resultContacts);
			echo "<li>";
				echo "<div class=\"avatar\">
							<img src='" . $person["avatar"] . "' alt=\"user\">
						</div>";
				$issetFriendSql = "SELECT * FROM `action-friend` WHERE you=" . $person["id"] . 
				" AND friend=" . $_COOKIE["user_id"] . 
				" OR you=" . $_COOKIE["user_id"] . " AND friend=" . $person["id"];
				$resultIssetFriend = mysqli_query($connect, $issetFriendSql);
				$quanitity = mysqli_num_rows($resultIssetFriend);
				echo "<div id=\"infos-chat\">";
					echo "<h2>" . $person["name"] . "</h2>";
					if($quanitity == 0){
						echo "<a href='add-friend.php?user_id=" . $person["id"] . "'>Добавить в друзья +</a>";
					}
				echo "</div>";
				if($quanitity > 0){
					echo "<a href='delete-friend.php?user_id=" . $person["id"] . "'>Х</a>";
				}else {
					
				}
			echo "</li>";
			$j +=  1;
		}
	?>
	</ul>
</div>