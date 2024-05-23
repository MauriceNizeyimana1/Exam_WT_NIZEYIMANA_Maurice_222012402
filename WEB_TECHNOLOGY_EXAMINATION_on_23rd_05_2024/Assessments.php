<?php
include "menu.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assessments Form</title>
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
        input[type="date"] {
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

    <h1>Assessments Form</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="assessid">assessment_id     :</label>
        <input type="number" id="assessid" name="assessid"><br><br>

        <label for="clientid">client_id    :</label>
        <input type="number" id="clientid" name="clientid" required><br><br>

        <label for="assessn">assessment_name    :</label>
        <input type="text" id="assessn" name="assessn" required><br><br>

        <label for="datet">date_taken   :</label>
        <input type="date" id="datet" name="datet" required><br><br>

        <label for="score"> score    :</label>
        <input type="number" id="score" name="score" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>

        <a href="./home.php">Go Back to Home</a>
    </form>
<?php
include('database_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Assessments (assessment_id, client_id, assessment_name, date_taken, score) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $assessid, $clientid, $assessn, $datet, $score);
    // Set parameters and execute
    $assessid = $_POST['assessid'];
    $clientid = $_POST['clientid'];
    $assessn = $_POST['assessn'];
    $datet = $_POST['datet'];
    $score = $_POST['score'];

    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>


<?php
include('database_connection.php');
// SQL query to fetch data from the Assessments table
$sql = "SELECT * FROM Assessments";
$result = $connection->query($sql);

?>

    <center><h2>Table of Assessments</h2></center>
    <table border="5">
        <tr>
            <th>assessment_id</th>
            <th>client_id</th>
            <th>assessment_name</th>
            <th>date_taken</th>  
            <th>score</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include "database_connection.php";

        // Prepare SQL query to retrieve all Assessments
        $sql = "SELECT * FROM Assessments";
        $result = $connection->query($sql);

        // Check if there are any Assessments
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $assessment_id = $row['assessment_id']; // Fetch the assessment_id
                echo "<tr>
                    <td>" . $row['assessment_id'] . "</td>
                    <td>" . $row['client_id'] . "</td>
                    <td>" . $row['assessment_name'] . "</td>
                    <td>" . $row['date_taken'] . "</td>
                    <td>" . $row['score'] . "</td>
                    <td><a style='padding:4px' href='delete_Assessments.php?assessment_id=$assessment_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Assessments.php?assessment_id=$assessment_id'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
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
