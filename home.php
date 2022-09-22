<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title> Exam Time </title>
</head>

<body class="bod">

    <div class="heading">
        <img class="hl" src="Nitw.png">
        <h1>Exam Time</h1>
        <img class="hr" src="Nitw.png">
    </div>

    <nav class="navbar background">

        <ul class="nav-list">
            <li style="background-color: rgb(13, 61, 102);" ><a href="/home.html">Home</a></li>
            <li ><a href="about.html">About</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
            <li><a href="logout.php">Log Out</a></li>
            <div class="wel "><li style="color: black ;"><h3><?php echo "Welcome ". $_SESSION['username']?></h3></li></div>
        </ul>

    </nav>


    <div>
        <div class="row">
            <h1>First Year</h1>
            <div class="column first">
                <h2>
                    <a href="first.php">First Semester</a>
                </h2>
                <h2>
                    <a href="second.php">Second Semester</a>
                </h2>
            </div>
            <h1 class="sec">Second Year</h1>
            <div class="column second">
                <h2>
                    <a href="third.php">Third Semester</a>
                </h2>
                <h2>
                    <a href="fourth.php">Fourth Semester</a>
                </h2>
            </div>
            <h1 class="sec">Third Year</h1>
            <div class="column third">
                <h2>
                    <a href="fifth.php">Fifth Semester</a>
                </h2>
                <h2>
                    <a href="interview.php">Interview Experience</a>
                </h2>
            </div>
        </div>
    </div>


    <div class="footer">
        <h1>National Institue of Technology, Warangal</h1>
    </div>

</body>

</html>