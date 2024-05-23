<?php
include('database_connection.php');

// Check if Attendance_Id is set
if(isset($_REQUEST['plan_id'])) {
    $plan_id = $_REQUEST['plan_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Career_Plans WHERE plan_id=?");
    $stmt->bind_param("i", $plan_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['plan_id'];
        $w = $row['client_id'];
        $x = $row['plan_title'];
        $y = $row['description'];
        $z = $row['target_job'];
    } else {
        echo "Career_Plans not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Career_Plans</title>
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
        <!-- Update Career_Plans form -->
        <h2><u>Update Form of Career_Plans</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="clientid">Client ID:</label>
            <input type="number" name="clientid" value="<?php echo isset($w) ? $w : ''; ?>">
            <br><br>

            <label for="plant">Plan Title:</label>
            <input type="text" name="plant" value="<?php echo isset($x) ? $x : ''; ?>">
            <br><br>

            <label for="descr">Description:</label>
            <input type="text" name="descr" value="<?php echo isset($y) ? $y : ''; ?>">
            <br><br>

            <label for="tagj">Target Job:</label>
            <input type="text" name="tagj" value="<?php echo isset($z) ? $z : ''; ?>">
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
    $plan_title = $_POST['plant'];
    $description = $_POST['descr'];
    $target_job = $_POST['tagj'];
    
    // Update the attendance record in the database
    $stmt = $connection->prepare("UPDATE Career_Plans SET  client_id=?,  plan_title=?, description=?, target_job=? WHERE plan_id=?");
    $stmt->bind_param("sssss", $client_id, $plan_title, $description, $target_job, $plan_id);
    $stmt->execute();
    
    // Redirect to Payroll.php
    header('Location: Career_Plans.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
