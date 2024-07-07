<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli("localhost", "root", "", "bookclub");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $mysqli->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: review.php");
    } else {
        echo "Invalid username or password.";
    }

    $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Book Review Club</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Login to Book Review Club</h1>
    </header>
    <nav>
        <div>
            <a href="index.php">Home</a>
            <a href="review.php">Submit Review</a>
			<a href="about.php">About Us</a>
        </div>
        <div>
            <a href="register.php">Register</a>
        </div>
    </nav>
    <div class="container">
		<div class="form-box">
			<h2>Login</h2>
			<form method="post" action="login.php">
				<input type="text" name="username" placeholder="Username" required>
				<input type="password" name="password" placeholder="Password" required>
				<button type="submit">Login</button>
			</form>
		</div>
    </div>
</body>
</html>
