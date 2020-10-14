<?php

include "configs/db.php";

if(isset($_GET["user_id"])){
	$deleteSql = "DELETE FROM `action-friend` WHERE `action-friend`.you =" . 
	$_COOKIE["user_id"] . " AND `action-friend`.friend = " . $_GET["user_id"] ;
	if(mysqli_query($connect, $deleteSql)){
		include "modules/friend-list.php";
		// header("Location: /");
	}
}else {
	echo "<h2>Error.</h2>";
}


?>