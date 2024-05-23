<?php
include "menu.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skills Form</title>
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

    <h1>Skills Form</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="skillid">skill_id     :</label>
        <input type="number" id="skillid" name="skillid"><br><br>

        <label for="userid">user_id    :</label>
        <input type="number" id="userid" name="userid" required><br><br>

        <label for="skilln">skill_name    :</label>
        <input type="text" id="skilln" name="skilln" required><br><br>

        <label for="profi">proficiency   :</label>
        <input type="text" id="profi" name="profi" required><br><br>

        <label for="cate"> category    :</label>
        <input type="number" id="cate" name="cate" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>

        <a href="./home.php">Go Back to Home</a>
    </form>
<?php
include('database_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Skills (skill_id, user_id, skill_name, proficiency, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $skillid, $userid, $skilln, $profi, $cate);
    // Set parameters and execute
    $skillid = $_POST['skillid'];
    $userid = $_POST['userid'];
    $skilln = $_POST['skilln'];
    $profi = $_POST['profi'];
    $cate = $_POST['cate'];

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
// SQL query to fetch data from the Skills table
$sql = "SELECT * FROM Skills";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail informations Of Skills</title>
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
    <center><h2>Table of Skills</h2></center>
    <table border="5">
        <tr>
            <th>skill_id </th>
            <th>user_id </th>
            <th>skill_name </th>
            <th>proficiency</th>  
            <th>category</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
       include "database_connection.php";

        // Prepare SQL query to retrieve all Skills
        $sql = "SELECT * FROM Skills";
        $result = $connection->query($sql);

        // Check if there are any Skills
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $skill_id = $row['skill_id']; // Fetch the skill_id
                echo "<tr>
                    <td>" . $row['skill_id'] . "</td>
                    <td>" . $row['user_id'] . "</td>
                    <td>" . $row['skill_name'] . "</td>
                    <td>" . $row['proficiency'] . "</td>
                    <td>" . $row['category'] . "</td>
                    <td><a style='padding:4px' href='delete_Skills.php?skill_id=$skill_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Skills.php?skill_id=$skill_id'>Update</a></td> 
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
    <center><b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Maurice NIZEYIMANA_222012402_EXAMINATION_OF_WEB_TECHNOLOGY</h2></b></center>
  </footer>
</body>
</html>
