       
<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
?>


<?php
              $con = mysqli_connect('localhost','root');
              mysqli_select_db($con,'examtime');
                $username = $_SESSION['username'];
                $image = $_FILES['file']; 

                $filename = $image['name'];
                $fileerror = $image['error'];
                $filetmp = $image['tmp_name'];
 
                $fileext = explode('.',$filename);
                $filecheck = strtolower(end($fileext));

                $fileextstored = array('png','jpg','jpeg','pdf','pptx','mp4','mkv','zip','doc','xlsx','docx','txt');
                

                if(in_array($filecheck,$fileextstored)){
                    $destinationfile = $filename;
                    $destination_file = 'new/'.$filename;
                    move_uploaded_file($filetmp,$destination_file);



                    if(isset($_POST['me'])){
                    $q = "INSERT INTO `me`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: first.php");
                }

                if(isset($_POST['psqt'])){
                    $q = "INSERT INTO `psqt`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: first.php");
                }

                if(isset($_POST['mfcs'])){
                    $q = "INSERT INTO `mfcs`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: first.php");
                }

                if(isset($_POST['psp'])){
                    $q = "INSERT INTO `psp`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: first.php");
                }

                if(isset($_POST['psplab'])){
                    $q = "INSERT INTO `psplab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: first.php");
                }

                if(isset($_POST['co'])){
                    $q = "INSERT INTO `co`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: first.php");
                }

                if(isset($_POST['fyp'])){
                    $q = "INSERT INTO `fyp`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: first.php");
                }

                if(isset($_POST['foss'])){
                    $q = "INSERT INTO `foss`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: first.php");
                }

                if(isset($_POST['afm'])){
                    $q = "INSERT INTO `afm`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: second.php");
                }

                if(isset($_POST['ds'])){
                    $q = "INSERT INTO `ds`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: second.php");
                }
                if(isset($_POST['fwp'])){
                    $q = "INSERT INTO `fwp`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: second.php");
                }
                if(isset($_POST['oop'])){
                    $q = "INSERT INTO `oop`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: second.php");
                }
                if(isset($_POST['utp'])){
                    $q = "INSERT INTO `utp`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: second.php");
                }
                if(isset($_POST['dslab'])){
                    $q = "INSERT INTO `dslab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: second.php");
                }
                if(isset($_POST['fwplab'])){
                    $q = "INSERT INTO `fwplab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: second.php");
                }
                if(isset($_POST['ooplab'])){
                    $q = "INSERT INTO `ooplab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: second.php");
                }
                if(isset($_POST['syp'])){
                    $q = "INSERT INTO `syp`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: second.php");
                }
                if(isset($_POST['typ'])){
                    $q = "INSERT INTO `typ`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: third.php");
                }
                if(isset($_POST['ospm'])){
                    $q = "INSERT INTO `ospm`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: third.php");
                }
                if(isset($_POST['dbms'])){
                    $q = "INSERT INTO `dbms`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: third.php");
                }
                if(isset($_POST['se'])){
                    $q = "INSERT INTO `se`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: third.php");
                }
                if(isset($_POST['electivei'])){
                    $q = "INSERT INTO `electivei`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: third.php");
                }
                if(isset($_POST['dbmslab'])){
                    $q = "INSERT INTO `dbmslab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: third.php");
                }
                if(isset($_POST['oslab'])){
                    $q = "INSERT INTO `oslab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: third.php");
                }
                if(isset($_POST['selab'])){
                    $q = "INSERT INTO `selab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: third.php");
                }
                if(isset($_POST['os'])){
                    $q = "INSERT INTO `os`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: third.php");
                }
                if(isset($_POST['aad'])){
                    $q = "INSERT INTO `aad`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fourth.php");
                }
                if(isset($_POST['ccn'])){
                    $q = "INSERT INTO `ccn`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fourth.php");
                }
                if(isset($_POST['pdwdm'])){
                    $q = "INSERT INTO `pdwdm`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fourth.php");
                }
                if(isset($_POST['electiveii'])){
                    $q = "INSERT INTO `electiveii`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fourth.php");
                }
                if(isset($_POST['electiveiii'])){
                    $q = "INSERT INTO `electiveiii`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fourth.php");
                }
                if(isset($_POST['electiveiv'])){
                    $q = "INSERT INTO `electiveiv`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fourth.php");
                }
                if(isset($_POST['ccnlab'])){
                    $q = "INSERT INTO `ccnlab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fourth.php");
                }
                if(isset($_POST['kelab'])){
                    $q = "INSERT INTO `kelab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fourth.php");
                }
                if(isset($_POST['foyp'])){
                    $q = "INSERT INTO `foyp`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fourth.php");
                }
                if(isset($_POST['mad'])){
                    $q = "INSERT INTO `mad`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fifth.php");
                }
                if(isset($_POST['st'])){
                    $q = "INSERT INTO `st`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fifth.php");
                }
                if(isset($_POST['madlab'])){
                    $q = "INSERT INTO `madlab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fifth.php");
                }
                if(isset($_POST['stlab'])){
                    $q = "INSERT INTO `stlab`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fifth.php");
                }
                if(isset($_POST['electivev'])){
                    $q = "INSERT INTO `electivev`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fifth.php");
                }
                if(isset($_POST['electivevi'])){
                    $q = "INSERT INTO `electivevi`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fifth.php");
                }
                if(isset($_POST['electivevii'])){
                    $q = "INSERT INTO `electivevii`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fifth.php");
                }
                if(isset($_POST['fiyp'])){
                    $q = "INSERT INTO `fiyp`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: fifth.php");
                }
                if(isset($_POST['ie'])){
                    $q = "INSERT INTO `ie`(`name`,`file`) VALUES ('$username','$destinationfile')";

                    $query = mysqli_query($con,$q);

                    header("location: interview.php");
                }

              }
            ?>
