<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Website Register/Login Page</title>
<style>
  body {
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: url('./Images/image.jpeg') center/cover no-repeat; /* Updated background image */
    color: #FFFFFF; /* White */
    background-blend-mode: overlay;
    height: 100vh;
}

.overlay {
    background-color: rgba(0, 0, 0, 0.5); /* Updated overlay color with 50% opacity */
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
    z-index: 1; /* Ensure overlay is above the background */
}

.container {
    position: relative;
    z-index: 2; /* Ensure container is above the overlay */
}

h1 {
    font-size: 3rem;
    margin-bottom: 20px;
}

p {
    font-size: 1.2rem;
    margin-bottom: 30px;
}

.btn {
    display: inline-block;
    padding: 15px 40px; /* Decreased button padding for a more compact look */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.2rem;
    text-decoration: none;
    color: #FFFFFF; /* White */
    transition: background-color 0.3s ease;
}

.btn-login {
    background-color: #007BFF; /* Blue */
}

.btn-register {
    background-color: #6F42C1; /* Purple */
    margin-left: 20px;
}

.btn:hover {
    filter: brightness(0.8); /* Darken button on hover */
}

/* Keyframes for slideshow animation */
@keyframes slideImages {
    0%, 33.33% {
        background-image: url('./Images/sky4.jpg');
    }
    33.33%, 66.66% {
        background-image: url('./Images/sky3.jpg');
    }
    66.66%, 100% {
        background-image: url('./Images/sky2.jpg');
    }
}

/* Animation */
@keyframes move {
    0% { transform: translateY(-50%); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}

.moving-text {
    animation: move 10s infinite alternate;
}

</style>
</head>
<body style="background-image: url('./Images/image.jpeg');background-repeat: no-repeat;background-size: cover;">

<div class="overlay">
  <div class="container">
    <h1 style="color:black;">WELCOME TO VIRTUAL_CAREER_COACHING</h1>
    <p><i><b>"Navigate Your Future: Virtually Guided Success"</b></i></p>

    <a href="login.html" class="btn btn-login">Login</a>
    <a href="register.html" class="btn btn-register">Register</a>
  </div>
</div>

</body>
</html>