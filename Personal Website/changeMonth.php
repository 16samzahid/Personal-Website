<?php
    // Include the database connection file
    // Database connection parameters
    $localhost = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "login";

    // Create connection
    $conn = new mysqli($localhost, $username, $password, $database);


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["months"])) {
        // Retrieve the selected month from the form
        $selected_month = $_POST["months"];

        // If "All Months" is selected, query all blog entries
        if ($selected_month == "13") {
            $sql = "SELECT * FROM post ORDER BY date DESC";
        } else {
            // Otherwise, query blog entries for the selected month
            $sql = "SELECT * FROM post WHERE MONTH(date) = '$selected_month' ORDER BY date DESC";
        }

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if there are any blog entries
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row and display the blog entries
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='blog-entry'>";
                echo "<h1 class=\"title\">" . $row["title"] . "</h2>";
                echo "<p class=\"content\">" . $row["content"] . "</p>";
                echo "<p class=\"date-time\">Date and Time: " . $row["date"] . "</p>";
                echo "</div>";
            }
        } else {
            // If no blog entries found for the selected month
            echo "No blog entries found for the selected month.";
        }
    } else {
        // If form is not submitted or month is not set
        echo "Invalid request.";
    }
?>