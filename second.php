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
            <div class="wel ">
                <li style="color: black ;">
                    <h3>
                        <?php echo "Welcome ". $_SESSION['username']?>
                    </h3>
                </li>
            </div>
        </ul>
    </nav>


    <div class="cont">
        <div class="frame1">
            <div class="left">
                <h1>Course Name</h1>
                <form action="" method="post" enctype="multipart/form-data">
                  
                    <button type="submit" name="afm" class="btn btn-link">
                        <h2>AFM</h2>
                    </button>
                    <button type="submit" name="ds" class="btn btn-link">
                        <h2>Data Structures</h2>
                    </button>
                    <button type="submit" name="fwp" class="btn btn-link">
                        <h2>FWP</h2>
                    </button>
                    <button type="submit" name="oop" class="btn btn-link">
                        <h2>OOP</h2>
                    </button>
                    <button type="submit" name="utp" class="btn btn-link">
                        <h2>UTP</h2>
                    </button>
                    <button type="submit" name="dslab" class="btn btn-link">
                        <h2>DS Lab</h2>
                    </button>
                    <button type="submit" name="fwplab" class="btn btn-link">
                        <h2>FWP Lab</h2>
                    </button>
                    <button type="submit" name="ooplab" class="btn btn-link">
                        <h2>OOP Lab</h2>
                    </button>
                    <button type="submit" name="syp" class="btn btn-link">
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
                <input type="submit" name="afm" value="AFM" class="btn btn-success">
                <input type="submit" name="ds" value="DS" class="btn btn-success">
                <input type="submit" name="fwp" value="FWP" class="btn btn-success">
                <input type="submit" name="oop" value="OOP" class="btn btn-success">
                <input type="submit" name="utp" value="UTP" class="btn btn-success">
                <input type="submit" name="dslab" value="DS Lab" class="btn btn-success">
                <input type="submit" name="fwplab" value="FWP Lab" class="btn btn-success">
                <input type="submit" name="ooplab" value="OOP Lab" class="btn btn-success">
                <input type="submit" name="syp" value="PYP" class="btn btn-success">
            
            </form>
            <hr>





            <div class="tabl">



                <?php 
                            $rows;
                            $i = 1;
                            
                
                                if(isset($_POST['ds'])){
                                    echo '<div class="hh2"><h2>Data Structures :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM ds ORDER BY id DESC");
                                }
                                else if(isset($_POST['fwp'])){
                                        echo '<div class="hh2"><h2>Fundamental of Web Programming :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM fwp ORDER BY id DESC");
                                
                                }
                                else if(isset($_POST['oop'])){
                                    echo '<div class="hh2"><h2>Object Oriented Programming :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM oop ORDER BY id DESC");
                            
                                }
                                else if(isset($_POST['utp'])){
                                        echo '<div class="hh2"><h2>Unix Tool & Programming :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM utp ORDER BY id DESC");
                
                                }
                               else if(isset($_POST['dslab'])){
                                        echo '<div class="hh2"><h2>Data Structures Lab :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM dslab ORDER BY id DESC");
                                }
                               else if(isset($_POST['fwplab'])){
                                        echo '<div class="hh2"><h2>Web Programming Lab :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM fwplab ORDER BY id DESC");
                                }
                
                               else if(isset($_POST['ooplab'])){
                                        echo '<div class="hh2"><h2>Object Oriented Programming Lab :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM ooplab ORDER BY id DESC");
                                }
                                else if(isset($_POST['syp'])){
                                    echo '<div class="hh2"><h2>Previous Year Papers :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM syp ORDER BY id DESC");
                                }
                                else{
                                        echo '<div class="hh2"><h2>Accounts & Financial Management :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM afm ORDER BY id DESC");
                                        // $i = 1;
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