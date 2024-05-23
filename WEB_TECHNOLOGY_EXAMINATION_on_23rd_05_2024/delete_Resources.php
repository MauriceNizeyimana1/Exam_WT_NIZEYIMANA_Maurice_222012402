<?php
// Connection details
include('database_connection.php');

// Check if resource_id is set
if (isset($_REQUEST['resource_id'])) {
    $resid = $_REQUEST['resource_id'];

    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Resources WHERE resource_id=?");
    $stmt->bind_param("i", $resid);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f8f8;
                margin: 0;
                padding: 0;
            }
            form {
                width: 50%;
                margin: 100px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            h2 {
                color: #333;
            }
            input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #e74c3c;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s;
                margin-top: 10px;
            }
            input[type="submit"]:hover {
                background-color: #c0392b;
            }
            .back-link {
                display: block;
                margin-top: 20px;
                text-decoration: none;
                color: #3498db;
                font-weight: bold;
                transition: color 0.3s;
            }
            .back-link:hover {
                color: #2980b9;
            }
        </style>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <h2>Delete Record</h2>
            <input type="hidden" name="resid" value="<?php echo $resid; ?>">
            <input type="submit" value="Delete">
            <a class="back-link" href="./home.php">Go Back to Home</a>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($stmt->execute()) {
                echo "<p style='text-align: center;'>Record deleted successfully.</p>";
            } else {
                echo "<p style='text-align: center; color: red;'>Error deleting data: " . $stmt->error . "</p>";
            }
        }
        ?>
    </body>
    </html>
    <?php
    $stmt->close();
} else {
    echo "resource_id is not set.";
}

$connection->close();
?>
