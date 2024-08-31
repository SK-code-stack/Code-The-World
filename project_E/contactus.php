<?php
$name = $_POST["contactName"];
$email = $_POST["contactEmail"];
$message = $_POST["contactMsg"];


// Database connection
$conn = new mysqli('localhost', 'root', '', 'fyproject');
if ($conn->connect_error){
    die('Connection failed: '.$conn->connect_error);
} else {
   
      // Insert new user
        $stmt = $conn->prepare("INSERT INTO CONTACT_US(userName, userEmail, userMessage) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();
       
        echo "<script> alert('message send successfully'); window.location.replace('contact us.html')</script>";
        
    
    $stmt->close();
    $conn->close();
}

?>
