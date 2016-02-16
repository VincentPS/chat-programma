<?php
	$db = new mysqli("localhost","root","","chat2");
	
	$sql = "SELECT * FROM message";
	
	$result = $db->query($sql);
	
	$messages = $result->fetch_all(MYSQLI_ASSOC);
	foreach ($messages as $message){ ?>
<p id="<?php echo $message['id']; ?>">
	<?php echo $message['text']; ?>
	
</p>		
<?php	} ?>