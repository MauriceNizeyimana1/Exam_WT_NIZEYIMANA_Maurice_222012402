<?php
include "menu.php";
?>
<section>

    <h1>Career_Plans  Form</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="planid">plan_id   :</label>
        <input type="number" id="planid" name="planid"><br><br>

        <label for="clientid">client_id  :</label>
        <input type="number" id="clientid" name="clientid" required><br><br>

        <label for="plant">plan_title  :</label>
        <input type="text" id="plant" name="plant" required><br><br>

        <label for="descr">description :</label>
        <input type="text" id="descr" name="descr" required><br><br>

        <label for="tagj">target_job  :</label>
        <input type="text" id="tagj" name="tagj" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>

        <a href="./home.php">Go Back to Home</a>
    </form>
<?php
include('database_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Career_Plans (plan_id, client_id , plan_title , description,target_job) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $planid, $clientid,$plant,$descr,$tagj);
    // Set parameters and execute
    $planid = $_POST['planid'];
    $clientid = $_POST['clientid'];
    $plant = $_POST['plant'];
    $descr = $_POST['descr'];
    $tagj = $_POST['tagj'];
   
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
// SQL query to fetch data from the Career_Plans table
$sql = "SELECT * FROM Career_Plans";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail informations Of Career_Plans</title>
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
    <center><h2>Table of Career_Plans</h2></center>
    <table border="5">
        <tr>
            <th>plan_id</th>
            <th>client_id</th>
            <th>plan_title</th>
            <th>description</th>  
            <th>target_job</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
       include "database_connection.php";

        // Prepare SQL query to retrieve all Career_Plans
        $sql = "SELECT * FROM Career_Plans";
        $result = $connection->query($sql);

        // Check if there are any Career_Plans
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $plan_id = $row['plan_id']; // Fetch the plan_id
                echo "<tr>
                    <td>" . $row['plan_id'] . "</td>
                    <td>" . $row['client_id'] . "</td>
                    <td>" . $row['plan_title'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['target_job'] . "</td>
                    <td><a style='padding:4px' href='delete_Career_Plans.php?plan_id=$plan_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Career_Plans.php?plan_id=$plan_id'>Update</a></td> 
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
</html>
</section>
 <footer>
    <center><b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Maurice NIZEYIMANA_222012402_EXAMINATION_OF_WEB_TECHNOLOGY</h2></b></center>
  </footer>
</body>
</html>
