<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>code > programs</title>

    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="programcss.css">
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
                <a href="#" id="active">PROGRAM</a>
                <a href="job.php">JOB</a>
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
        <!-- php code starts ////////////////////////////////////////////////////////// -->
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

        $sql = "SELECT category, img, title, description FROM courses";
        $result = $conn->query($sql);

        $courses = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $courses[] = $row;
            }
        }

        $conn->close();
        ?>
        <!-- php code end ////////////////////////////////////////////////////////// -->

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const courses = <?php echo json_encode($courses); ?>;
                const courseContainer = document.getElementById('course-container');
                
                const categories = {};

                courses.forEach(course => {
                    if (!categories[course.category]) {
                        categories[course.category] = [];
                    }
                    categories[course.category].push(course);
                });

                for (const [category, items] of Object.entries(categories)) {
                    const categoryDiv = document.createElement('div');
                    categoryDiv.className = 'program-text';
                    const categoryTitle = document.createElement('h1');
                    categoryTitle.textContent = category;
                    categoryDiv.appendChild(categoryTitle);

                    const container = document.createElement('div');
                    container.className = 'container';

                    items.forEach(course => {
                        const courseDiv = document.createElement('div');
                        courseDiv.className = 'courses';

                        const img = document.createElement('img');
                        img.id = 'c1';
                        img.src = course.img;
                        img.alt = course.title;

                        const h1 = document.createElement('h1');
                        h1.className = "course-title";
                        h1.textContent = course.title;

                        const p = document.createElement('p');
                        p.textContent = course.description;

                        const button = document.createElement('button');
                        button.className = 'enroll-btn';
                        button.textContent = 'Enroll Now';
                        button.onclick = () => showForm(course.title);

                        courseDiv.appendChild(img);
                        courseDiv.appendChild(h1);
                        courseDiv.appendChild(p);
                        courseDiv.appendChild(button);

                        container.appendChild(courseDiv);
                    });

                    courseContainer.appendChild(categoryDiv);
                    courseContainer.appendChild(container);
                }
            });


        </script>
    </div>
    <!-- course container ends here//////////////////////////////////////////////////// -->

    <!-- enrollement page Starts here//////////////////////////////////////////////////// -->

    <div id="enroll-page" style="display: none;">
      
        <div class="wrapper" >
            <div class="inner">
                <div class="image-holder">
                    <img src="images/enroll.jpg" class="img" alt="">
                </div>
                <form action="" method="POST">
                    <h3>Registration Form</h3>
                    <div class="form-wrapper">
                       <input type="text" name="enrolledIn" id="show-course" readonly required>
                    </div>
                    <div class="form-group">
                    <input type="text" placeholder="First Name" name="firstname" class="form-control" required oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">

                        <input type="text" placeholder="Last Name" name="lastname" class="form-control" required oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')">
                    </div>
                    <div class="form-wrapper">
                        <input type="text" placeholder="Username" name="username" class="form-control" required minlength="8">
                        <i class="zmdi zmdi-account"></i>
                    </div>
                    <div class="form-wrapper">
                        <input type="text" placeholder="Email Address" name="email" class="form-control" required minlength="13">
                        <i class="zmdi zmdi-email"></i>
                    </div>
                    <div class="form-wrapper">
                        <select name="gander" id="" class="form-control" required>
                            <option value="" disabled selected>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    </div>
                    <div class="form-wrapper">
                        <input type="password" id="password" placeholder="Password" name="password" class="form-control" required minlength="8">
                        <i class="zmdi zmdi-lock"></i>
                    </div>
                    <div class="form-wrapper">
                        <input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirmpassword" class="form-control" minlength="8">
                        <i class="zmdi zmdi-lock"></i>
                    </div>

                    <!-- buttons  -->
                    <div class="btn-container">
                        <button onclick="back_to_program()" id="enroll-pagebtn">Back
                        </button>
                    <button onclick="validatePassword()" id="enroll-pagebtn" type="submit">Enroll
                        <i class="zmdi zmdi-arrow-right"></i>
                    </button>
                <!-- <button type="reset" class="enroll-btn" id="enroll-pagebtn">Reset</button> -->

                    </div>
                </form>
            </div>
        </div>
    </div>








    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $enrolledIn = $_POST["enrolledIn"];
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $userName = $_POST["username"];
        $email = $_POST["email"];
        $gander = $_POST["gander"];
        $password = $_POST["password"];

        $conn = new mysqli('localhost', 'root', '', 'fyproject');
        if ($conn->connect_error) {
            die('Connection failed: '.$conn->connect_error);
        } else {
            $stmt = $conn->prepare("SELECT * FROM STUDENT WHERE username = ?");
            $stmt->bind_param("s", $userName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('Username is already taken.');</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO STUDENT (enrolledIn, firstName, lastName, username, email, password, gander) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss",$enrolledIn, $firstName, $lastName, $userName, $email, $password, $gander);
                $stmt->execute();
                echo "<script>alert('Registration successful.');</script>";
            }

            $stmt->close();
            $conn->close();
        }
    }
    ?>








    <!-- enrollement page Starts here//////////////////////////////////////////////////// -->

    <!-- Footer Starts here//////////////////////////////////////////////////// -->

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
                <a href="#" id="active">PROGRAM</a>
                <a href="job.php">JOB</a>
                <a href="contact us.html">CONTACT US</a>
                <a href="about.html">ABOUT</a>
            </div>
            <div class="line"></div>
            <div class="social">
                <h1>Contact Us</h1>
                <p><i class="fa fa-facebook-square"></i> Code the World</p>
                <p><i class="fa fa-envelope"></i>codetheworld@gmail.com</p>
                <p><i class="fa fa-globe" aria-hidden="true"></i> www.codetheworld.edu.pk</p>
                <p> <i class="fa fa-map-marker"></i> 23-E-III, Gulberg-III, 54660 Lahore, Pakistan</p>
            </div>
        </div>
    </footer>

    <script>
        // Function to check if the pass and cpass is same
        function validatePassword() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password === '' || confirmPassword === '') {
                alert('Please fill in both password and confirm password fields.');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Password and confirm password do not match.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
