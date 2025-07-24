<?php
session_start();
require_once 'users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
   

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email.");
    }

    // Handle profile picture upload
    if (isset($_FILES["profile"]) && $_FILES["profile"]["error"] === 0) {
        $tmp = $_FILES["profile"]["tmp_name"];
        $name = time() . "_" . basename($_FILES["profile"]["name"]);
        $type = mime_content_type($tmp);

        if (strpos($type, "image") !== 0) {
            die("Uploaded file must be an image.");
        }

        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $destination = $uploadDir . $name;

        if (!move_uploaded_file($tmp, $destination)) {
            die("Image upload failed.");
        }
    } else {
        die("Image upload failed.");
    }

    // Prepare data for insertion
    $data = [
        'name' => $username,
        'email' => $email,
        'password' => $password,
       
        'profile' => $destination
    ];

    // Insert into database
    if (User::insert($data)) {
        header("Location: all_users.php");
        exit;
    } else {
        echo "Error registering user.";
    }
}
?>