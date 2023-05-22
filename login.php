<?php
	// database connection and session functions
	require_once './database_connection.php';
	if(isset($_SESSION['is_logged_in'])){
		header("Location: ./landing.php");
	}

	$error_msg = 'Username or Password Might Be Incorrect';

	if (isset($_POST['login_submit'])){
		$login_user_name = $_POST['login_user_name'] ?? null;
		$login_password = $_POST['login_password'] ?? null;

		$user_data = get_user_login($pdo, $login_user_name, $login_password);

		if ($user_data['row_count'] == 1){
			$_SESSION['user_info'] = $user_data[0];
			$_SESSION['is_logged_in'] = true;

			header("Location: ./landing.php");
		}
		else{
			header("Location: ./login.php?error");
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<!-- offline bootstrap	 -->
		<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

		<!-- css specifically for this page -->
		<link href="./style/login.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<!-- Error Message -->
		<div class="text-center mb-4 mt-4">
			<!-- Error Message -->
			<?php if (isset($_GET['error'])): ?>
				<div class="col-6 mx-auto alert alert-danger pt-3 pb-3" role="alert">
					<strong>Attention!</strong>
					<p><?php echo $error_msg; ?></p>
				</div>
			<?php endif; ?>
		</div>
		<!-- Error Message -->

		<div class="border shadow-lg login_card rounded-3 p-3 bg-white">
			<h1 class="pb-3 text-center">Login</h1>

			<form class="m-2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				<!-- Email Input -->
				<div class="form-floating mb-3">
					<input type="text" name="login_user_name" id="login_user_name" class="form-control" placeholder=" ">
					<label>Username:</label>
				</div>
				<!-- Email Input -->

				<!-- Password Input -->
				<div class="form-floating mb-1">
					<input type="password" id="login_password" name="login_password" class="form-control" placeholder=" ">
					<label>Password:</label>
				</div>
				<!-- Password Input -->

				<!-- Show or Hide Password Checkbox -->
				<div class="mb-4">
					<input type="checkbox" name="show_password" onclick="showOrHidePassword()">
					<label>Show Password</label>
					<script src="./js/show_hide_password.js"></script>
				</div>
				<!-- Show or Hide Password Checkbox -->

				<center>
					<!-- Login Button -->
					<button name="login_submit" type="submit" class="btn btn-success rounded-pill mb-3">
						Log-In
					</button>
					<!-- Login Button -->

					<p>or</p>
					<!-- Create Account or Register Button -->
					<a href="./register.php" class="btn btn-outline-success rounded-pill" >
						Create Account
					</a>
					<!-- Create Account or Register Button -->
				</center>
			</form>
		</div>
	</body>
</html>
