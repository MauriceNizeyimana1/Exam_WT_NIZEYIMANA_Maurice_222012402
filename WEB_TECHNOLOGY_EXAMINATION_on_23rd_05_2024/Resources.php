<?php
include "menu.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resources Form</title>
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
        input[type="text"],
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

    <h1>Resources Form</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="resid">Resource ID:</label>
        <input type="number" id="resid" name="resid"><br><br>

        <label for="courseid">Course ID:</label>
        <input type="number" id="courseid" name="courseid" required><br><br>

        <label for="resname">Resource Name:</label>
        <input type="text" id="resname" name="resname" required><br><br>

        <label for="typ">Type:</label>
        <select id="typ" name="typ" required>
            <option value="article">Article</option>
            <option value="video">Video</option>
            <option value="document">Document</option>
        </select><br><br>

        <label for="descr">Description:</label>
        <input type="text" id="descr" name="descr" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>

        <a href="./home.php">Go Back to Home</a>
    </form>

    <?php
    include('database_connection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind the parameters
        $stmt = $connection->prepare("INSERT INTO Resources (resource_id, course_id, resource_name, type, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $resid, $courseid, $resname, $typ, $descr);

        // Set parameters and execute
        $resid = $_POST['resid'];
        $courseid = $_POST['courseid'];
        $resname = $_POST['resname'];
        $typ = $_POST['typ'];
        $descr = $_POST['descr'];
       
        if ($stmt->execute() == TRUE) {
            echo "New record has been added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $connection->close();
    ?>

    <center><h2>Table of Resources</h2></center>
    <table border="5">
        <tr>
            <th>resource_id</th>
            <th>course_id</th>
            <th>resource_name</th>
            <th>type</th>  
            <th>description</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include "database_connection.php";

        // Prepare SQL query to retrieve all Resources
        $sql = "SELECT * FROM Resources";
        $result = $connection->query($sql);

        // Check if there are any Resources
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $resource_id = $row['resource_id']; // Fetch the resource_id
                echo "<tr>
                    <td>" . $row['resource_id'] . "</td>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['resource_name'] . "</td>
                    <td>" . $row['type'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td><a style='padding:4px' href='delete_Resources.php?resource_id=$resource_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Resources.php?resource_id=$resource_id'>Update</a></td> 
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
