<?php
include('database_connection.php');

// Check if Attendance_Id is set
if(isset($_REQUEST['assessment_id'])) {
    $assessment_id = $_REQUEST['assessment_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Assessments WHERE assessment_id=?");
    $stmt->bind_param("i", $assessment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['assessment_id'];
        $w = $row['client_id'];
        $x = $row['assessment_name'];
        $y = $row['date_taken'];
        $z = $row['score'];
    } else {
        echo "Assessments not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Assessments</title>
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
        <!-- Update Assessments form -->
        <h2><u>Update Form of Assessments</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="clientid">Client ID:</label>
            <input type="number" name="clientid" value="<?php echo isset($w) ? $w : ''; ?>">
            <br><br>

            <label for="assessn">Assessment Name:</label>
            <input type="text" name="assessn" value="<?php echo isset($x) ? $x : ''; ?>">
            <br><br>

            <label for="datet">Date Taken:</label>
            <input type="text" name="datet" value="<?php echo isset($y) ? $y : ''; ?>">
            <br><br>

            <label for="score">Score:</label>
            <input type="number" name="score" value="<?php echo isset($z) ? $z : ''; ?>">
            <br><br>

            <input type="submit" name="up" value="Update">
            <a href="./home.php">Go Back to Home</a><br><br><br>
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $client_id = $_POST['clientid'];
    $assessment_name = $_POST['assessn'];
    $date_taken = $_POST['datet'];
    $score= $_POST['score'];
    
    // Update the Assessments record in the database
    $stmt = $connection->prepare("UPDATE Assessments SET  client_id=?,  assessment_name=?, date_taken=?, score=? WHERE assessment_id=?");
    $stmt->bind_param("sssss", $client_id, $assessment_name, $date_taken, $score, $assessment_id);
    $stmt->execute();
    
    // Redirect to Assessments.php
    header('Location: Assessments.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
