<?php
require_once './database_connection.php';
if (!isset($_SESSION['is_logged_in'])) {
    header("Location: ./profile.php");
    exit;
}

// Get user information from the session
$user_info = isset($_SESSION['user_info']) ? $_SESSION['user_info'] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Offline Bootstrap -->
    <link rel="stylesheet" href="./style/stylesheet.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/navbar.css">
</head>
<body style="background-image: url('./img/bg.jpg'); background-repeat: no-repeat; background-size: cover;margin-top:10%">
    <nav>
        <div class="logo">
            <a href="landing.php">Hashermans</a>
        </div>
        <ul class="nav-links">
            <li><a href="landing.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
        <div class="logout">
            <a href="./logout.php">Logout</a>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="card" style="width: 18rem;">
                <img src="./img/avatar.avif" class="card-img-top" alt="...">
                <div class="card-body"></div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo "User ID: " . ($user_info ? $user_info['user_id'] : ''); ?></li>
                    <li class="list-group-item"><?php echo "User Name: " . ($user_info ? $user_info['user_name'] : ''); ?></li>
                </ul>
                <div class="card-body d-flex justify-content-between">
                    <a href="#" class="card-link edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                    <a href="#" class="card-link delete" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                </div>
            </div>
        </div>
    </main>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update_user.php" method="post">
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">New Username</label>
                        <input type="text" class="form-control" id="newUsername" name="newUsername" required>
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPasswordC" name="newPasswordC" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your delete confirmation message here -->
                <p>Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script>
    document.getElementById('deleteButton').addEventListener('click', function() {
        // Send an AJAX request to delete_user.php
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_user.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            // Reload the page after successful deletion
            if (xhr.status === 200) {
                window.location.reload();
            } else {
                // Display an error message
                console.error('An error occurred while deleting the user.');
            }
        };
        xhr.send();
    });
</script>
