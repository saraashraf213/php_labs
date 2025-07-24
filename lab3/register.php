<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
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

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: #4facfe;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #00c6ff;
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
    <form class="container" action="process_register.php" method="POST" enctype="multipart/form-data">
        <h2>Create Account</h2>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Room Number</label>
        <select name="room" required>
            <option value="Application1">Application1</option>
            <option value="Application2">Application2</option>
            <option value="cloud">Cloud</option>
        </select>

        <label>Profile Picture</label>
        <input type="file" name="profile" accept="image/*" required>

        <input type="submit" value="Register">

        <div class="note">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </form>
</body>
</html>
