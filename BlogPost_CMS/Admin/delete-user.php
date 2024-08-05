<?php
    include "auth.php";
    
?>
<?php
    $userid =$_GET['id'];
    $conn=mysqli_connect("localhost","root","","BLOGSITE");
    $sql="DELETE FROM USER WHERE USERID={$userid}";
    if(mysqli_query($conn,$sql)){
        header("Location: users.php");
    }
    else{
        echo "Can't delete Record!!";
    }
    mysqli_close($conn);
?>