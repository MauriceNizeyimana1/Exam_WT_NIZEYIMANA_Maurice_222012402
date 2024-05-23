<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail informations Of Coaches</title>
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

        footer {
            background-color: #333;
            color: #fff;
            padding: 5px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php include "menu.php" ?>
    <section>
        <h1>Coaches Form</h1>
        <form method="post" onsubmit="return confirmInsert();">
            <label for="coachid">coach_id:</label>
            <input type="number" id="coachid" name="coachid"><br><br>

            <label for="userid">user_id:</label>
            <input type="number" id="userid" name="userid" required><br><br>

            <label for="fulln">full_name:</label>
            <input type="text" id="fulln" name="fulln" required><br><br>

            <label for="expert">expertise:</label>
            <input type="text" id="expert" name="expert" required><br><br>

            <input type="submit" name="add" value="Insert"><br><br>

            <a href="./home.php">Go Back to Home</a>
        </form>
        <?php
        include('database_connection.php');

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prepare and bind the parameters
            $stmt = $connection->prepare("INSERT INTO Coaches(coach_id, user_id , full_name , expertise) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss",$coachid,$userid,$fulln,$expert);
            // Set parameters and execute
            $coachid = $_POST['coachid'];
            $userid = $_POST['userid'];
            $fulln = $_POST['fulln'];
            $expert = $_POST['expert'];
        
            if ($stmt->execute() == TRUE) {
                echo "New record has been added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $connection->close();
        ?>

        <h2>Table of Coaches</h2>
        <table border="5">
            <tr>
                <th>coach_id</th>
                <th>user_id</th>
                <th>full_name</th>
                <th>expertise</th>  
                <th>Delete</th>
                <th>Update</th>
            </tr>
            <?php
            include "database_connection.php";

            // Prepare SQL query to retrieve all 
            $sql = "SELECT * FROM Coaches";
            $result = $connection->query($sql);

            // Check if there are any Coaches
            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    $coach_id = $row['coach_id']; // Fetch the coach_id
                    echo "<tr>
                        <td>" . $row['coach_id'] . "</td>
                        <td>" . $row['user_id'] . "</td>
                        <td>" . $row['full_name'] . "</td>
                        <td>" . $row['expertise'] . "</td>
                        <td><a style='padding:4px' href='delete_Coaches.php?coach_id=$coach_id'>Delete</a></td> 
                        <td><a style='padding:4px' href='update_Coaches.php?coach_id=$coach_id'>Update</a></td> 
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No data found</td></tr>";
            }
            // Close the database connection
            $connection->close();
            ?>
        </table>
    </section>
    <footer>
        <h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Maurice NIZEYIMANA_222012402_EXAMINATION_OF_WEB_TECHNOLOGY</h2>
    </footer>
</body>
</html>
