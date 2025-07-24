<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $address = isset($_POST["address"]) ? trim($_POST["address"]) : '';
    $country = isset($_POST["country"]) ? $_POST["country"] : '';
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
    $skills = isset($_POST["skills"]) ? implode(", ", $_POST["skills"]) : 'None';
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';
    $department = isset($_POST["department"]) ? trim($_POST["department"]) : '';
    $captcha = isset($_POST["captcha"]) ? trim($_POST["captcha"]) : '';

    $errors = [];

    if (empty($fname)) $errors[] = "First Name is required";
    if (empty($lname)) $errors[] = "Last Name is required";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid Email is required";
    if (empty($gender)) $errors[] = "Gender is required";
    if ($captcha !== "Sh6B6o") $errors[] = "Incorrect CAPTCHA";

    if (!empty($errors)) {
        foreach ($errors as $e) {
            echo "<p style='color:red;'>$e</p>";
        }
        echo '<a href="lab2.html">Go back</a>';
    } else {
        $line = "$fname|$lname|$email|$address|$country|$gender|$skills|$username|$password|$department\n";
        file_put_contents("customer.txt", $line, FILE_APPEND);
        header("Location: view.php");
        exit;
    }
}
?>
