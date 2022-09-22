<?php
$conn = mysqli_connect("localhost","root","","examtime");
?>
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

    <nav class="navbar background ">

        <ul class="nav-list">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
            <li><a href="logout.php">Log Out</a></li>
            <div class="wel "><li style="color: black ;"><h3><?php echo "Welcome ". $_SESSION['username']?></h3></li></div>
        </ul>
    </nav>





    <div class="cont">
        <div class="frame1">
            <div class="left">
                <h1>Course Name</h1>
                <form action="" method="post" enctype="multipart/form-data">
                  
                    <button type="submit" name="ospm" class="btn btn-link">
                        <h2>OSPM</h2>
                    </button>
                    <button type="submit" name="os" class="btn btn-link">
                        <h2>Operating System</h2>
                    </button>
                    <button type="submit" name="dbms" class="btn btn-link">
                        <h2>Database management System</h2>
                    </button>
                    <button type="submit" name="se" class="btn btn-link">
                        <h2>Software Engineering</h2>
                    </button>
                    <button type="submit" name="electivei" class="btn btn-link">
                        <h2>Elective I</h2>
                    </button>
                    <button type="submit" name="oslab" class="btn btn-link">
                        <h2>OS Lab</h2>
                    </button>
                    <button type="submit" name="dbmslab" class="btn btn-link">
                        <h2>DBMS Lab</h2>
                    </button>
                    <button type="submit" name="selab" class="btn btn-link">
                        <h2>SE Lab</h2>
                    </button>
                    <button type="submit" name="typ" class="btn btn-link">
                        <h2>Previous Year Papers</h2>
                    </button>
                </form>
            </div>
        </div>


        <div class="frame2">



            <form action="upload.php" method="post" enctype="multipart/form-data" class="fo">
                <h2>Upload File :</h2>
                <div class="form-group">
                    <label for="file">File :  </label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <input type="submit" name="ospm" value="OSPM" class="btn btn-success">
                <input type="submit" name="os" value="OS" class="btn btn-success">
                <input type="submit" name="dbms" value="DBMS" class="btn btn-success">
                <input type="submit" name="se" value="SE" class="btn btn-success">
                <input type="submit" name="electivei" value="Elective I" class="btn btn-success">
                <input type="submit" name="oslab" value="OS Lab" class="btn btn-success">
                <input type="submit" name="dbmslab" value="DBMS Lab" class="btn btn-success">
                <input type="submit" name="selab" value="SE Lab" class="btn btn-success">
                <input type="submit" name="typ" value="PYP" class="btn btn-success">
            
            </form>
            <hr>

            <div class="tabl">

                <?php 
                            $rows;
                            $i = 1;
                            
                
                                if(isset($_POST['os'])){
                                    echo '<div class="hh2"><h2>Operating System :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM os ORDER BY id DESC");
                                }
                                else if(isset($_POST['dbms'])){
                                        echo '<div class="hh2"><h2>Database Management System :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM dbms ORDER BY id DESC");
                                
                                }
                                else if(isset($_POST['se'])){
                                    echo '<div class="hh2"><h2>Software Engineering :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM se ORDER BY id DESC");
                            
                                }
                                else if(isset($_POST['electivei'])){
                                        echo '<div class="hh2"><h2>Elective I :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM electivei ORDER BY id DESC");
                
                                }
                               else if(isset($_POST['oslab'])){
                                        echo '<div class="hh2"><h2>Operating System Lab :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM oslab ORDER BY id DESC");
                                }
                               else if(isset($_POST['dbmslab'])){
                                        echo '<div class="hh2"><h2>Database Management System Lab :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM dbmslab ORDER BY id DESC");
                                }
                
                               else if(isset($_POST['selab'])){
                                        echo '<div class="hh2"><h2>Software Engineering Lab :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM selab ORDER BY id DESC");
                                }
                                else if(isset($_POST['typ'])){
                                    echo '<div class="hh2"><h2>Previous Year Papers :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM typ ORDER BY id DESC");
                                }
                                else{
                                        echo '<div class="hh2"><h2>OSPM :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM ospm ORDER BY id DESC");
                                }
                
                                ?>
                
                
                            <table border=1 cellspacing=0 cellpadding=15>
                                <tr>
                                    <th>
                                        Sl No.
                                    </th>
                                    <th>Files</th>
                                    <th>
                                     Uploaded By
                                    </th>
                                    
                                </tr>
                
                
                                <?php foreach($rows as $row): ?>
                                <tr>
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <!-- <?php echo $row['file'];; ?> -->
                                        <a href="new/<?php echo $row['file']; ?>" download><?php echo $row['file']; ?></a>
                                    </td>
                                    <td width=500px>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    
                                </tr>
                                <?php endforeach ?>
                            </table>
               
                </div>

        </div>

    </div>


    <div class="footer">
        <h1>National Institue of Technology, Warangal</h1>
    </div>
</body>

</html>