<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <!-- <label for="uid">ID</label><input type="text" id="uid"name="sid"> -->
        <label for="nam">Name</label><input type="text" id="nam" name="name">
        <label for="add">Address</label><input type="text" name="address" id="add">
        <select name="class" id="cls">
            <?php 
            $conn=mysqli_connect("localhost","root","","CRUD") or die("Fatal Error Ocurred!");
            $sql="SELECT * FROM CLASS";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){

            ?>
            <option value="<?php echo $row['CID']; ?>"><?php  echo $row['BLOCK']; ?></option>

            <?php } ?>
        </select>
        <button name="sub">InsertData!</button>
    </form>
    <?php
        if(isset($_POST['sub'])):
            $ins="INSERT INTO STUDENT VALUES('{$_POST['sid']}','{$_POST['name']}','{$_POST['address']}','{$_POST['class']}')";
            $res=mysqli_query($conn,$ins) or die("Failed to Inser Data!!");
            header("Location: http://localhost/CRUD/read.php");
            mysqli_close($conn);
        endif;
        
    ?>
</body>
</html>