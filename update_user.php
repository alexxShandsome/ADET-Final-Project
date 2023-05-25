<?php
require_once './database_connection.php';

if (!isset($_SESSION['is_logged_in'])) {
    header("Location: ./profile.php");
    exit;
}

// Get user information from the session
$user_info = isset($_SESSION['user_info']) ? $_SESSION['user_info'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $newUsername = isset($_POST['newUsername']) ? $_POST['newUsername'] : '';
    $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
    $newPasswordC = isset($_POST['newPasswordC']) ? $_POST['newPasswordC'] : '';

    if (empty($newUsername) || empty($newPassword) || empty($newPasswordC)) {
        // Handle empty fields error
        echo "Please fill in all the fields.";
        exit;
    }

    if ($newPassword !== $newPasswordC) {
        // Handle password mismatch error
        echo "Passwords do not match.";
        header("Location: ./profile.php?error=1");
    }

    // Update user information in the database
    try {
        // Prepare the update query
        $statement = $pdo->prepare('
            UPDATE `registered_users`
            SET `user_name` = :newUsername, `user_password` = :newPassword
            WHERE `user_id` = :user_id
        ');

        $statement->bindValue(':newUsername', $newUsername);
        $statement->bindValue(':newPassword', $newPassword);
        $statement->bindValue(':user_id', $user_info['user_id']);
        $statement->execute();

        // Update session variable with new user information
        $_SESSION['user_info']['user_name'] = $newUsername;

        // Redirect to profile page with success message
        header("Location: ./profile.php?success=1");
        exit;
    } catch (PDOException $e) {
        // Handle database error
        echo "An error occurred: " . $e->getMessage();
        exit;
    }
}
?>
