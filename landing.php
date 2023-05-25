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
		<!-- Navbar -->
		<nav class="navbar sticky-top bg-light border-bottom border-3">
			<div class="col-auto d-inline-flex justify-content-end ms-3">
				<a class="btn btn-danger rounded-pill me-3" href="./logout.php">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
						<path d="M7.5 1v7h1V1h-1z"/>
						<path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
					</svg>
					Logout
				</a>
			</div>
		</nav>
		<!-- Navbar -->

		<h1 class="text-center">Landing Page or Homepage</h1>

		<center>
			<div class="mb-3">
				<a class="btn btn-success rounded-pill me-3" href="./downloadables/Hash.zip">
					Download Hash
				</a>
			</div>
			<div class="mb-3">
				<a class="btn btn-success rounded-pill me-3" href="./downloadables/Encryption.zip">
					Download Encryptor and Decryptor
				</a>
			</div>
		</center>
	</body>
</html>
