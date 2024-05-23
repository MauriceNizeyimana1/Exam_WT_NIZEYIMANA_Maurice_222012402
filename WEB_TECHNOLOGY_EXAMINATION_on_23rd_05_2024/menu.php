<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    /* Additional CSS specific to this page */
    /* Additional CSS specific to this page */
body {
  background-image: url('./Image/virtual.jpeg');
  background-size: cover;
  margin: 0;
  padding: 0;
}
header {
  background-color: lightgreen;
  padding: 50px;
  display: flex; /* Use flexbox to align items */
  justify-content: space-between; /* Align items to the left and right */
  align-items: center; /* Center items vertically */
}
.navbar {
  list-style-type: none;
  padding: 0;
  margin: 0px;
  display: flex; /* Use flexbox to align items */
  align-items: center; /* Center items vertically */
}
.navbar li {
  display: inline;
  margin-right: 130px;
}
.navbar li a {
  color: white;
  padding: 10px;
  text-decoration: none;
  background-color: blue;
}
.navbar li a:hover {
  background-color: skyblue;
}
.search-form {
  display: flex; /* Use flexbox to align items */
  align-items: center; /* Center items vertically */
}
.search-input {
  padding: 8px;
  margin-right: 10px;
  border-radius: 5px;
  border: none;
}
.search-button {
  padding: 8px 16px;
  background-color: magenta;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.search-button:hover {
  background-color: purple;
}
.section-heading {
  color: darkred;
  text-align: center;
}
.sub-heading {
  color: red;
  text-align: center;
}
.objectives-list {
  color: blue;
  margin-left: 50px;
}
footer {
  background-color: lightgreen;
  padding: 50px;
  text-align: center;
  color: white;
}

  </style>
</head>
<body style="background-image: url('./Image/virtuall.jpeg'); background-repeat: no-repeat; background-size:cover;">
  <header>
    <ul class="navbar">
      <li><img src="./Image/careerc.jpeg" width="90" height="60" alt="Logo"></li>
      <li><a href="./home.php">HOME</a></li>
      <li><a href="./about.php">ABOUT</a></li>
      <li><a href="./contact.php">CONTACT</a></li>
      <li class="dropdown">
        <a href="#" style="background-color: blue;">TABLES&FORMS</a>
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
        </div>
      </li>
    </ul>
    <form class="search-form" action="search.php" method="GET">
      <input class="search-input" type="text" name="query" placeholder="Search">
      <button class="search-button" type="submit">Search</button>
    </form>
  </header>