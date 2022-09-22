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
                  
                    <button type="submit" name="mad" class="btn btn-link">
                        <h2>Mobile Application Development</h2>
                    </button>
                    <button type="submit" name="st" class="btn btn-link">
                        <h2>Software Testing</h2>
                    </button>
                    <button type="submit" name="madlab" class="btn btn-link">
                        <h2>MAD Lab</h2>
                    </button>
                    <button type="submit" name="stlab" class="btn btn-link">
                        <h2>Software Testing Lab</h2>
                    </button>
                    <button type="submit" name="electivev" class="btn btn-link">
                        <h2>Elective V</h2>
                    </button>
                    <button type="submit" name="electivevi" class="btn btn-link">
                        <h2>Elective VI</h2>
                    </button>
                    <button type="submit" name="electivevii" class="btn btn-link">
                        <h2>Elective VII</h2>
                    </button>
                    <button type="submit" name="fiyp" class="btn btn-link">
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
                <input type="submit" name="mad" value="MAD" class="btn btn-success">
                <input type="submit" name="st" value="ST" class="btn btn-success">
                <input type="submit" name="madlab" value="MAD Lab" class="btn btn-success">
                <input type="submit" name="stlab" value="ST Lab" class="btn btn-success">
                <input type="submit" name="electivev" value="Elective V" class="btn btn-success">
                <input type="submit" name="electivevi" value="Elective VI" class="btn btn-success">
                <input type="submit" name="electivevii" value="Elective VII" class="btn btn-success">
                <input type="submit" name="fiyp" value="PYP" class="btn btn-success">
            
            </form>
            <hr>

            <div class="tabl">
                <?php 
                            $rows;
                            $i = 1;
                            
                          if(isset($_POST['stlab'])){
                                    echo '<div class="hh2"><h2>Software Testing Lab :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM stlab ORDER BY id DESC");
                                }
                                else if(isset($_POST['madlab'])){
                                        echo '<div class="hh2"><h2>Mobile Application Development Lab :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM madlab ORDER BY id DESC");
                                
                                }
                                else if(isset($_POST['st'])){
                                    echo '<div class="hh2"><h2>Software testing :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM st ORDER BY id DESC");
                            
                                }
                                else if(isset($_POST['electivev'])){
                                        echo '<div class="hh2"><h2>Elective V :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM electivev ORDER BY id DESC");
                
                                }
                               else if(isset($_POST['electivevi'])){
                                        echo '<div class="hh2"><h2>Elective VI :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM electivevi ORDER BY id DESC");
                                }
                               else if(isset($_POST['electivevii'])){
                                        echo '<div class="hh2"><h2>Elective VII :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM electivevii ORDER BY id DESC");
                                }
                                else if(isset($_POST['fiyp'])){
                                    echo '<div class="hh2"><h2>Previous Year Papers :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM fiyp ORDER BY id DESC");
                                }
                                else{
                                        echo '<div class="hh2"><h2>Mobile Application Development :</h2></div>';
                                        $rows = mysqli_query($conn, "SELECT * FROM mad ORDER BY id DESC");
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