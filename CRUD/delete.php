<?php
    $id=$_GET['id'];
    $conn=mysqli_connect("localhost","root","","CRUD")or die("Fatal Error  in connecting DB!");
    $sql="DELETE FROM STUDENT WHERE SID={$id}";
    mysqli_query($conn,$sql)or die("Unsucessful to delete the entry!!");
    header("Location: read.php");
    mysqli_close($conn);
?>
