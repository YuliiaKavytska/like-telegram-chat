<?php

	include "configs/db.php";
	if(isset($_POST["search-btn"])){
		$findSql = "SELECT * FROM contacts WHERE name LIKE '%" . $_POST["find"] . "%'";
		$isFind = $_POST["find"];
		if(mysqli_query($connect, $findSql)){
			include "modules/inner-chat-search.php";
		}
	}
	
?>