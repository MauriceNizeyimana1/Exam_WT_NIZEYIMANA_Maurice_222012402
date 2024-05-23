<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    /* Additional CSS specific to this page */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('./Image/virtual.jpeg');
      background-size: cover;
    }

    header {
      background-color: #2ecc71; /* Update background color */
      padding: 20px; /* Add padding */
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: #fff; /* Change text color */
    }

    .navbar {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: flex;
      align-items: center;
    }

    .navbar li {
      margin-right: 20px;
    }

    .navbar li a {
      color: #fff;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .navbar li a:hover {
      background-color: #27ae60;
    }

    .search-form {
      display: flex;
      align-items: center;
    }

    .search-input {
      padding: 8px;
      margin-right: 10px;
      border-radius: 5px;
      border: none;
    }

    .search-button {
      padding: 8px 16px;
      background-color: #9b59b6;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .search-button:hover {
      background-color: #8e44ad;
    }

    section {
      padding: 20px;
      color: #fff;
    }

    .section-heading {
      text-align: centre;

      font-size: 36px;
      margin-bottom: 20px;
    }

    .sub-heading {
      text-align: center;
      font-size: 24px;
      margin-bottom: 40px;
    }

    .objectives-list {
      margin-left: 50px;
      font-size: 18px;
    }

    footer {
      background-color: #2ecc71;
      padding: 20px;
      text-align: center;
      color: #fff;
    }
  </style>
</head>
<body>

<header>
  <ul class="navbar">
    <li><img src="./Image/careerc.jpeg" width="90" height="60" alt="Logo"></li>
    <li><a href="./home.php">HOME</a></li>
    <li><a href="./about.php">ABOUT</a></li>
    <li><a href="./contact.php">CONTACT</a></li>
    <li class="dropdown">
      <a href="#" style="background-color: ;">TABLES&FORMS</a>
      <div class="dropdown-contents">
        <a href="./Coaches.php">COACHES</a>
        <a href="./Clients.php">CLIENTS</a>
        <a href="./Sessions.php">SESSIONS</a>
        <a href="./Career_Plans.php">CAREER_PLANS</a>
        <a href="./Courses.php">COURSES</a>
        <a href="./Skills.php">SKILLS</a>
        <a href="./Assessments.php">ASSESSMENTS</a>
        <a href="./Progress_Tracking.php">PROGRESS_TRACKING</a>
        <a href="./Resources.php">RESOURCES</a>
        <a href="./Feedback.php">FEEDBACK</a>
      </div>
    </li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
  <form class="search-form" action="search.php" method="GET">
    <input class="search-input" type="text" name="query" placeholder="Search">
    <button class="search-button" type="submit">Search</button>
  </form>
</header>

<section>
  <div class="container">
    <marquee behavior='alternate'><h1 class="section-heading">Welcome to Our Virtual Career Coaching Platform</h1></marquee>
    <p class="sub-heading">Empowering Your Career Journey</p>
  </div>
    <ol class="objectives-list"><br><br><br><br><br>
    <h2 class="section-heading"><u>Some Specific Purposes and Objectives of  Online Career Coaching Platform:</u></h2>
    <li>Career Exploration</li>
    <li>Resume Building</li>
    <li>Interview Preparation</li>
    <li>Skills Development</li>
    <li>Networking Opportunities</li>
    <li>Personal Branding</li>
    <li>Goal Setting and Planning</li>
    <li>Job Search Assistance</li>
    <li>Career Transition Support</li>
    <li>Professional Development</li>
    <li>Feedback and Assessment</li>
    <li>Emotional Support</li>
    <li>Work-Life Balance</li>
    <li>Entrepreneurship Support</li>
    <li>Community Engagement</li>
  </ol>
</section>

<footer>
  <marquee behavior='alternate'><h2>UR CBE BIT &copy; 2024 &reg; Designed by: @Maurice NIZEYIMANA_222012402_EXAMINATION_OF_WEB_TECHNOLOGY</h2></marquee>
</footer>

</body>
</html>

