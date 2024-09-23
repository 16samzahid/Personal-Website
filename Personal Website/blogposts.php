<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sameeha Zahid - Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/posts.css">
    <link rel="stylesheet" href="css/mobile.css" media="screen and (max-width:768px)">
    <script src="main.js"></script>
</head>
<body>
    <section id="main">
        <header>
            <h1><a class="logo" href = "index.php">SZ</a></h1>
            <nav>
                <a href="about.html">About Me</a>
                <a href="experience.html">Experience</a>
                <a href="skills.html">Skills</a>
                <a href="education.html">Education</a>
                <a href="projects.html">Projects</a>
                <a href="blog.php">Blog</a>
            </nav>
        </header>

        <div><h1>Latest Posts</h1></div>
        <form action="" method="POST">
            <select onchange ="this.form.submit()" name="months">
                <option selected disabled>Months</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </form>

        <div id="blog-posts">
            <!-- Display blog posts here -->
            <?php
                // Database connection parameters
                $localhost = "127.0.0.1";
                $username = "root";
                $password = "";
                $database = "login";

                // Create connection
                $conn = new mysqli($localhost, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if a month is selected
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["months"])) {
                    $selected_month = $_POST["months"]; // Get the selected month

                    // Fetch posts from the selected month
                    $sql = "SELECT * FROM post WHERE MONTH(date) = $selected_month";
                } else {
                    // Fetch all posts
                    $sql = "SELECT * FROM post";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Initialize an array to store posts
                    $posts = [];

                    // Fetch each row and store it in the posts array
                    while ($row = $result->fetch_assoc()) {
                        $posts[] = $row;
                    }

                    // Bubble sort the posts array based on the date in descending order
                    for ($i = 0; $i < count($posts) - 1; $i++) {
                        for ($j = 0; $j < count($posts) - $i - 1; $j++) {
                            if (strtotime($posts[$j]['date']) < strtotime($posts[$j + 1]['date'])) {
                                // Swap the posts
                                $temp = $posts[$j];
                                $posts[$j] = $posts[$j + 1];
                                $posts[$j + 1] = $temp;
                            }
                        }
                    }

                    //display how many posts are found each time and for which month
                    //an array that will help convert from the value to the month name
                    $options = array(
                        "1" => "January",
                        "2" => "February",
                        "3" => "March",
                        "4" => "April",
                        "5" => "May",
                        "6" => "June",
                        "7" => "July",
                        "8" => "August",
                        "9" => "September",
                        "10" => "October",
                        "11" => "November",
                        "12" => "December",
                    );

                    echo "<p>" .count($posts). " posts found for " . $options[$selected_month]. "</p>";

                    // Output the sorted posts
                    foreach ($posts as $post) {
                        // Format the date
                        $date = date('jS F Y g:i A T', strtotime($post["date"]));

                        echo '<div class="post">';
                        echo "<h1><strong>" . $post["title"] . "</strong></h1>";
                        echo "<p>" . $post["content"] . "</p>";
                        echo "<div class='date'>Posted on: " . $date . "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No posts available.";
                }

                // Close the database connection
                $conn->close();
            ?>

        </div>

        <footer>
            &copy; - Sameeha Zahid
        </footer>
    </section>
</body>
</html>


