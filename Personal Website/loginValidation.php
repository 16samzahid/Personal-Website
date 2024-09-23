<?php

    // Database connection parameters
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "login";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    $email = $_POST["email"];
    $password = $_POST["password"];
    $errorMessage = "";


    // Define SQL query to retrieve password and email
    $sql = "SELECT password, email FROM login WHERE email = '$email'";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $row = $result->fetch_assoc();

    if($result->num_rows==1) {
        //check if they are empty
        if(empty($email) || empty($password)) {
            $errorMessage = "Please enter both email and password";
        }
        // output data of each row
        //while($row = $result->fetch_assoc()) { //fetch each row from the database and store it in $row
        if($row["password"] == $password && $row["email"] == $email) { //compare password and email entered to the one in database
            session_start(); //resume session upson successful login
            header("Location: addpost.php");
            $_SESSION['loggedIn'] = true;
        } else {
            // echo '<meta http-equiv="refresh" content="1;url=login.php">';  //this redirects to the login after 1 sec
            echo '<meta http-equiv="refresh" content="1;url=login.php">';  //this redirects to the addpost after 1 sec
            echo '<em>Incorrect Login. Redirecting...</em>';
            //exit; // Ensure that no further code is executed after the redirect
        }
    }
    else {
        // echo '<meta http-equiv="refresh" content="1;url=login.php">';  //this redirects to the login after 1 sec
        echo '<em>Incorrect Login. Redirecting to login...</em>';
        header("Location: login.php");
        //exit; // Ensure that no further code is executed after the redirect
    }
?>



