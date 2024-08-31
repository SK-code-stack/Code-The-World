function toggleIcons() {

 
    var menuBtn = document.getElementById("menu-btn");
    var cross = document.getElementById("cross");
    var glow = document.getElementById("glo-btn");
  
    if (menuBtn.style.display !== "none") {
      menuBtn.style.display = "none";
      cross.style.display = "inline-block";
      glow.style.display = "none";
      
    } else {
      menuBtn.style.display = "inline-block";
      cross.style.display = "none";
      glow.style.display = "inline-block";

    }
  }

  function toggleNavbar() {
    const navbar = document.getElementById('navbarr');
    navbar.classList.toggle('open');
  }

  function login(){
    window.location.replace("signup.html");
    
  }

 
  function login(){
    window.location.replace("login signup html.html")
  }
  //explor btn
  function goprogram(){
    window.location.replace("program.php")
  }
  function home(){
    window.location.replace("index.html")
  }


  

  window.onload = function() {
    var menuButton = document.getElementById("open-menu");
    menuButton.click();
};

// fee structure 
function fee(){
  window.location.replace("feeStructure.html")

}

function showForm(courseTitle) {
  console.log("Course Title: ", courseTitle); 
  const courseContainer = document.getElementById('course-container');
  const enrollPage = document.getElementById('enroll-page');
  courseContainer.style.display = (courseContainer.style.display === 'none' ? 'block' : 'none');
  enrollPage.style.display = (enrollPage.style.display === 'none' ? 'block' : 'none');                
  document.getElementById('show-course').value = courseTitle;
  window.scrollTo(0, 0);
}

function back_to_program() {
  let form = document.getElementById("enroll-page").style.display="none"; 
  document.getElementById("course-container").style.display="block";            }










