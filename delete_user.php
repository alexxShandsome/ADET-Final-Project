<?php
require_once './database_connection.php';

if (!isset($_SESSION['is_logged_in'])) {
    header("Location: ./profile.php");
    exit;
}

// Get user information from the session
$user_info = isset($_SESSION['user_info']) ? $_SESSION['user_info'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Delete user from the database
    try {
        // Prepare the delete query
        $statement = $pdo->prepare('
            DELETE FROM `registered_users`
            WHERE `user_id` = :user_id
        ');

        $statement->bindValue(':user_id', $user_info['user_id']);
        $statement->execute();

        // Destroy session and redirect to the landing page with success message
        session_destroy();
        header("Location: ./login.php");
        exit;
    } catch (PDOException $e) {
        // Handle database error
        echo "An error occurred: " . $e->getMessage();
        exit;
    }
}
?>
