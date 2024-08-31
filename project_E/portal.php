<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$servername = "localhost";
$dbUsername = "root";
$password = "";
$dbname = "fyproject";

$conn = new mysqli($servername, $dbUsername, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, email, enrolledIn FROM student WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="portal.css">
</head>
<body>
    <header>
        <div class="logo" title="Code The World">
            <img src="./images/logo.png" alt="">
        </div>
        <div class="navbar">
            <a href="index.html" class="active">
                <span class="material-icons-sharp">home</span>
                <h3>Home</h3>
            </a>
            <!-- <a href="timetable.html" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Time Table</h3>
            </a>  -->
            <a href="exam.html">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Examination</h3>
            </a>
            <a href="index.html">
                <span class="material-icons-sharp" onclick="">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
        <div id="profile-btn">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
    </header>
    <div class="container">
        <aside>
            <div class="profile">
                <div class="top">
                    <div class="profile-photo">
                        <img src="images/profile.webp" alt="">
                    </div>
                    <div class="info">
                        <p>Hey, <b id="student-name"><?php echo htmlspecialchars($student['username']); ?></b></p>
                        <small class="text-muted">welcome back</small>
                    </div>
                </div>
                <div class="about">
                    <h5>Course</h5>
                    <p><?php echo htmlspecialchars($student['enrolledIn']); ?></p>
                    <h5>Email</h5>
                    <p><?php echo htmlspecialchars($student['email']); ?></p>
                </div>
            </div>
        </aside>

        <main>
            <h1>Course</h1>
            <div class="subjects">
                <div class="eg">
                    <span class="material-icons-sharp">architecture</span>
                    <h3><?php echo htmlspecialchars($student['enrolledIn']); ?></h3>
                    <h2>14</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>86%</p></div>
                    </div>
                    <small class="text-muted">Complete woedpress course</small>
                </div>
            </div>

            <div class="timetable" id="timetable">
                <div>
                    <span id="prevDay">&lt;</span>
                    <h2>Today's Timetable</h2>
                    <span id="nextDay">&gt;</span>
                </div>
                <span class="closeBtn" onclick="timeTableAll()">X</span>
                <table>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Room No.</th>
                            <th>Subject</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </main>
    </div>
    <script src="js/timeTable.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
