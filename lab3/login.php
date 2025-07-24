<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to right, #43e97b, #38f9d7);
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: #43e97b;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #38f9d7;
        }

        .note {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .note a {
            color: #007bff;
            text-decoration: none;
        }

        .note a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form class="container" action="process_login.php" method="POST">
        <h2>Login</h2>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">

        <div class="note">
            Don't have an account? <a href="register.php">Register</a>
        </div>
    </form>
</body>
</html>
