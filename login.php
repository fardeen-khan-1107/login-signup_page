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
    <title>Login</title>
</head>
<body>
    <section id="form">
        <h2>Login</h2>
        <form name="form" action="login.php" method="POST">
            <label>User/email</label>
            <input type="text" id="user" name="user" required> <br>
            <label>Password</label>
            <input type="password" id="password" name="password" required> <br>
            <input type="submit" id="btn" value="Login" name="submit"/>
        </form>
    </section>
</body>
</html>
