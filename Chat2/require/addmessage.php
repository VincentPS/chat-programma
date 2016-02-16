<?php
	$db = new mysqli("localhost","root","","chat2");
	
	
	$message = $_POST['bericht'];
	
	$sql = "INSERT INTO message (`text`) VALUES ('$message')";
	
	$result = $db->query($sql);

	echo "opgeslagen";




?>