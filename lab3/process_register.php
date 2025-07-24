<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $room = $_POST["room"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email.");
    }

    if (isset($_FILES["profile"]) && $_FILES["profile"]["error"] === 0) {
        $tmp = $_FILES["profile"]["tmp_name"];
        $name = time() . "_" . basename($_FILES["profile"]["name"]);
        $type = mime_content_type($tmp);

        if (strpos($type, "image") !== 0) {
            die("Uploaded file must be an image.");
        }

        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) mkdir($uploadDir);
        $destination = $uploadDir . $name;
        move_uploaded_file($tmp, $destination);
    } else {
        die("Image upload failed.");
    }

    $line = "$username|$email|$password|$room|$destination\n";
    file_put_contents("users.txt", $line, FILE_APPEND);
    header("Location: login.php");
    exit;
}
?>
