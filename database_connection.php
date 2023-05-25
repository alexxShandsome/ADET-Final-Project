<?php
	session_start();
	// echo "Session Info (For Debugging Purposes)";
	// echo '<pre>';
	// var_dump($_SESSION);
	// echo '</pre>';

	// new database connection for memesite
	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=adet_final_project', 'root', '');

	// set error
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// fetch user credentials
	function get_user_login($pdo, $user_name, $user_password){
		//$password = md5($password);
		$statement = $pdo->prepare('
			SELECT * FROM `registered_users`
			WHERE `user_name` = :user_name AND `user_password` = :user_password
		');
		$statement->bindValue(':user_name', $user_name);
		$statement->bindValue(':user_password', $user_password);
		$statement->execute();

		$users = $statement->fetchAll(PDO::FETCH_ASSOC); // returns associative 2 dimensional array
		$users['row_count'] = $statement->rowCount(); // returns 1 if successsful else 0 on failure

		return $users;
	}

	function register_user($pdo, $user_name, $user_password){
		$statement = $pdo->prepare('
			INSERT INTO `registered_users`
				(`user_name`, `user_password`)
			VALUES
				(:user_name, :user_password)
		');

		$statement->bindValue(':user_name', $user_name);
		$statement->bindValue(':user_password', $user_password);
		$statement->execute();
	}

?>
