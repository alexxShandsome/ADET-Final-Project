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
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12 rounded" style="background-color: rgba(108, 117, 125, 0.25);">
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
					<div class="col-md-12 rounded" style="background-color: rgba(108, 117, 125, 0.25);">
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
			<div class="col-md-5 ms-3">
				<div class="row me-2">
					<div class="col-md-12 rounded" style="background-color: rgba(108, 117, 125, 0.25);">
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
				</div>
				<div class="row mt-2">
					<div class="col-md-12 rounded">
						<div class="d-flex flex-row-reverse bd-highlight">
							<div class="p-2 bd-highlight">
								<a class="btn btn-success" href="https://github.com/alexxShandsome/ADET-Final-Project" target="_blank">
									↓ Project Repository
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

	<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
