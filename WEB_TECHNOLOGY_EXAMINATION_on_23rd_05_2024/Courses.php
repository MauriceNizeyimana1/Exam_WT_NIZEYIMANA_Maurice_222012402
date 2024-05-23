<?php
include "menu.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Courses Form</title>
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
    </style>
</head>
<body>
<section>

    <h1>Courses Form</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="courseid">course_id    :</label>
        <input type="number" id="courseid" name="courseid"><br><br>

        <label for="coachid">coach_id   :</label>
        <input type="number" id="coachid" name="coachid" required><br><br>

        <label for="coursen">course_name   :</label>
        <input type="text" id="coursen" name="coursen" required><br><br>

        <label for="descr">description  :</label>
        <input type="text" id="descr" name="descr" required><br><br>

        <label for="durw">duration   :</label>
        <input type="text" id="durw" name="durw" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>

        <a href="./home.php">Go Back to Home</a>
    </form>
<?php
include('database_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Courses (course_id, coach_id , course_name , description,duration_weeks) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $courseid, $coachid,$coursen,$descr,$durw);
    // Set parameters and execute
    $courseid = $_POST['courseid'];
    $coachid = $_POST['coachid'];
    $coursen = $_POST['coursen'];
    $descr = $_POST['descr'];
    $durw = $_POST['durw'];
   
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
// SQL query to fetch data from the Courses table
$sql = "SELECT * FROM Courses";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail informations Of Courses</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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
    <center><h2>Table of Courses</h2></center>
    <table border="5">
        <tr>
            <th>course_id</th>
            <th>coach_id</th>
            <th>course_name</th>
            <th>description</th>  
            <th>duration_weeks</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
       include "database_connection.php";

        // Prepare SQL query to retrieve all Courses
        $sql = "SELECT * FROM Courses";
        $result = $connection->query($sql);

        // Check if there are any Courses
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $course_id = $row['course_id']; // Fetch the course_id
                echo "<tr>
                    <td>" . $row['course_id'] . "</td>
                    <td>" . $row['coach_id'] . "</td>
                    <td>" . $row['course_name'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['duration_weeks'] . "</td>
                    <td><a style='padding:4px' href='delete_Courses.php?course_id=$course_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Courses.php?course_id=$course_id'>Update</a></td> 
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
    <center><b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Maurice NIZEYIMANA_222012402_EXAM
