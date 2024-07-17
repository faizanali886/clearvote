<?php
	ob_start();
	session_start();
	$_SESSION['userid']='';
	unset($_SESSION['userid']);

	header("Location: index.php?status=2");
	
?>	