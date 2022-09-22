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
                  
                    <button type="submit" name="psqt" class="btn btn-link">
                        <h2>PSQT</h2>
                    </button>
                    <button type="submit" name="me" class="btn btn-link">
                        <h2>Managerial Economics</h2>
                    </button>
                    <button type="submit" name="mfcs" class="btn btn-link">
                        <h2>MFCS</h2>
                    </button>
                    <button type="submit" name="co" class="btn btn-link">
                        <h2>Comptuter Organization</h2>
                    </button>
                    <button type="submit" name="psp" class="btn btn-link">
                        <h2>Problem Solving & Programming</h2>
                    </button>
                    <button type="submit" name="foss" class="btn btn-link">
                        <h2>FOSS Lab</h2>
                    </button>
                    <button type="submit" name="psplab" class="btn btn-link">
                        <h2>Problem Solving & Programming Lab</h2>
                    </button>
                    <button type="submit" name="fyp" class="btn btn-link">
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
                <input type="submit" name="psqt" value="PSQT" class="btn btn-success">
                <input type="submit" name="me" value="ME" class="btn btn-success">
                <input type="submit" name="mfcs" value="MFCS" class="btn btn-success">
                <input type="submit" name="psp" value="PSP" class="btn btn-success">
                <input type="submit" name="psplab" value="PSP Lab" class="btn btn-success">
                <input type="submit" name="foss" value="FOSS Lab" class="btn btn-success">
                <input type="submit" name="co" value="CO" class="btn btn-success">
                <input type="submit" name="fyp" value="PYP" class="btn btn-success">
            
            </form>
            <hr>


<div class="tabl">



<?php 
            $rows;
            $i = 1;
            

                if(isset($_POST['me'])){
                    echo '<div class="hh2"><h2>Managerial Economics :</h2></div>';
                    $rows = mysqli_query($conn, "SELECT * FROM me ORDER BY id DESC");
                }

                else if(isset($_POST['mfcs'])){
                        echo '<div class="hh2"><h2>MFCS :</h2></div>';
                        $rows = mysqli_query($conn, "SELECT * FROM mfcs ORDER BY id DESC");
                
                }

                else if(isset($_POST['co'])){
                        echo '<div class="hh2"><h2>Computer Organization :</h2></div>';
                        $rows = mysqli_query($conn, "SELECT * FROM co ORDER BY id DESC");

                }
               else if(isset($_POST['psp'])){
                        echo '<div class="hh2"><h2>PSP :</h2></div>';
                        $rows = mysqli_query($conn, "SELECT * FROM psp ORDER BY id DESC");
                }
               else if(isset($_POST['psplab'])){
                        echo '<div class="hh2"><h2>PSP Lab :</h2></div>';
                        $rows = mysqli_query($conn, "SELECT * FROM psplab ORDER BY id DESC");
                }

               else if(isset($_POST['foss'])){
                        echo '<div class="hh2"><h2>FOSS Lab :</h2></div>';
                        $rows = mysqli_query($conn, "SELECT * FROM foss ORDER BY id DESC");
                }
                else if(isset($_POST['fyp'])){
                    echo '<div class="hh2"><h2>Previous Year Papers :</h2></div>';
                    $rows = mysqli_query($conn, "SELECT * FROM fyp ORDER BY id DESC");
                }
                else{
                        echo '<div class="hh2"><h2>PSQT :</h2></div>';
                        $rows = mysqli_query($conn, "SELECT * FROM psqt ORDER BY id DESC");
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