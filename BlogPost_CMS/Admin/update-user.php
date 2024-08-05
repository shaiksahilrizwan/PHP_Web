<?php
    include "auth.php";
    
?>
<?php
    $userid= $_GET['id'];
    $conn=mysqli_connect("localhost","root","","BLOGSITE") or die("Can't connect to server!");
    $sql="SELECT * FROM USER WHERE USERID={$userid}";
    $result=mysqli_query($conn,$sql) or die("Query Failed !");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

        
    
?>
<form action="<?php  $_SERVER['PHP_SELF'];?>" method="post">
        <center>
        <table style="background-color:black;color:white;border:solid white 4px;">
            <tr>
                <th>Details!!</th>
            </tr>
        <tr><td>
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" value="<?php echo $row['FIRSTNAME'];?>"></td>
        </tr>
        <tr><td><label for="Lname">Last Name</label>
        <input type="text" name="lname" id="lname" value="<?php echo $row['LASTNAME']; ?>"></td></tr>
        <tr><td><label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>"></td>
        </tr>
        <?php
            if($row['role']==0){
                           
        ?>
            <tr><td><select name="role" id="role">
            <option value="0" selected>Admin</option>
            <option value="1">Normal User</option>
        </select></td></tr>
        <?php }else{

        ?>
        <tr><td><select name="role" id="role">
             <option value="0">Admin</option>
             <option value="1" selected>Normal User</option>
        <tr><td>
        <?php } ?>
        <button type="submit" name="update">Update</button>
        </td></tr>
    </table></center>
    </form>
<?php }}else{
    echo "<h2>No records Found!!<h2>";
}
?>
<?php 
    if(isset($_POST['update'])){
        $conn=mysqli_connect('localhost','root','','BLOGSITE') or die("<h2>Can't ASave Data to Server at moment!</h2>");
        $fname=mysqli_real_escape_string($conn,$_POST['fname']);
        $lname=mysqli_real_escape_string($conn,$_POST['lname']);
        $user=mysqli_real_escape_string($conn,$_POST['username']);
        $role=mysqli_real_escape_string($conn,$_POST['role']);
        $sql1="UPDATE USER SET FIRSTNAME='{$fname}',LASTNAME='{$lname}',username='{$user}',role={$role} WHERE USERID={$userid}";
        if(mysqli_query($conn,$sql1)){
               header("Location: http://localhost/Blog/Admin/users.php");
        }else{
                echo "Incorrect Entry Please see all details are filled!!";
        }
            mysqli_close($conn);
        }
       
    ?>