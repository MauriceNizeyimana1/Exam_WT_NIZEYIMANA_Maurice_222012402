<?php
include('database_connection.php');
if(isset($_GET['query'])) {
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'Coaches' => "SELECT coach_id,full_name FROM Coaches WHERE full_name LIKE '%$searchTerm%'",
        'Clients' => "SELECT full_name FROM Clients WHERE full_name LIKE '%$searchTerm%'",
        'Sessions' => "SELECT session_id FROM Sessions WHERE session_id LIKE '%$searchTerm%'",
        'Career_Plans' => "SELECT plan_title FROM Career_Plans WHERE plan_title LIKE '%$searchTerm%'",
        'Courses' => "SELECT course_name FROM Courses WHERE course_name LIKE '%$searchTerm%'",
        'Assessments' => "SELECT assessment_name FROM Assessments WHERE assessment_name LIKE '%$searchTerm%'",
        'Progress_Tracking' => "SELECT completion_status FROM Progress_Tracking WHERE completion_status LIKE '%$searchTerm%'",
        'Resources' => "SELECT type FROM Resources WHERE type LIKE '%$searchTerm%'",
        'Feedback' => "SELECT feedback_id FROM Feedback WHERE feedback_id LIKE '%$searchTerm%'",

    ];

    // Output search results
    echo "<style>
                h2 {
                    color: blue;
                    text-decoration: underline;
                }
                h3 {
                    color: green;
                }
                p {
                    color: black;
                }
          </style>";
    echo "<h2>Search Results:</h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>


