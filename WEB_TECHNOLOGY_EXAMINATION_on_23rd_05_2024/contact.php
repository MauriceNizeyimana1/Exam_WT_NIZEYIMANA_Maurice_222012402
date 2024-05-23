<?php
include"menu.php";
?>

  <section>
    <style >
      .center-content {
  text-align: center;
  margin: auto;
  width: 50%;
  padding: 20px;
  background-color: skyblue;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.center-content h2 {
  color: blue;
  font-size: 24px;
  text-decoration: underline;
}

.center-content ul {
  list-style-type: none;
  padding: 0;
}

.center-content ul li {
  font-size: 18px;
  margin-bottom: 10px;
}

.center-content form {
  margin-top: 20px;
  text-align: left;
}

.center-content form label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.center-content form input[type="text"],
.center-content form input[type="email"],
.center-content form input[type="tel"],
.center-content form textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

.center-content form input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #0078D4;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.center-content form input[type="submit"]:hover {
  background-color: #005ea2;
}

.center-content p a {
  display: inline-block;
  margin-right: 10px;
  margin-bottom: 10px;
  text-decoration: none;
  color: blue;
}

.center-content p a:hover {
  text-decoration: underline;
}

footer {
  background-color: lightgreen;
  color: #fff;
  padding: 50px;
  text-align: center;
}

    </style>
    <div class="center-content">
      <h2 style="color: blue; font-size: 24px;"><bold><u>CONTACT US ON OUR PLATFORM</u></bold></h2>
      <ul>
        <li style="font-size: 18px;">Address: 500T Main Street, HUYE Town</li>
        <li style="font-size: 18px;">Phone: +250 791051095</li>
        <li style="font-size: 18px;">Email: info@ccareercoachingplatform.com</li>
        <!-- Additional contact information -->
        <li style="font-size: 18px;">Office Hours: Monday to Friday, 9:00 AM to 5:00 PM</li>
        <li style="font-size: 18px;">Emergency Contact: +250 788888888 (2411)</li>
      </ul>

      <!-- Contact form -->
      <form action="submit_contact" method="POST">
        <label for="name">Names:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Telephone:</label><br>
        <input type="tel" id="phone" name="phone"><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea>
        <input type="submit" value="send">
      </form>
      <p>Connect with us on social media or social media available to our project:
      <a href="https://www.twitter.com/labormanagement">Twitter</a>
      <a href="https://www.facebook.com/labormanagement">Facebook</a>
      <a href="https://www.instagram.com/labormanagement">Instagram</a>
      <a href="https://www.linkedin.com/labormanagement">LinkedIn</a>
      <a href="https://www.linkedin.com/labormanagement">Youtube</a>
      <a href="https://www.linkedin.com/labormanagement">Watsapp</a>
    </p>
  </div>
  </section>

  <footer>
    <marquee behavior='alternate'><center><b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Maurice NIZEYIMANA_222012402_EXAMINATION_OF_WEB_TECHNOLOGY</h2></b></center>
  </footer></marquee>
</body>
</html>