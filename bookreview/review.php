<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli("localhost", "root", "", "bookclub");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $title = $_POST["title"];
    $content = $_POST["content"];
    $username = $_SESSION["username"];

    $stmt = $mysqli->prepare("INSERT INTO reviews (title, content, username) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $username);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Submit Review - Book Review Club</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Submit a Book Review</h1>
    </header>
    <nav>
		<div>
			<a href="index.php">Home</a>
			<a href="review.php">Submit Review</a>
			<a href="about.php">About Us</a>
		</div>
	</nav>
    <div class="container">
        <form method="post" action="review.php">
            <input type="text" name="title" placeholder="Book Title" required>
            <textarea name="content" placeholder="Write your review here..." required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
