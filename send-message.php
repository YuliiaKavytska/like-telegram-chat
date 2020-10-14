<?php

	include "configs/db.php";

	if(isset($_POST["send_message"])){
	$sqlSendMessage = "INSERT INTO messages (user_id, user_id_2, message) VALUES" .
		"('" . $_POST["user_id"] . 
		"', '" . $_POST["user_id_2"] . "', 
		'" . $_POST["text-message"] . "')";
		mysqli_query($connect, $sqlSendMessage);
	}
	$recipientUserId = $_POST["user_id_2"];

	include "modules/message-chat.php";
?>