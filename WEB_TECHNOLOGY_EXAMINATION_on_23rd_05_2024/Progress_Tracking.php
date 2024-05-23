<?php
include "menu.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Progress_Tracking Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        section {
            padding: 20px;
            display: flex;
            justify-content: flex-start; /* Align content to the left */
            align-items: flex-start;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 50%;
            margin-right: auto; /* Push form to the left */
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

        a {
            display: block;
            text-align: center;
            color: #0078D4;
            text-decoration: none;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<section>

    <h1>Progress_Tracking Form</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="trackid">tracking_id:</label>
        <input type="number" id="trackid" name="trackid"><br><br>

        <label for="clientid">client_id:</label>
        <input type="number" id="clientid" name="clientid" required><br><br>

        <label for="courseid">course_id:</label>
        <input type="number" id="courseid" name="courseid" required><br><br>

        <label for="progp">progress_percentage:</label>
        <input type="number" id="progp" name="progp" required><br><br>

        <label for="comples">completion_status:</label>
        <input type="text" id="comples" name="comples" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>

        <a href="./home.php">Go Back to Home</a>
    </form>

    <?php
    include('database_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind the parameters
        $stmt = $connection->prepare("INSERT INTO Progress_Tracking (tracking_id, client_id, course_id, progress_percentage, completion_status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiids", $trackid, $clientid, $courseid, $progp, $comples);

        // Set parameters and execute
        $trackid = $_POST['trackid'];
        $clientid = $_POST['clientid'];
        $courseid = $_POST['courseid'];
        $progp = $_POST['progp'];
        $comples = $_POST['comples'];
       
        if ($stmt->execute() == TRUE) {
            echo "New record has been added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $connection->close();
    ?>

    <center><h2>Table of Progress_Tracking</h2></center>
    <table border="5">
        <tr>
            <th>tracking_id</th>
            <th>client_id</th>
            <th>course_id</th>
            <th>progress_percentage</th>  
            <th>completion_status</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include "database_connection.php";

        // Prepare SQL query to retrieve all Progress_Tracking 
        $sql = "SELECT * FROM Progress_Tracking";
        $result = $connection->query($sql);

        // Check if there are any Progress_Tracking 
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $tracking_id = $row['tracking_id']; // Fetch the tracking_id
                echo "<tr>
                    <td>" . $row['tracking_id'] . "</td>
                    <td>" . $row['client_id'] . "</td>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['progress_percentage'] . "</td>
                    <td>" . $row['completion_status'] . "</td>
                    <td><a style='padding:4px' href='delete_Progress_Tracking.php?tracking_id=$tracking_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Progress_Tracking.php?tracking_id=$tracking_id'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>
</section>
 <footer>
    <center><b><h2>UR CBE BIT &copy, 2024 &reg, Designed by: @Maurice NIZEYIMANA_222012402_EXAMINATION_OF_WEB_TECHNOLOGY</h2></b></center>
  </footer>
</body>
</html>
