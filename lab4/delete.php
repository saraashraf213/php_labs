<?php
require_once 'users.php';

if (!isset($_GET['id'])) {
    die('User ID is required.');
}

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if (!$id) {
    die('Invalid User ID.');
}

$user = User::getById($id);
if (!$user) {
    die('User not found.');
}

// Delete profile picture if it exists and is not the default
if (file_exists($user['profile']) && $user['profile'] !== 'uploads/default.jpg') {
    unlink($user['profile']);
}

if (User::delete($id)) {
    header('Location: all_users.php');
    exit;
} else {
    echo "Error deleting user.";
}
?>