<?php

	require_once './database_connection.php';
	if(isset($_SESSION['is_logged_in'])){
		header("Location: ./landing.php");
	}

	$register_user_name = $_POST['register_user_name'] ?? null;
	$register_user_password = $_POST['register_user_password'] ?? null;

	$has_error = 0;
	$error_msg = 'Information Needed';
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		if (!isset($register_user_name) || strlen(trim($register_user_name)) == 0) $has_error = 1;
		if (!isset($register_user_password) || strlen(trim($register_user_password)) == 0) $has_error = 1;
	}

	// Insert New User to Database
	if(isset($_POST['submit']) && $has_error == 0){
		register_user($pdo, $register_user_name, $register_user_password);

		// after successful submittion go to login page
		// echo '<script type="text/javascript">window.location.href = "login.php";</script>';
		header("Location: ./login.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- offline bootstrap	 -->
		<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

		<!-- css specifically for this page -->
		<link href="./style/register.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div class="text-center mb-4 mt-4">
			<!-- Error Message -->
			<?php if($has_error == 1): ?>
				<div class="col-6 mx-auto alert alert-danger pt-3 pb-3 shadow" role="alert">
					<strong class="">Attention!</strong>
					<p><?php echo $error_msg; ?></p>
				</div>
			<?php endif; ?>
			<!-- Error Message -->
		</div>

		<div class="border shadow-lg register_card rounded-3 p-3">
			<h1 class="text-dark text-center fw-bold p-3">Register</h1>

			<form class="ms-2 me-2 mb-2 mt-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				<!--- Username --->
				<div class="form-floating mb-3
					<?php echo ( $_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($register_user_name) || strlen(trim($register_user_name)) == 0) ? 'has_error' : '' ); ?>">
					<input type="text" class="form-control" placeholder="floatinginput" id="register_user_name" name="register_user_name" value="<?php echo $register_user_name; ?>">
					<label>Username: </label>
				</div>
				<!--- Username --->

				<!--- Password --->
				<div class="form-floating mb-1
					<?php echo ( $_SERVER['REQUEST_METHOD'] === 'POST' &&( !isset($register_user_password) || strlen(trim($register_user_password)) == 0) ? 'has_error' : '' ); ?>">
					<input type="password" class="form-control" id="login_password" name="register_user_password" placeholder=" ">
					<label>Password: </label>
				</div>

				<div class="mb-3">
					<input type="checkbox" name="show_password" onclick="showOrHidePassword()">
					<label class="fw-light">Show Password</label>
					<script src="./js/show_hide_password.js"></script>
				</div>
				<!--- Password --->

				<!-- Submit Button -->
				<div class="text-center mb-2">
					<button name="submit" type="submit" class="btn btn-success rounded-pill">Create Account</button>
					<?php
					?>
				</div>
				<!-- Submit Button -->

				<p class="text-center"> Already a member?
					<a class="text-decoration-none" href="./login.php">Login Here</a>
				</p>
			</form>
		</div>
	</body>
</html>
