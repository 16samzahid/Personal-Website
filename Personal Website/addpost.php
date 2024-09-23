<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sameeha Zahid - Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/addpost.css">
    <link rel="stylesheet" href="css/mobile.css" media="screen and (max-width:768px)">
    <script defer src="JS/addpost.js"></script>
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
        <form method ="POST" action ="submitPost.php" id = 'addPostForm'>
            <fieldset>
                <legend>Add Post</legend>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" id="title">
                </div>
                <div>
                    <label>Blog Message</label>
                    <textarea type="text" name="content" id="content" rows="10"></textarea>
                </div>
                <div id="buttons">
                    <button type ="submit" name = "submit" >Submit</button>
                    <button type ="button" name = "clear" id = 'clear'>Clear</button>
                    <button type="button" name="preview" id="preview">Preview</button>
                    <a href = "logout.php"><button type ="button">Logout</button></a>
                </div>
            </fieldset>
        </form>
        <footer>
            &copy; - Sameeha Zahid
        </footer>
    </section>
</body>
</html>
