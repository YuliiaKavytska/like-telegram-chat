<?php
	include "configs/db.php";
	include "configs/settings.php";

	if(!isset($_COOKIE["user_id"])){
		header("Location: log-in.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>Web Chat</title>
</head>
<body>

	<?php
		include "pice-of-site/header.php";
		if(isset($_GET["user"])){
			include "modules/create-modal.php";
		}
	?>

	<main>
		<div id="content">
			<aside id="users">
					<!-- Чтобы осуществить поиск по чатам нужно нашу кнопку и поле обернуть в форму.
					форме мы задаем действие на этой же странице, а метод ГЕТ -->
					<form id="search" action="http://chat.local/find-user-message.php" method="POST"> 
					<!-- Нейм - это то, что передасться в гет запрос. -->
						<input type="text" name="find" placeholder="Search..."> 
						<button type="submit" name="search-btn" >
							<img src="images/search.png" alt="search">
						</button>
					</form>
				<?php
					include "modules/chat-list.php";// ПОДКЛЮЧАЕМ СПИСОК ЧАТОВ СБОКУ
				?>
			</aside>

			<section id="message-story">
				<?php
					include "modules/message-chat.php";
				?>
				<div id="send-form">
				<?php
						if(isset($_GET["user_chat"])){
					?>
					<div class="avatar">
						<img src="images/05.png" alt="user">
					</div>
					
					<form method="POST" action="http://chat.local/send-message.php" class="main-form" id="send-message">
						<textarea name="text-message" id="text-message" placeholder="Message..."></textarea>
						<!-- Это мы отправляем в базу от кого сообщение (тоесть от нас) -->
						<input type="hidden" name="user_id" value="<?php echo $_COOKIE["user_id"]; ?>">
						<input type="hidden" name="user_id_2" value="<?php echo $_GET["user_chat"]; ?>">
						<!-- отправляем в базу кому мы написали сообщение -->
							
						<button type="submit" name="send_message"> <img src="images/send.png" alt="">Send</button>
					</form>
					
					<div class="avatar">
						<img src="images/02.png" alt="user">
					</div>
					<?php
						}
					?>
				</div>
			</section>
		</div>
	</main>

	<div class="baground">	</div>
	<div class="modal" id="contacts-modal">
		<div class="close">X</div>
		<?php
			include "modules/contacts-list.php";
		?>
	</div>

	<div class="modal" id="setings-modal">
		<div class="close">X</div>
		<div class="inner-setings">
		</div>
	</div>

<script src="js/main.js"></script>
<script src="js/script.js"></script>
</body>
</html>