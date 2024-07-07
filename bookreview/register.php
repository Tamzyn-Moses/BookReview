<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli("localhost", "root", "", "bookclub");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

	$name = $_POST["name"];
	$username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();

    header("Location: login.php");
}
?>
<!DOCTYPE html> 
<html>
<head>
    <title>Register - Book Review Club</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Register for Book Review Club</h1>
    </header>
    <nav>
        <div>
            <a href="index.php">Home</a>
            <a href="review.php">Submit Review</a>
            <a href="about.php">About Us</a>
        </div>
        <div>
            <a href="login.php">Login</a>
        </div>
    </nav>
    <div class="container">
        <div class="form-box">
            <h2>Register</h2>
            <form method="post" action="register.php">
                <input type="text" name="name" placeholder="Name" required>
				<input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
