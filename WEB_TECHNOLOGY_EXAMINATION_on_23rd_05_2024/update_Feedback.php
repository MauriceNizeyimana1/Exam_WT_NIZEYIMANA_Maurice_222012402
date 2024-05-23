<?php
include('database_connection.php');

// Check if feedback_id is set
if(isset($_REQUEST['feedback_id'])) {
    $feedback_id = $_REQUEST['feedback_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Feedback WHERE feedback_id=?");
    $stmt->bind_param("i", $feedback_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['feedback_id'];
        $w = $row['session_id'];
        $x = $row['rating'];
        $y = $row['comment'];
    } else {
        echo "Feedback not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Feedback</title>
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
        <!-- Update Feedback form -->
        <h2><u>Update Form of Feedback</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="sessid">Session ID:</label>
            <input type="number" name="sessid" value="<?php echo isset($w) ? $w : ''; ?>">
            <br><br>

            <label for="rating">Rating:</label>
            <input type="number" name="rating" value="<?php echo isset($x) ? $x : ''; ?>">
            <br><br>

            <label for="comm">Comment:</label>
            <input type="text" name="comm" value="<?php echo isset($y) ? $y : ''; ?>">
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
    $session_id = $_POST['sessid'];
    $rating = $_POST['rating'];
    $comment = $_POST['comm'];
    
    // Update the Feedback record in the database
    $stmt = $connection->prepare("UPDATE Feedback SET session_id=?, rating=?, comment=? WHERE feedback_id=?");
    $stmt->bind_param("ssss", $session_id, $rating, $comment, $feedback_id);
    $stmt->execute();
    
    // Redirect to Feedback.php
    header('Location: Feedback.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
