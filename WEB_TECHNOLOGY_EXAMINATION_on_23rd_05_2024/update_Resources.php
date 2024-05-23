<?php
include('database_connection.php');

// Check if resource_id is set
if(isset($_REQUEST['resource_id'])) {
    $resource_id = $_REQUEST['resource_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Resources WHERE resource_id=?");
    $stmt->bind_param("i", $resource_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $course_id = $row['course_id'];
        $resource_name = $row['resource_name'];
        $type = $row['type'];
        $description = $row['description'];
    } else {
        echo "Resource not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Resources</title>
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

        select {
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
        <!-- Update Resources form -->
        <h2><u>Update Form of Resources</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="courseid">Course ID:</label>
            <input type="number" name="courseid" value="<?php echo isset($course_id) ? $course_id : ''; ?>">
            <br><br>

            <label for="resname">Resource Name:</label>
            <input type="text" name="resname" value="<?php echo isset($resource_name) ? $resource_name : ''; ?>">
            <br><br>

            <label for="typ">Type:</label>
            <select name="typ">
                <option value="Article" <?php if(isset($type) && $type== "Article") echo "selected"; ?>>Article</option>
                <option value="Video" <?php if(isset($type) && $type == "Video") echo "selected"; ?>>Video</option>
                <option value="Document" <?php if(isset($type) && $type == "Document") echo "selected"; ?>>Document</option>
            </select><br><br>

            <label for="descr">Description:</label>
            <input type="text" name="descr" value="<?php echo isset($description) ? $description : ''; ?>">
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
    $course_id = $_POST['courseid'];
    $resource_name = $_POST['resname'];
    $type = $_POST['typ'];
    $description = $_POST['descr'];
    
    // Update the Resources record in the database
    $stmt = $connection->prepare("UPDATE Resources SET course_id=?, resource_name=?, type=?, description=? WHERE resource_id=?");
    $stmt->bind_param("issss", $course_id, $resource_name, $type, $description, $resource_id);
    $stmt->execute();
    
    // Redirect to Resources.php
    header('Location: Resources.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
