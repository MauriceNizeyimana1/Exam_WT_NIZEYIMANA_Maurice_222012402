<?php
include('database_connection.php');

// Check if Course_Id is set
if(isset($_REQUEST['course_id'])) {
    $course_id = $_REQUEST['course_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Courses WHERE course_id=?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['course_id'];
        $w = $row['coach_id'];
        $x = $row['course_name'];
        $y = $row['description'];
        $z = $row['duration_weeks'];
    } else {
        echo "Courses not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Courses</title>
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
        <!-- Update Courses form -->
        <h2><u>Update Form of Courses</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="coachid">Coach ID:</label>
            <input type="number" name="coachid" value="<?php echo isset($w) ? $w : ''; ?>">
            <br><br>

            <label for="coursen">Course Name:</label>
            <input type="text" name="coursen" value="<?php echo isset($x) ? $x : ''; ?>">
            <br><br>

            <label for="descr">Description:</label>
            <input type="text" name="descr" value="<?php echo isset($y) ? $y : ''; ?>">
            <br><br>

            <label for="durw">Duration:</label>
            <input type="number" name="durw" value="<?php echo isset($z) ? $z : ''; ?>">
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
    $course_name = $_POST['coursen'];
    $description = $_POST['descr'];
    $duration= $_POST['durw'];
    
    // Update the Courses record in the database
    $stmt = $connection->prepare("UPDATE Courses SET  coach_id=?,  course_name=?, description=?, duration_weeks=? WHERE course_id=?");
    $stmt->bind_param("sssss", $coach_id, $course_name, $description, $duration, $course_id);
    $stmt->execute();
    
    // Redirect to Courses.php
    header('Location: Courses.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
