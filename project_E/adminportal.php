<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>

    <!-- CSS stylesheets -->
    <link rel="stylesheet" href="feeStructure.css">
    <link rel="stylesheet" href="enroll.css">
    <!-- css link for arrow in btn  -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- JavaScript for toggling profiles -->
    <script>
        function profile(tab) {
            document.getElementById("profile1").style.display = "none";
            document.getElementById("profile2").style.display = "none";
            document.getElementById(tab).style.display = "block";
        }
    </script>
</head>
<body>
    <section class="top-bar">
        <h1>Admin Portal</h1>
    </section>
    <aside class="side-bar">
        <div class="img">
            <img src="images/logo.png" alt="">
        </div>
        <div class="tab">
            <a onclick="profile('profile1')">Edit Courses</a>
            <a onclick="profile('profile2')">Edit Jobs</a>
            <a href="login signup html.html">Logout</a>
        </div>
    </aside>

    <div class="main">
        <div class="content" id="profile1">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h3 class="heading">Add Courses</h3>
                <div class="form-group">
                    <input type="number" placeholder="Course Id"  name="courseId" class="form-control" required>
                    <select name="category" class="form-control">
                        <option value="" disabled selected>Course</option>
                        <option value="Development">Development</option>
                        <option value="Languages">Languages</option>
                        <option value="Graphic Designing">Graphic Designing</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Image path"  name="image" class="form-control">
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Course title"  name="title" class="form-control" required>
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Description"  name="description" class="form-control" required>
                </div>
                <button class="post-btn" type="submit">Post 
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
            <br>
            <br>
            <!-- delete course  -->
             <form action="course_delete.php" method="post">
             <h3 class="heading">Delete Course</h3>

             <div class="form-wrapper">
                    <input type="text" placeholder="Name of Course"  name="deleteCourse" class="form-control" required>
             </div>
             <button class="post-btn" type="submit">Delete 
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
             </form>
        </div>

        <div class="content" id="profile2" style="display: none;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h3 class="heading">Add Jobs</h3>
                <div class="form-group">
                    <input type="text" placeholder="Job Id"  name="jobId" class="form-control">
                    <select name="category" class="form-control">
                        <option value="" disabled selected>Category</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                    </select>
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Image path"  name="image" class="form-control">
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Job title"  name="title" class="form-control">
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Description"  name="description" class="form-control">
                </div>
                <button class="post-btn" type="submit">Post <i class="zmdi zmdi-arrow-right"></i></button>
            </form>
<br>
<br>
<!-- to delete jobs  -->

            <form action="job_delete.php" method="post">
            <h3 class="heading">Delete Jobs</h3>

             <div class="form-wrapper">
                    <input type="text" placeholder="Title of Job"  name="deleteJob" class="form-control" required>
             </div>
             <button class="post-btn" type="submit">Delete 
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
             </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check which form was submitted
        if (isset($_POST['courseId']) && isset($_POST['category']) && isset($_POST['title']) && isset($_POST['description'])) {
            // Add Course
            $courseId = $_POST["courseId"];
            $category = $_POST["category"];
            $image = isset($_POST["image"]) ? $_POST["image"] : "";
            $title = $_POST["title"];
            $description = $_POST["description"];

            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'fyproject');
            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            // Prepare and execute SQL statement
            $stmt = $conn->prepare("SELECT * FROM COURSES WHERE id = ?");
            $stmt->bind_param("s", $courseId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('Course ID is already taken.');</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO COURSES (Id, category, img, title, description) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $courseId, $category, $image, $title, $description);
                $stmt->execute();
                echo "<script>alert('Course added successfully.');</script>";
            }

            $stmt->close();
            $conn->close();
        } elseif (isset($_POST['jobId']) && isset($_POST['category']) && isset($_POST['title']) && isset($_POST['description'])) {
            // Add Job
            $jobId = $_POST["jobId"];
            $category = $_POST["category"];
            $image = isset($_POST["image"]) ? $_POST["image"] : "";
            $title = $_POST["title"];
            $description = $_POST["description"];

            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'fyproject');
            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            // Prepare and execute SQL statement
            $stmt = $conn->prepare("SELECT * FROM JOBS WHERE id = ?");
            $stmt->bind_param("s", $jobId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('Job ID is already taken.');</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO JOBS (id, category, img, title, description) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $jobId, $category, $image, $title, $description);
                $stmt->execute();
                echo "<script>alert('Job added successfully.');</script>";
            }

            $stmt->close();
            $conn->close();
        }
    }
    ?>
</body>
</html>
