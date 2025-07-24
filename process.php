<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.<br>";
    } else {
        echo "Email is valid (Method 1).<br>";
    }

  
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['profile_pic']['type'], $allowed_types)) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['profile_pic']['name']);
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES['profile_pic']['name'])) . " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        } else {
            echo "Only image files are allowed.<br>";
        }
    } else {
        echo "No file uploaded or there was an error.<br>";
    }

   
    if (isset($_POST['password'])) {
        if (strlen($_POST['password']) > 8) {
            echo "Password must not exceed 8 characters.<br>";
        }
        if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])) {
            echo "Password must contain only letters and numbers, no special characters.<br>";
        }
        if (preg_match('/[A-Z]/', $_POST['password'])) {
            echo "Password must not contain capital letters.<br>";
        }
    }

   
}
?>