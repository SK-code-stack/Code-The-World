<?php
$jobId = $_POST["jobId"];
$category = $_POST["category"];
$image = $_POST["image"];
$title = $_POST["title"];
$description = $_POST["description"];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fyproject');
if ($conn->connect_error){
    die('Connection failed: '.$conn->connect_error);
} else {
    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM JOBS WHERE id = ?");
    $stmt->bind_param("s", $jobId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<script>alert('Email is already taken.');</script>";

    } else {
        // Insert new course
        $stmt = $conn->prepare("INSERT INTO jobs (id, category, img, title, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $jobId, $category, $image, $title, $description);
        $stmt->execute();
        echo "<script>alert('Registration successful.');</script>";

    }
    
    $stmt->close();
    $conn->close();
}

?>
