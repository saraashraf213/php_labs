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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedUser = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
    
        'profile' => $user['profile'] // Retain old profile if no new upload
    ];

    // Validate email
    if (!filter_var($updatedUser['email'], FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }

    // Handle new profile picture
    if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $fileName = time() . "_" . basename($_FILES['profile']['name']);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['profile']['tmp_name'], $targetFile)) {
            // Delete old profile picture if it exists and is not the default
            if (file_exists($user['profile']) && $user['profile'] !== 'uploads/default.jpg') {
                unlink($user['profile']);
            }
            $updatedUser['profile'] = $targetFile;
        } else {
            echo "Error uploading profile picture.";
        }
    }

    if (User::update($id, $updatedUser)) {
        header('Location: all_users.php');
        exit;
    } else {
        echo "Error updating user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit User</h2>
    <form method="POST" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            
           
        </div>
        <div class="mb-3">
            <label>Current Profile Image:</label><br>
            <img src="<?= htmlspecialchars($user['profile']) ?>" alt="Profile" width="100"><br><br>
            <input type="file" name="profile" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="all_users.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>