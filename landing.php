<?php
	require_once './database_connection.php';
	if(!isset($_SESSION['is_logged_in'])){
		header("Location: ./login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Offline Bootstrap -->
	<link rel="stylesheet" href="./style/stylesheet.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./style/navbar.css">
</head>


<body style="background-image: url('./img/bg.jpg');
    background-repeat: no-repeat;
    background-size: cover; color:white;margin-top:10%">
	<nav>
		<div class="logo">
			<a href="landing.php">
				<a href="landing.php">Hashermans</a>
			</a>
		</div>
		<ul class="nav-links">
			<li><a href="landing.php">Home</a></li>
			<li><a href="profile.php">Profile</a></li>
		</ul>
		<div class="logout">
			<a href="./logout.php">Logout</a>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-12 rounded" style="background-color: rgba(108, 117, 125, 0.25); backdrop-filter: blur(10px)">
						<div class="row">
							<h2>Hash App</h2>
							<p>
								To use the Hash App, enter a string below and press Enter. The app will calculate the hash of the input string using a simple hashing algorithm.
							</p>
						</div>
						<div class="row">
							<a class="btn btn-success" href="./downloadables/Hash.zip">
								Download Hash
							</a>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-12 rounded" style="background-color: rgba(108, 117, 125, 0.25); backdrop-filter: blur(10px)">
						<div class="row">
							<h2>Encryption and Decryption App</h2>
							<p>This Python app allows you to encrypt and decrypt your sensitive data using various encryption algorithms.</p>
						</div>
						<div class="row">
							<a class="btn btn-success" href="./downloadables/Encryption.zip">
								Download Encryptor and Decryptor
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col ms-3">
				<div class="row me-2">
					<div class="col-md-12 rounded" style="background-color: rgba(108, 117, 125, 0.25); backdrop-filter: blur(10px)">
						<h3>Members</h3>
						<ul>
							<li>Algilbert Gomez</li>
							<li>Joshua Kevin Taytayan</li>
							<li>Nissa Anjelie Binalla</li>
							<li>Jec Nasalita</li>
							<li>James Esparrago</li>
							<li>Ken Daryl Perez</li>
						</ul>
					</div>
					<a class="btn btn-success" href="https://github.com/alexxShandsome/ADET-Final-Project" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
						  <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
						</svg>
						Project Repository
					</a>
				</div>
			</div>
		</div>
	</div>

	<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
