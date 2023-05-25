<?php

	require_once './database_connection.php';
	if(!isset($_SESSION['is_logged_in'])){
		header("Location: ./login.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- offline bootstrap	 -->
		<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	</head>

	<body>
		<h1>Landing Page or Homepage</h1>
		<a class="btn btn-danger rounded-pill me-3" href="./logout.php">
			Logout
		</a>
	</body>
</html>
