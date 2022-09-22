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
                  
                    <button type="submit" name="aad" class="btn btn-link">
                        <h2>Algorithm Analysis & Design</h2>
                    </button>
                    <button type="submit" name="ccn" class="btn btn-link">
                        <h2>Computer Communication & Networking</h2>
                    </button>
                    <button type="submit" name="pdwdm" class="btn btn-link">
                        <h2>PDWDM</h2>
                    </button>
                    <button type="submit" name="electiveii" class="btn btn-link">
                        <h2>Elective II</h2>
                    </button>
                    <button type="submit" name="electiveiii" class="btn btn-link">
                        <h2>Elective III</h2>
                    </button>
                    <button type="submit" name="electiveiv" class="btn btn-link">
                        <h2>Elective IV</h2>
                    </button>
                    <button type="submit" name="ccnlab" class="btn btn-link">
                        <h2>CCN Lab</h2>
                    </button>
                    <button type="submit" name="kelab" class="btn btn-link">
                        <h2>Knowlwdge Engineering Lab</h2>
                    </button>
                    <button type="submit" name="foyp" class="btn btn-link">
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
                <input type="submit" name="aad" value="AAD" class="btn btn-success">
                <input type="submit" name="ccn" value="CCN" class="btn btn-success">
                <input type="submit" name="pdwdm" value="PDWDM" class="btn btn-success">
                <input type="submit" name="electiveii" value="Elective II" class="btn btn-success">
                <input type="submit" name="electiveiii" value="Elective III" class="btn btn-success">
                <input type="submit" name="electiveiv" value="Elective IV" class="btn btn-success">
                <input type="submit" name="ccnlab" value="CCN Lab" class="btn btn-success">
                <input type="submit" name="kelab" value="KE Lab" class="btn btn-success">
                <input type="submit" name="foyp" value="PYP" class="btn btn-success">
            
            </form>
            <hr>





            <div class="tabl">



                <?php 
                            $rows;
                            $i = 1;
                            
                
                                if(isset($_POST['electiveiii'])){
                                    echo '<div class="hh2"><h2>Elective III :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM electiveiii ORDER BY id DESC");
                                }
                                else if(isset($_POST['ccn'])){
                                        echo '<div class="hh2"><h2>Computer Communication & Networking :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM ccn ORDER BY id DESC");
                                
                                }
                                else if(isset($_POST['pdwdm'])){
                                    echo '<div class="hh2"><h2>PDWDM :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM pdwdm ORDER BY id DESC");
                            
                                }
                                else if(isset($_POST['electiveii'])){
                                        echo '<div class="hh2"><h2>Elective II :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM utp ORDER BY id DESC");
                
                                }
                               else if(isset($_POST['kelab'])){
                                        echo '<div class="hh2"><h2>Knowledge Engineering Lab :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM kelab ORDER BY id DESC");
                                }
                               else if(isset($_POST['ccnlab'])){
                                        echo '<div class="hh2"><h2>Computer Communication &Networking Lab :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM ccnlab ORDER BY id DESC");
                                }
                
                               else if(isset($_POST['electiveiv'])){
                                        echo '<div class="hh2"><h2>Elective IV :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM electiveiv ORDER BY id DESC");
                                }
                                else if(isset($_POST['foyp'])){
                                    echo '<div class="hh2"><h2>Previous Year Papers :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM foyp ORDER BY id DESC");
                                }
                                else{
                                        echo '<div class="hh2"><h2>Algorithm Analysis & Design :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM aad ORDER BY id DESC");
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

    <div class="footer" >
        <h1>National Institue of Technology, Warangal</h1>
    </div>
</body>

</html>