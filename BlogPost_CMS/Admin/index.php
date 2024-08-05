<?php
    session_start();
    if(isset($_SESSION['username'])){
        echo "Logged already !!";
        header("Location: http://localhost/Blog/Admin/users.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">
            Username
        </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="Password">Password</label>
        <input type="password" name="password" id="Password">
        <br>
        <input name="login" type="submit" value="Login">
    </form>
    <?php
        
        if(isset($_POST['login'])){
            $conn=mysqli_connect("localhost","root","","BLOGSITE") or die("Connect Failed!");
            $username=mysqli_real_escape_string($conn,$_POST['username']);
            $password=mysqli_real_escape_string($conn,sha1($_POST['password']));
            $sql="SELECT * FROM USER WHERE username='{$username}' AND PASSWORD='{$password}' AND role='0'";
            $result=mysqli_query($conn,$sql) or die("Fetch Unsucessfull");
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($row['role']=="0"){
                    session_start();
                    $_SESSION['username']=$row['username'];
                    $_SESSION['role']=$row['role'];
                    $_SESSION['userid']=$row['USERID'];
                    header("Location: http://localhost/Blog/Admin/users.php");
                }
                
            }
            }else{
                echo "Login Failed";
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>
