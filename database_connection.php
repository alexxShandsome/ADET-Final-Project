<?php

	// new database connection for memesite
	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=adet_final_project', 'root', '');

	// set error
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
