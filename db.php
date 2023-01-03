<?php
	$conn = mysqli_connect('localhost','root','','metro1');

	if(mysqli_connect_errno())
	{
		echo 'Failed to connect to MySql'. mysqli_connect_errno();
	}
?>
