<!-- some php to check whether the user is already loggedin, in which case the login page will redirect to the addpost form -->
<?php
    session_start();
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        echo '<meta http-equiv="refresh" content="1;url=addpost.php">';  //this redirects to the addpost after 1 sec
        echo '<em>You are already logged in. Redirecting...</em>';
        exit; // Ensure that no further code is executed after the redirect
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sameeha Zahid - Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
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
        <form method ="POST" action ="loginValidation.php">
            <fieldset>
                <legend>Login</legend>
                <div>
                    <label>Email:</label>
                    <input type ="email" name ="email" id = "email" required>
                </div>
                <div>
                    <label>Password:</label>
                    <input type ="password" name ="password" id = "password" required>
                </div>
        
                <button name = "submit" type ="submit">Submit</button>
            </fieldset>
        </form>
        <footer>
            &copy; - Sameeha Zahid
        </footer>
    </div>
</body>