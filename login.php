<?php
if(isset($_POST['submit']))
{
    include "connection.php";
    $username=$_POST['user'];
    $password=$_POST['password'];

    $sql="select * from users where username ='$username' or email='$username'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    if($row){
        if(password_verify($password,$row["password"]))
        {
            header("Location:welcome.php");    
        }
    }
    else{
        echo'<script>
            alert("incorrect email/password");
            window.location.href="login.php";
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
    // include "index.php";
?>
    <section id="form">
        <h2>
            Login 
        </h2>
        <form name="form" action="login.php" method="POST">
                <label>User/email</label>
                <input type="text" id="user" name="user" required> <br>
                <label>password</label>
                <input type="password" id="password" name="password" required> <br>
                <input type="submit" id="btn" value="Login" name="submit"/>
        </form>
    </section>
</body>
</html>


