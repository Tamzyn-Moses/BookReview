<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "bookclub");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch book reviews
$result = $mysqli->query("SELECT * FROM reviews");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home - Book Review Club</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to the Book Review Club</h1>
    </header>
    <nav>
        <div>
            <a href="index.php">Home</a>
            <a href="review.php">Submit Review</a>
			<a href="about.php">About Us</a>
        </div>
        <div>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
    </nav>
    <div class="container">
        <section>
            <h2>Book Reviews</h2>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='review'><img src='icon.jpg' alt='Book'><div><h3>" . $row["title"] . "</h3><p>" . $row["content"] . "</p></div></div>";
                }
            } else {
                echo "No reviews yet.";
            }
            ?>
        </section>
        <section>
            <h2>Recommendations</h2>
            <div class="recommendations">
                <div class="recommendation-item">
                    <img src="book1.jpg" alt="Book 1">
                    <p>Beautiful Creatures</p>
                </div>
                <div class="recommendation-item">
                    <img src="book2.jpg" alt="Book 2">
                    <p>The Boy Next Door</p>
                </div>
                <div class="recommendation-item">
                    <img src="book3.jpg" alt="Book 3">
                    <p>The Chalice of the Gods</p>
                </div>
				<div class="recommendation-item">
                    <img src="book4.jpg" alt="Book 4">
                    <p>The Hating Game</p>
                </div>
				<div class="recommendation-item">
                    <img src="book5.jpg" alt="Book 5">
                    <p>The Body</p>
                </div>
				<div class="recommendation-item">
                    <img src="book6.jpg" alt="Book 6">
                    <p>You Shouldn't Have Come Here</p>
                </div>
				<div class="recommendation-item">
                    <img src="book7.jpg" alt="Book 7">
                    <p>Dead of Winter</p>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
<?php
$mysqli->close();
?>
