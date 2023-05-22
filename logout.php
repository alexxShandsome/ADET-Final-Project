<?php
	require_once './database_connection.php';

	session_unset();
	session_destroy();
	header("Location: ./login.php");
?>
