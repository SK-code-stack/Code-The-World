<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job = $_POST["deleteJob"];

    $conn = new mysqli('localhost', 'root', '', 'fyproject');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // code to delete
        $stmt = $conn->prepare("DELETE FROM JOBS WHERE title = ?");
        $stmt->bind_param("s", $job);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['deleteJob'] = $job;
            echo "<script>alert('Delete Successfully');
            window.location.replace('adminportal.php');
            </script>";
            exit();
        } else {
            echo "<script>alert('Job not found');
            window.location.replace('adminportal.php');
            </script>";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
