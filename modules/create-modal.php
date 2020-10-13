<!-- Это кусок кода который создает модальное окно, когда существует гет запрос с полем юзер.  -->
<?php
	$sqlModal = "SELECT * FROM contacts WHERE id=" . $_GET["user"];
	$resultModal = mysqli_query($connect, $sqlModal);
	$userModal = mysqli_fetch_assoc($resultModal);
?>

<div class="baground" style="display:block;">	</div>
<div class="modal user-modal" style="display:block;">
	<div class="close"><a href="index.php">X</a></div>
	<div class="inner-userid">
		<div class="header-user">
			<img src=" <?php echo $userModal["avatar"]; ?> " alt="avatar">
			<div>
				<!-- Создаем имя и достаем его из персоны -->
				<h3><?php echo $userModal["name"]; ?></h3> 
				<p>Был(а): недавно</p>
			</div>
		</div>
		<ul class="main-info">
			<li>
				<p>Mobile phone:</p>
				<!-- Добстаем из нашего массива персоны все контактные данные -->
				<p><a href="tel: <?php echo $userModal["phone"]; ?> "><?php echo $userModal["phone"] ?></a></p>
			</li>
			<li>
				<p>User name:</p>
				<p>@<?php echo $userModal["login"]; ?></p>
			</li>
			<li>
				<p>About yourself:</p>
				<p><?php echo $userModal["about"]; ?></p>
			</li>
		</ul>
	</div>
</div>