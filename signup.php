<?php
if (isset($_POST['submit'])) {
    include "connection.php";

    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    // Sanitize inputs
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);

    // condition used to check either user exist are not
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    //check if same email is present are not
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_user == 0 && $count_email == 0) {
        if ($password == $re_password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            // Insert the new user
            $sql = "insert into users(username, email, password) value('$username', '$email', '$hash')";
            $return = mysqli_query($conn, $sql);

            if ($return) {
                // Successful registration
                header("Location: welcome.php");
                exit();
            } else {
                echo '<script>
                    alert("There was an error registering your account. Please try again.");
                    window.location.href="signup.php";
                    </script>';
            }
        } else {
            echo '<script>
                alert("Passwords do not match!");
                window.location.href="signup.php";
                </script>';
        }
    } else {
        echo '<script>
            alert("Username or email already exists!");
            window.location.href="signup.php";
            </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- signup page -->
    <section id="form">
        <h2>Signup Form</h2>
        <form name="form" action="signup.php" method="POST" class="signup">
            <div class="input-box">
                <input type="text" id="user" name="user" placeholder="Username" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="Email" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="input-box">
                <input type="password" id="re_password" name="re_password" placeholder="Confirm Password" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="submit">
                <input type="submit" id="btn" value="Signup" name="submit"/>
            </div>
            <div class="login">
                <p>Have an account?</p>
                <a href="login.php">Login</a>
            </div>
        </form>
    </section>
</body>
<script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"></script>
</html>
