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

    
    

    <div class="contain" >
      
            <form action="upload.php" method="post" enctype="multipart/form-data" class="formi">
                <h2>Upload File :</h2>
                <div class="form-group upl" >
                    <label for="user">
                        Username : 
                    </label>
                    <input type="text" name="username" id="user" class="form-control" >
            
                </div>
                <div class="form-group">
                    <label for="file">File :  </label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <input type="submit" name="ie" value="Submit" class="btn btn-success">
             
            
            </form>
            <hr>





            <div class="tabl" >



                <?php 
                            $rows;
                            $i = 1;
                            
                
                                    echo '<div class="hh2"><h2>Interview Experiences :</h2></div>';
                                    $rows = mysqli_query($conn, "SELECT * FROM ie ORDER BY id DESC");
                                
                
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
                                        <a href="<?php echo $row['file']; ?>" download><?php echo $row['file']; ?></a>
                                    </td>
                                    <td width=500px>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    
                                </tr>
                                <?php endforeach ?>
                            </table>
                
                </div>
                
    </div>

    <div class="footer">
        <h1>National Institue of Technology, Warangal</h1>
    </div>

</body>

</html>