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
</head>
<body>
    <?php
    include "index.php";
    ?>
    <section id="form">
        <h2>
            signup form
        </h2>
        <form name="form" action="signup.php" method="POST">
                <label>User</label>
                <input type="text" id="user" name="user" required> <br>
                <label>email</label>
                <input type="email" id="email" name="email" required> <br>
                <label>password</label>
                <input type="password" id="password" name="password" required> <br>
                <label>Retype password</label>
                <input type="password" id="re_password" name="re_password" required> <br>
                <input type="submit" id="btn" value="signup" name="submit"/>
        </form>
    </section>
</body>
</html>