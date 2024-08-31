<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'fyproject');
    if ($conn->connect_error) {
        die('Connection failed: '.$conn->connect_error);
    } else {
        // Check if username and password match
        $stmt = $conn->prepare("SELECT * FROM STUDENT WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Username and password match
            $_SESSION['username'] = $username;
            header("Location:portal.php");
            exit();
        } else {
            // Username or password is incorrect
            echo "<script>alert('invalid username or password').</script>";
            
        }

        $stmt->close();
        $conn->close();
    }
}
?>

