<?php
include('database_connection.php');

// Check if session_id is set
if(isset($_REQUEST['session_id'])) {
    $session_id = $_REQUEST['session_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Sessions WHERE session_id=?");
    $stmt->bind_param("i", $session_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['session_id'];
        $w = $row['coach_id'];
        $x = $row['client_id'];
        $y = $row['date_time'];
        $z = $row['duration_minutes'];
    } else {
        echo "Sessions not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Sessions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        center {
            margin-top: 50px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0078D4;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #005ea2;
        }
    </style>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Sessions form -->
        <h2><u>Update Form of Sessions</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="coachid">coach_id:</label>
            <input type="number" name="coachid" value="<?php echo isset($w) ? $w : ''; ?>">
            <br><br>

            <label for="clientid">client_id:</label>
            <input type="number" name="clientid" value="<?php echo isset($x) ? $x : ''; ?>">
            <br><br>

            <label for="dtime">date_time:</label>
            <input type="date" name="dtime" value="<?php echo isset($y) ? $y : ''; ?>">
            <br><br>

            <label for="dminutes">duration_minutes:</label>
            <input type="time" name="dminutes" value="<?php echo isset($z) ? $z : ''; ?>">
            <br><br>

            <input type="submit" name="up" value="Update">

            <a href="./home.php">Go Back to Home</a><br><br>
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $coach_id = $_POST['coachid'];
    $client_id = $_POST['clientid'];
    $date_time = $_POST['dtime'];
    $duration_minutes = $_POST['dminutes'];
    
    // Update the Sessions record in the database
    $stmt = $connection->prepare("UPDATE Sessions SET  coach_id=?,  client_id=?, date_time=?, duration_minutes=? WHERE session_id=?");
    $stmt->bind_param("sssss", $coach_id, $client_id, $date_time, $duration_minutes, $session_id);
    $stmt->execute();
    
    // Redirect to Sessions.php
    header('Location: Sessions.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
