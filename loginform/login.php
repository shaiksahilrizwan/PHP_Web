<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login!</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label for="id">RegdNo</label>
        <input type="text" id="id" name="id">
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass">
        <button type="submit" name="login">Login</button>
    </form>
    <?php
       
    ?>
<?php
     
    if(isset($_POST["login"])){
        $conn=mysqli_connect("localhost","root","","pass") or die("<br>"."Connection Failure");
            $id=$_POST['id'];
            $pass=sha1($_POST['pass']);
            $sql="SELECT * FROM STUDENT WHERE PASSCODE='{$pass}' AND SID='{$id}'";
            $result=mysqli_query($conn,$sql) or die("Fatal Error Occured!!");               
            if(mysqli_num_rows($result)>0){
                $_SESSION['user']=$id;
                header("Location: home.php");
                
            }
            else{
                echo "<br>"."Invalid Password or UserId";
            }
            mysqli_close($conn);
        }   
?>
</body>
</html>
