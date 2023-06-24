<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rjc Designs: Skills</title>
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

    <!-- start of skills section -->
    <section class="skills clearfix">
        <h2 class="skill-heading">Skills</h2>
        <?php
        function fetchSkills()
        {
            //server details
            $servername = "localhost";
            $username = "root";
            $password = "";

            //connect server
            $conn = mysqli_connect($servername, $username, $password);

            //check server connection
            if (!$conn) {
                die("connection failed" . mysqli_connect_error());
            }

            //connect database
            $db_conn = mysqli_select_db($conn, "myportfolio_project");

            //check database connection
            if (!$db_conn) {
                die("connection failed" . mysqli_error($conn));
            }

            //query database
            $sql = "SELECT * FROM `skills`";
            $rs = mysqli_query($conn, $sql);

            //check query
            if (!$rs) {
                die("invalid query" . mysqli_error($conn));
            }

            //fetch data and store it in an array
            $skills = array();
            while ($row = mysqli_fetch_assoc($rs)) {
                $skills[] = $row;
            }

            mysqli_close($conn);

            //return fetched data
            return $skills;
        }

        //retrieve details from database
        $skills = fetchSkills();

        //loop through the skills and display fetched data
        foreach ($skills as $skill) {
            $title = $skill['title'];
            $description = $skill['description'];
            $classes = $skill['classes'];


        ?>
            <!-- single skill -->
            <article class="skill">
                <h4 class="skill-title"><?php echo $title ?></h4>
                <p class="skill-text"><?php echo $description ?></p>
                <div class="skill-progress">
                    <div class="skill-progress-bar" id="<?php echo $classes ?>">
                        <span class="progress-percent"></span>
                        <span class="progress-text"></span>
                    </div>
                </div>
            </article>
        <?php
        }
        ?>
        <!-- end of single skill -->
    </section>
    <!-- end of skill section -->

    <script src="skill.js"></script>
</body>

</html>