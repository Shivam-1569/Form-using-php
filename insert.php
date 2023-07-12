<?php
// Database configuration
include 'database.php';
// Insert user details into the database
$name = $_POST['name'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$email = $_POST['email'];

$healthReport = $_FILES['healthReport']['name'];
$targetDir = "uploads/";
$targetFile = $targetDir . basename($healthReport);
move_uploaded_file($_FILES['healthReport']['tmp_name'], $targetFile);

$sql = "INSERT INTO users (name, age, weight, email, health_report) VALUES ('$name', '$age', '$weight', '$email', '$healthReport')";

if ($conn->query($sql) === TRUE) {
    echo "User details and health report inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
