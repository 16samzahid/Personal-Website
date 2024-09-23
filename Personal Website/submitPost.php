<?php
    // Database connection parameters
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "login";

    // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve title and content from URL parameters
        $title = $_GET["title"]; //using get instead of post since the data is being passed through the URL from js
        $content = $_GET["content"];
        $datetime = date('Y-m-d H:i:s'); // Current date and time

        // Insert the data into the database
        $sql = "INSERT INTO post (title, content, date) VALUES ('$title', '$content', '$datetime')";

        if ($conn->query($sql) === TRUE) {
            // Redirect back to blogposts.php or any other page
            header("Location: blogposts.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
?>
