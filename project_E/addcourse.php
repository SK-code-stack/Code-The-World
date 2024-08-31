<?php
$courseId = $_POST["courseId"];
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
    $stmt = $conn->prepare("SELECT * FROM COURSES WHERE id = ?");
    $stmt->bind_param("s", $courseId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<script>alert('Email is already taken.');</script>";
    } else {
        // Insert new course
        $stmt = $conn->prepare("INSERT INTO COURSES (Id, category, img, title, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $courseId, $category, $image, $title, $description);
        $stmt->execute();
                echo "<script>alert('Registration successful.');</script>";
        
    }
    
    $stmt->close();
    $conn->close();
}

?>
