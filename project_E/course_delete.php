<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST["deleteCourse"];

    $conn = new mysqli('localhost', 'root', '', 'fyproject');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // code to delete
        $stmt = $conn->prepare("DELETE FROM COURSES WHERE title = ?");
        $stmt->bind_param("s", $course);
        $stmt->execute();

        // Check if course is available or not
        if ($stmt->affected_rows > 0) {
            $_SESSION['deleteCourse'] = $course;
            echo "<script>alert('Delete Successfully');
            window.location.replace('adminportal.php');
            </script>";
            exit();
        } else {
            echo "<script>alert('Course not found');
            window.location.replace('adminportal.php');
            </script>";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
