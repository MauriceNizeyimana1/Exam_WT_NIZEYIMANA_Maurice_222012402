<?php
include('database_connection.php');

// Check if skill_id is set
if(isset($_REQUEST['skill_id'])) {
    $skill_id = $_REQUEST['skill_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Skills WHERE skill_id=?");
    $stmt->bind_param("i", $skill_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $w = $row['user_id'];
        $x = $row['skill_name'];
        $y = $row['proficiency'];
        $z = $row['category'];
    } else {
        echo "Skill not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Skills</title>
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
        <!-- Update Skills form -->
        <h2><u>Update Form of Skills</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="userid">User ID:</label>
            <input type="number" name="userid" value="<?php echo isset($w) ? $w : ''; ?>">
            <br><br>

            <label for="skilln">Skill Name:</label>
            <input type="text" name="skilln" value="<?php echo isset($x) ? $x : ''; ?>">
            <br><br>

            <label for="profi">Proficiency:</label>
            <input type="text" name="profi" value="<?php echo isset($y) ? $y : ''; ?>">
            <br><br>

            <label for="cate">Category:</label>
            <input type="number" name="cate" value="<?php echo isset($z) ? $z : ''; ?>">
            <br><br>

            <input type="hidden" name="skill_id" value="<?php echo $skill_id; ?>">
            <input type="submit" name="up" value="Update">
            <a href="./home.php">Go Back to Home</a><br><br>
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $skill_id = $_POST['skill_id'];
    $user_id = $_POST['userid'];
    $skill_name = $_POST['skilln'];
    $proficiency = $_POST['profi'];
    $category= $_POST['cate'];
    
    // Update the Skills record in the database
    $stmt = $connection->prepare("UPDATE Skills SET user_id=?, skill_name=?, proficiency=?, category=? WHERE skill_id=?");
    $stmt->bind_param("isssi", $user_id, $skill_name, $proficiency, $category, $skill_id);
    $stmt->execute();
    
    // Redirect to Skills.php
    header('Location: Skills.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
