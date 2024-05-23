<?php
include('database_connection.php');

// Check if tracking_id is set
if(isset($_REQUEST['tracking_id'])) {
    $tracking_id = $_REQUEST['tracking_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Progress_Tracking WHERE tracking_id=?");
    $stmt->bind_param("i", $tracking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['tracking_id'];
        $w = $row['client_id'];
        $x = $row['course_id'];
        $y = $row['progress_percentage'];
        $z = $row['completion_status'];
    } else {
        echo "Progress_Tracking not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Progress_Tracking</title>
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
        input[type="text"] {
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
        <!-- Update Progress_Tracking form -->
        <h2><u>Update Form of Progress_Tracking</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="clientid">Client ID:</label>
            <input type="number" name="clientid" value="<?php echo isset($w) ? $w : ''; ?>">
            <br><br>

            <label for="courseid">Course ID:</label>
            <input type="text" name="courseid" value="<?php echo isset($x) ? $x : ''; ?>">
            <br><br>

            <label for="progp">Progress Percentage:</label>
            <input type="number" name="progp" value="<?php echo isset($y) ? $y : ''; ?>">
            <br><br>

            <label for="comples">Completion Status:</label>
            <input type="text" name="comples" value="<?php echo isset($z) ? $z : ''; ?>">
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
    $client_id = $_POST['clientid'];
    $course_id = $_POST['courseid'];
    $progress_percentage = $_POST['progp'];
    $completion_status= $_POST['comples'];
    
    // Update the Progress_Tracking record in the database
    $stmt = $connection->prepare("UPDATE Progress_Tracking SET client_id=?, course_id=?, progress_percentage=?, completion_status=? WHERE tracking_id=?");
    $stmt->bind_param("sssss", $client_id, $course_id, $progress_percentage, $completion_status, $tracking_id);
    $stmt->execute();
    
    // Redirect to Progress_Tracking.php
    header('Location: Progress_Tracking.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
