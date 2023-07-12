<?php
// Database configuration
include 'database.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_GET['email'];

$sql = "SELECT health_report FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $healthReport = $row['health_report'];

    // Download the health report
    $filePath = "uploads/" . $healthReport;
    if (file_exists($filePath)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $healthReport . '"');
        readfile($filePath);
    } else {
        echo "Health report not found.";
    }
} else {
    echo "User not found.";
}

// Close the database connection
$conn->close();
?>
