<?php
    $conn=mysqli_connect("localhost","root","","CRUD") or die("Fatal Error can't connect to the Server!!");
    $sql="SELECT * FROM STUDENT WHERE SID={$_GET['id']}";
    $result=mysqli_query($conn,$sql) or die("Can't Reterive data at moment!!");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
    
?>
<form action="updateredirect.php" method="post">
    
    <input type="hidden" value="<?php echo $_GET['id'];?>" name="identifier">   
    <label for="name">Name</label>
    <input type="text" value="<?php echo $row['SNAME']; ?>" name="name">
    
    
    <label for="Address">Address</label>
    <input type="text" value="<?php echo $row['SADDRESS']; ?>" name="address">
        
    <select name="scls" id="Sclass">
    <?php $sql="SELECT * FROM CLASS";
        $res=mysqli_query($conn,$sql) or die("Unable to reterive the data!!");
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){ 
        ?> 
        <option value="<?php echo $row['CID']; ?>"><?php echo $row['BLOCK']; ?></option>
        <?php }
        }
        else{
            die("No record Found!!");
        }
        ?>
        </select> 
        <button type="submit" name="updt">Update Data!</button>
</form>
<?php 
}
    }
    mysqli_close($conn);    
?>
