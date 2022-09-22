<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST['username']);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);

if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>




<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        table,

        table.center {
            margin-top: -250px;
            margin-left: auto;
            margin-right: auto;
        }

        td {

            padding: 3px;

            text-align: left;
        }
    </style>
</head>

<body>

    <div class="heading">
        <img class="hl" src="Nitw.png">
        <h1>Exam Time</h1>
        <img class="hr" src="Nitw.png">
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h3>Please Register Here:</h3>
        <hr>
        <form action="" method="post"  >
            <table class="center" style="margin-top:-14%;">
                <form action="" method="post">
                    <tr>
                        <td> <label for="name">User Name</label></td>
                        <td><input type="text" name="username" id="name"></td>
                    </tr><br>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr><br>
                    <br>
                    <tr>
                        <td><label for="password">Confirm Password</label></td>
                        <td><input type="password" name="confirm_password" id="confirm_password"></td>
                    </tr><br>
                    <br>
                    <tr>
                        <td><label for="email">Email </label></td>
                        <td><input type="email" name="email" id="email"></td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td><label for="phone">Phone</label></td>
                        <td><input type="number  " name="number" id="phone"><br></td>
                    </tr>

                    <br>
                  
                    <tr>
                        <td><br><br><br><input type="submit" value="SignUp"></td>
                        <td><br><br><br><input type="reset" value="clear"></td>
                    </tr>
                </form>
            </table>
    </div>


    <div class="footer">
        <h1>National Institue of Technology, Warangal</h1>
    </div>

</body>

</html>