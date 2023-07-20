<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rjc Designs: Featured projects</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- start of homepage section -->
    <section id="homepage">
        <nav class="main_navbar clearfix">
            <h2 class="navbar_text">robert chunga</h2>
            <div class="navbar">
                <ul>
                    <li><a href="index.php">home</a></li>
                    <li><a href="index.php#about-link">about</a></li>
                    <li><a href="projects.php">projects</a></li>
                    <li><a href="skills.php">skills</a></li>
                    <li><a href="contact.php">contact</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <!-- end of homepage section -->

    <!-- start of project section -->
    <section class="projects">
        <div class="project-heading">
            <h2>projects</h2>
        </div>

        <div class="search-project">
            <input type="text" name="searchProject" id="search-project" placeholder="Search projects...">

            <select name="" id="filter">
                <option value="all">Filter projects</option>
                <option value="logo">Logo design</option>
                <option value="poster">Poster design</option>
                <option value="cartoon">Cartooning</option>
                <option value="flyer">Flyer design</option>
            </select>
        </div>

        <div class="project-center">
            <?php

            //server details
            $servername = "localhost";
            $username = "root";
            $password = "";

            //connect server
            $conn = mysqli_connect($servername, $username, $password);

            //check server conneciton
            if (!$conn) {
                die("Connection failed" . mysqli_connect_error());
            }

            //connect database
            $db_conn = mysqli_select_db($conn, "myportfolio_project");

            //check database connection
            if (!$db_conn) {
                die("Connection failed" . mysqli_error($conn));
            }

            //Querying database
            $query = "SELECT * FROM `projects`";
            $rs = mysqli_query($conn, $query);

            //retrive project details and display data
            while ($project = mysqli_fetch_assoc($rs)) {
                $projectImg = $project['project_image'];
                $title = $project['title'];
                $details = $project['details'];

                echo '
                    <article class="featured_projects">
                        <img src="' . $projectImg . '" class="img-box" />
                    <div class="image-popup">
                    <div class="image-text">
                        <h3>' . $title . '</h3>
                        <a class="link-btn" href="#">' . $details . '</a>
                    </div>
                </div>
            </article>';
            }
            //close connection
            mysqli_close($conn);
            ?>
        </div>

    </section>
    <!-- end of project section -->

    <script src="project.js"></script>
</body>

</html>