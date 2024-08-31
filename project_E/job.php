<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>code > jobs</title>

    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="job.css">
    <link rel="stylesheet" href="header footer.css">
    <link rel="stylesheet" href="enroll.css">

    <script src="js/home.js"></script>
</head>
<body>
    <header class="hader">
        <nav class="navbar">
            <div class="logo">
                <a href="#">
                    <img src="pictures/mylogo.PNG" alt="Code World">
                </a>
            </div>
            <div class="tab" id="navbarr">
                <a href="index.html">HOME</a>
                <a href="program.php" >PROGRAM</a>
                <a href="#" id="active">JOB</a>
                <a href="contact us.html">CONTACT US</a>
                <a href="about.html">ABOUT</a>
            </div>
            <div id="drop-search" class="search-container">
                <input type="text" name="search" placeholder="Search..." class="search-input">
                <a href="#" class="search-btn">
                    <i class="fas fa-search"></i>
                </a>
            </div>
            <button class='glowing-btn' onclick="login()"><span class='glowing-txt'>L<span class='faulty-letter'>O</span>GIN</span></button>
            <i id="menu-btn" class="fa fa-bars" onclick=" toggleNavbar() , toggleIcons() " ></i>
            <i id="cross" class="fa fa-times" aria-hidden="true" onclick= "toggleNavbar() , toggleIcons()"></i>
        </nav>
    </header>

    <div class="blank"></div>

    <div id="course-container">
     <!-- PHP code to fetch job data -->
     <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "fyproject";

     // Create connection to database
     $conn = new mysqli($servername, $username, $password, $dbname);

     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT category, img, title, description FROM jobs";
     $result = $conn->query($sql);

     $jobs = array();

     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             $jobs[] = $row;
         }
     }

     $conn->close();
     ?>

     <!-- JavaScript code to dynamically display job cards -->
     <script>
            document.addEventListener("DOMContentLoaded", () => {
                const jobs = <?php echo json_encode($jobs); ?>;
                const courseContainer = document.getElementById('course-container');
                
                const categories = {};

                jobs.forEach(job => {
                    if (!categories[job.category]) {
                        categories[job.category] = [];
                    }
                    categories[job.category].push(job);
                });

                for (const [category, items] of Object.entries(categories)) {
                    const categoryDiv = document.createElement('div');
                    categoryDiv.className = 'program-text';
                    const categoryTitle = document.createElement('h1');
                    categoryTitle.textContent = category;
                    categoryDiv.appendChild(categoryTitle);

                    const container = document.createElement('div');
                    container.className = 'container';

                    items.forEach(job => {
                        const jobDiv = document.createElement('div');
                        jobDiv.className = 'courses';

                        const img = document.createElement('img');
                        img.id = 'c1';
                        img.src = job.img;
                        // img.alt = job.title;

                        const h1 = document.createElement('h1');
                        h1.textContent = job.title;

                        const p = document.createElement('p');
                        p.textContent = job.description;

                        const button = document.createElement('button');
                        button.className = 'enroll-btn';
                        button.textContent = 'Apply Now';
                        button.onclick = () => showForm(job.title);

                        jobDiv.appendChild(img);
                        jobDiv.appendChild(h1);
                        jobDiv.appendChild(p);
                        jobDiv.appendChild(button);

                        container.appendChild(jobDiv);
                    });

                    courseContainer.appendChild(categoryDiv);
                    courseContainer.appendChild(container);
                }
            });

            function showForm(jobTitle) {
    console.log("Job Title: ", jobTitle); // Debugging line
    const jobContainer = document.getElementById('course-container');
    const applyPage = document.getElementById('enroll-page');
    
    jobContainer.style.display = (jobContainer.style.display === 'none' ? 'block' : 'none');
    applyPage.style.display = (applyPage.style.display === 'none' ? 'block' : 'none');
    
    document.getElementById('show-job').value = jobTitle;
    
    window.scrollTo(0, 0);
}

        </script>
    </div>
    <!-- Job cards end here -->

    <!-- Job form starts here -->
    <div id="enroll-page"  style="display: none;">
        <div class="wrapper" style="background-image: url(pictures/home\ back.PNG);">
            <div class="inner">
                <div class="image-holder">
                    <img src="images/enroll.jpg" class="img" alt="">
                </div>
                <form action="" method="POST">
                    <h3>Job Registration Form</h3>
                    <div class="form-wrapper">
                    <input type="text" name="jobPosition" id="show-job" readonly required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="First Name" name="firstname" class="form-control" required oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
                        <input type="text" placeholder="Last Name" name="lastname" class="form-control" required oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
                    </div>
                    <div class="form-wrapper">
                        <input type="text" placeholder="Recent Degree" name="degree" class="form-control" required oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
                    </div>
                    <div class="form-wrapper">
                        <select name="experiance" class="form-control" required>
                            <option value="" disabled selected>Experience</option>
                            <option value="Fresh">Fresh</option>
                            <option value="Experienced">Experienced</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    </div>
                    <div class="form-wrapper">
                        <input type="text" placeholder="Last Job / None" name="lastJob" class="form-control" required>
                    </div>
                    <div class="form-wrapper">
                        <input type="text" placeholder="Email Address" name="email" class="form-control" required minlength="13">
                        <i class="zmdi zmdi-email"></i>
                    </div>
                    <div class="form-wrapper">
                        <select name="gander" class="form-control" required>
                            <option value="" disabled selected>Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="O">Other</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    </div>
                    <div class="form-wrapper">
                        <input type="number" placeholder="Phone No." name="contact" class="form-control" required maxlength="11">
                    </div>

                    <!-- buttons  -->
                    <div class="btn-container">
                    <button onclick="back_to_program()" name="submit" class="enroll-btn" id="enroll-pagebtn" >Back
                    </button>
                    <button type="submit" name="submit" class="enroll-btn" id="enroll-pagebtn" >Apply
                        <i class="zmdi zmdi-arrow-right"></i>
                    </button>
                    <!-- <button type="reset" class="enroll-btn" id="enroll-pagebtn">Reset</button> -->
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Job form end here -->

    <!-- PHP code to handle job form submission -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jobPosition = $_POST["jobPosition"];
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $degree = $_POST["degree"];
        $email = $_POST["email"];
        $experiance = $_POST["experiance"];
        $gander = $_POST["gander"];
        $lastJob = $_POST["lastJob"];
        $contact = $_POST["contact"];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'fyproject');
        if ($conn->connect_error) {
            die('Connection failed: '.$conn->connect_error);
        } else {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT * FROM CANDIDATE WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                echo "<script>alert('Email is already taken.');</script>";
            } else {
                // Insert new candidate
                $stmt = $conn->prepare("INSERT INTO CANDIDATE (jobPosition, firstName, lastName, degree, experiance, lastJob, email, gander, contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssssi", $jobPosition, $firstName, $lastName, $degree, $experiance, $lastJob, $email, $gander, $contact);
                $stmt->execute();
                echo "<script>alert('Registration successful.');</script>";
            }
            
            $stmt->close();
            $conn->close();
        }
    }
    ?>
    <!-- PHP code end -->

    <!-- Footer starts here -->
    <footer>
        <div class="program-text">
            <h1>Quick Links</h1>
        </div>
        <div class="end">
            <div class="logo">
                <a href="#"><img id="pic2" src="pictures/mylogo.PNG" alt=""></a>
            </div>
            <div class="line"></div>
            <div class="link">
                <h1>Quick Links</h1>
                <a href="index.html">HOME</a>
                <a href="program.php" >PROGRAM</a>
                <a href="#" id="active">JOB</a>
                <a href="contact us.html">CONTACT US</a>
                <a href="about.html">ABOUT</a>
            </div>
            <div class="line"></div>
            <div class="social">
                <h1>Contact Us</h1>
                <p><i class="fa fa-facebook-square"></i> Code the World</p>
                <p><i class="fa fa-envelope"></i> codetheworld@gmail.com</p>
                <p><i class="fa fa-globe" aria-hidden="true"></i> www.codetheworld.edu.pk</p>
                <p><i class="fa fa-map-marker"></i> 23-E-III, Gulberg-III, 54660 Lahore, Pakistan</p>
            </div>
        </div>
    </footer>
    <!-- Footer ends here -->
</body>
</html>
