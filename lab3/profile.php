<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Profile</title>
    <style>
        body {
            background: #f1f1f1;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }

        .profile-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #43e97b;
        }

        h2 {
            margin: 15px 0 5px;
            color: #333;
        }

        p {
            color: #666;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            background-color: #43e97b;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
        }

        a:hover {
            background-color: #38f9d7;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <img src="<?php echo $_SESSION['image']; ?>" alt="Profile">
        <h2><?php echo $_SESSION['username']; ?></h2>
        <p>Email: <?php echo $_SESSION['email']; ?></p>
        <p>Room: <?php echo $_SESSION['room']; ?></p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
