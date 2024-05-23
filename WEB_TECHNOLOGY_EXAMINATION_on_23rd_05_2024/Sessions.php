<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions Form</title>
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
            justify-content: flex-start;
            align-items: flex-start;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 50%;
            margin-right: auto;
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
        input[type="date"],
        input[type="time"] {
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

        th,
        td {
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
    <?php
    include "menu.php";
    ?>
    <section>
        <h1>Sessions Form</h1>
        <form method="post" onsubmit="return confirmInsert();">
            <label for="sessid">session_id:</label>
            <input type="number" id="sessid" name="sessid"><br><br>

            <label for="coachid">coach_id:</label>
            <input type="text" id="coachid" name="coachid" required><br><br>

            <label for="clientid">client_id:</label>
            <input type="number" id="clientid" name="clientid" required><br><br>

            <label for="dtime">date_time:</label>
            <input type="date" id="dtime" name="dtime" required><br><br>

            <label for="dminutes">duration_minutes:</label>
            <input type="time" id="dminutes" name="dminutes" required><br><br>

            <input type="submit" name="add" value="Insert"><br><br>

            <a href="./home.php">Go Back to Home</a>
        </form>

        <?php
        include('database_connection.php');

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prepare and bind the parameters
            $stmt = $connection->prepare("INSERT INTO Sessions(session_id, coach_id , client_id , date_time,duration_minutes) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $sessid, $coachid, $clientid, $dtime, $dminutes);

            // Set parameters and execute
            $sessid = $_POST['sessid'];
            $coachid = $_POST['coachid'];
            $clientid = $_POST['clientid'];
            $dtime = $_POST['dtime'];
            $dminutes = $_POST['dminutes'];

            if ($stmt->execute() == TRUE) {
                echo "New record has been added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $connection->close();
        ?>


        <h2>Table of Sessions</h2>
        <table border="5">
            <tr>
                <th>session_id</th>
                <th>coach_id</th>
                <th>client_id</th>
                <th>date_time</th>
                <th>duration_minutes</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            <?php
            include "database_connection.php";

            // Prepare SQL query to retrieve all Sessions
            $sql = "SELECT * FROM Sessions";
            $result = $connection->query($sql);

            // Check if there are any Sessions
            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    $session_id = $row['session_id']; // Fetch the session_id
                    echo "<tr>
                        <td>" . $row['session_id'] . "</td>
                        <td>" . $row['coach_id'] . "</td>
                        <td>" . $row['client_id'] . "</td>
                        <td>" . $row['date_time'] . "</td>
                        <td>" . $row['duration_minutes'] . "</td>
                        <td><a style='padding:4px' href='delete_Sessions.php?session_id=$session_id'>Delete</a></td> 
                        <td><a style='padding:4px' href='update_Sessions.php?session_id=$session_id'>Update</a></td> 
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
        <center><b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Maurice NIZEYIMANA_222012402_EXAMINATION_OF_WEB_TECHNOLOGY</h2></b></center>
    </footer>
</body>

</html>
