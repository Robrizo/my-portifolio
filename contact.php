<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rjc Designs: Contact me</title>
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

    <!-- start of contact section -->
    <section id="contact-link" class="contacts">
        <h2 class="contact-heading">Contact</h2>
        <div class="contact-form">
            <form id="contact-me" action="">
                <h3 class="contact-subheading">send me a mesage</h3>
                <input type="text" name="name" id="name" placeholder="your name" required>
                <input type="email" name="email" id="email" placeholder="your email" required>
                <input type="text" name="subject" id="subject" placeholder="subject">
                <textarea name="msg" id="" cols="30" rows="5" placeholder="message" required></textarea>
                <input type="submit" name="submit" value="send message">
            </form>
            <div class="contact-info">
                <h3 class="contact-subheading">get in touch</h3>
                <ul>
                    <?php
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
                    $db_name = mysqli_select_db($conn, "myportfolio_project");

                    //check database connection
                    if (!$db_name) {
                        die("Connection failed" . mysqli_error($conn));
                    }

                    //query database
                    $query = "SELECT * FROM `contacts`";
                    $rs = mysqli_query($conn, $query);

                    //loop through contacts table and display data
                    if (mysqli_num_rows($rs) > 0) {
                        while ($rows = mysqli_fetch_assoc($rs)) {
                            echo '<li><img class="contact-icons" src="./images/contact-icon3.png" alt="">' . $rows["address"] . '</li>';
                            echo '<li><img class="contact-icons" src="./images/contact-icon.png" alt="">' . $rows["phone_number"] . '</li>';
                            echo '<li><img class="contact-icons" src="./images/contact-icon2.png" alt="">' . $rows["email"] . '</li>';
                        }
                    }
                    ?>
                </ul>
                <div class="social-media">
                    <p class="social-text">follow me on social media</p>
                    <ul>
                        <?php
                        //query social table
                        $sql = "SELECT * FROM `social`";
                        $results = mysqli_query($conn, $sql);

                        //loop through social table and display data
                        if (mysqli_num_rows($rs) > 0) {
                            while ($row = mysqli_fetch_assoc($results)) {
                                echo '<li><a href="' . $row["facebook"] . '" target="_blank"><img class="social-icons" src="./images/facebook.png"  alt=""></a></li>';
                                echo '<li><a href="' . $row["twitter"] . '" target="_blank"><img class="social-icons" src="./images/twitter.png" alt=""></a></li>';
                                echo '<li><a href="' . $row["instagram"] . '" target = "_blank"><img class="social-icons" src="./images/instagram.png" alt=""></a></li>';
                            }
                        }

                        //close connection
                        mysqli_close($conn)
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end of contact section -->

    <!-- javascript link -->
    <script src="contact-form.js"></script>
</body>

</html>