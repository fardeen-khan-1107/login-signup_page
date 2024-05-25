<?php
if(isset($_POST['submit'])){ 
   include "connection.php";
   $username=$_POST['user'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $re_password=$_POST['re_password']; 

   $sql="select *from users where username='$username'";
   $result=mysqli_query($conn,$sql);//this command is used to store the data in the form of arrays
   $count_user=mysqli_num_rows($result);//return the no.of user which having the same name to ceck in the data

   $sql="select *from users where email='$email'";
   $result=mysqli_query($conn,$sql);
   $count_email=mysqli_num_rows($result);

   if($count_user==0||$count_email==0)
   {
    if($password==$re_password){
        $hash =password_hash($password,PASSWORD_DEFAULT);
        $sql="insert into users(username,email,password) values('$username','$email','$hash')";
        $return =mysqli_query($conn,$sql);//it is used to update the data and store in the database

   }
   else{
   echo '<script>
    alert("password does not match!");
    window.location.href="signup.php";
    </script>';
    }
    }
   else{
    echo'<script>
    alert("user already exists!");
    window.location.href="index.php";
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
    <?php
    // include "index.php";
    ?>
    <section id="form">
        <h2>
            signup form
        </h2>
        <form name="form" action="signup.php" method="POST" class="singup">
            <div class="input-box">
                <!-- <label>User</label> -->
                <input type="text" id="user" name="user" placeholder="Username" required> 
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <!-- <label>email</label> -->
                <input type="email" id="email" name="email"  placeholder="Email" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-box">
                <!-- <label>password</label> -->
                <input type="password" id="password" name="password"  placeholder="password" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <div class="input-box">
                <!-- <label>Retype password</label> -->         
                <input type="password" id="re_password" name="re_password" placeholder="confrom password" required>
                <i class="fa-solid fa-lock"></i>
            </div>
                <div class="submit">
                <input type="submit" id="btn" value="signup" name="submit"/>
            </div> 
            <div class="login">
                <p>have a account?</p>
                <a href="login.php">login</a>
            </div>       
        </form>
    </section>
</body>
<script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"></script>
</html>