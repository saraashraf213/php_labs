<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $lines = file("users.txt");
    foreach ($lines as $line) {
        list($u, $e, $p, $r, $img) = explode("|", trim($line));
        if ($u === $username && $p === $password) {
            $_SESSION["username"] = $u;
            $_SESSION["email"] = $e;
            $_SESSION["room"] = $r;
            $_SESSION["image"] = $img;
            header("Location: profile.php");
            exit;
        }
    }

    echo "Invalid credentials.";
}
?>
