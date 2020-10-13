<header id="header">
	<a href="index.php" id="logo">
		<img src="images/logo1.png" alt="logo">
		<span>
			<b>Chat</b><i>-Web-</i><b>Chat</b>
		</span>
	</a>

	<div id="menu">
		<?php
			if(isset($_COOKIE["user_id"])){
				$userSql = "SELECT * FROM contacts WHERE id=" . $_COOKIE["user_id"];
				$resultUserCookie = mysqli_query($connect, $userSql);
				$user = mysqli_fetch_assoc($resultUserCookie);
		?>
				<a href="#"><?php echo "Привет, " . $user["name"]; ?></a>
				<a id="open-contacts" href="#">Contacts</a>
				<a id="open-setings" href="#">Setings</a>
				<a id="open-log-in" href="log-in.php">Log Out</a> 
		<?php
			}else {
		?>
				<a id="open-log-in" href="log-in.php">Log In</a> 
		<?php
			}
		?>
	</div>
</header>