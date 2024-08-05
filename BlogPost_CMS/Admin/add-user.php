<?php
    include "auth.php";
    
?>
<?php 
    if(isset($_POST['save'])){
        $conn=mysqli_connect('localhost','root','','BLOGSITE') or die("<h2>Can't ASave Data to Server at moment!</h2>");
        $fname=mysqli_real_escape_string($conn,$_POST['fname']);
        $lname=mysqli_real_escape_string($conn,$_POST['lname']);
        $user=mysqli_real_escape_string($conn,$_POST['username']);
        $password=mysqli_real_escape_string($conn,sha1($_POST['password']));
        $role=mysqli_real_escape_string($conn,$_POST['role']);
        $sql="SELECT USERNAME FROM USER WHERE USERNAME='{$user}'";
        
        $result=mysqli_query($conn,$sql) or die("Query Failed!");
        
        if(mysqli_num_rows($result)>0){
            echo "<h3 style='color:red'>Username Already Exists use different User Name</h3>";
        }
        else{
            
            $sql1="INSERT INTO USER(FIRSTNAME,LASTNAME,username,PASSWORD,role) VALUES('{$fname}','{$lname}','{$user}','{$password}',{$role})";
            if(mysqli_query($conn,$sql1)){
                header("Location: http://localhost/Blog/Admin/users.php");
            }else{
                
                echo "Incorrect Entry Please see all details are filled!!";
            }
            
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
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <center>
        <table style="background-color:black;color:white;border:solid white 4px;">
            <tr>
                <th>Details!!</th>
            </tr>
        <tr><td>
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname"></td>
        </tr>
        <tr><td><label for="Lname">Last Name</label>
        <input type="text" name="lname" id="lname"></td></tr>
        <tr><td><label for="username">Username</label>
        <input type="text" name="username" id="username"></td>
        </tr>
        <tr><td><label for="password">Password</label>
        <input type="password" name="password" id="password"></td></tr>
        <tr><td><select name="role" id="role">
            <option value="0">Admin</option>
            <option value="1">Normal User</option>
        </select></td></tr>
        <tr><td>
        <input type="submit" name="save">
        </td></tr>
    </table></center>
    </form>
</body>
</html>