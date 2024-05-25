<?php
if (isset($_POST['submit'])) {
    include "connection.php";
    $username = $_POST['user'];
    $password = $_POST['password'];

    $sql = "select * from users where username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1){
        header("Location:welcome.php");
    }
    else{
        echo '<script>
        window.location.href="index.php";
        alert("login failed")</script>';
    }

    // if ($result) {
    //     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //     if ($row) {
    //         if (password_verify($password, $row["password"])) {
    //             session_start();
    //             $_SESSION['username'] = $row['username'];
    //             $_SESSION['loggedin'] = true;
    //             header("Location: welcome.php");
    //             exit();
    //         }  else {
    //                     echo '<script>
    //                     alert("Incorrect password");
    //                      window.location.href="login.php";
    //                    </script>';
    //         }
    //     } else {
    //         echo '<script>
    //                 alert("Incorrect email or username");
    //                 window.location.href="login.php";
    //               </script>';
    //     }
    // }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <!-- login page -->
    <section id="form">
        <h2>Login</h2>
        <form name="form" action="login.php" method="POST">
            <div class="input-box">
            <!-- <label>User/email</label> -->
            <input type="text" id="user" name="user" placeholder="User/email" required> 
            <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
            <!-- <label>Password</label> -->
            <input type="password" id="password" name="password" placeholder="password" required> 
            <i class="fa-solid fa-lock"></i>
            </div>
            <div class="submit">
            <input type="submit" id="btn" value="Login" name="submit"/>
            </div>
            <div class="signup">
                <p>Don't have a account?</p>
                <a href="signup.php">signup</a>
            </div>  
        </form>
    </section>
</body>
<script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"></script>
</html>
