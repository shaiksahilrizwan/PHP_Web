<?php 
    $conn=mysqli_connect("localhost","root","","CRUD") or die("Fatal Error can't connect to the Server!!");
    if(isset($_POST['updt'])):
        $name=$_POST['name'];
        $add=$_POST['address'];
        $cls=$_POST['scls'];
        $sqlupqr="UPDATE STUDENT SET SNAME='{$name}',SADDRESS='{$add}',SCLASS='{$cls}' WHERE SID='{$_POST['identifier']}'";
        mysqli_query($conn,$sqlupqr);
        mysqli_close($conn);
        header("Location: read.php");
    endif;
   
?>
