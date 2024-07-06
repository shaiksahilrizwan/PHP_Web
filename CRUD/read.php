<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data from Database</title>
    <style>
        table,th,td{
            border:solid black 1px;
        }
    </style>
</head>
<body>
<?php
#establish connection with database
    $conn=mysqli_connect("localhost","root","","CRUD") or die("Fata Error Occured Contact Website Admin!");
    #sql query
    $sql="SELECT * FROM STUDENT AS S,CLASS AS C WHERE S.SCLASS=C.CID;";
    #passing the query
    $result=mysqli_query($conn,$sql) or die("Error in Fetching !!!");
    #if rows returened >0
    if(mysqli_num_rows($result)>0){

    
?> 
<table style="border:1px solid black">
        <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>ADDRESS</th>
            <th>CLASS</th>
        </thead>
        <?php 
        #Access rows through associative array        
        while($row=mysqli_fetch_assoc($result)){ ?>
        <tbody>
            
            <tr><td><?php echo $row['SID'];?></td>
            <td><?php echo $row['SNAME'];?></td>
            <td><?php echo $row['SADDRESS'];?></td>
            <td><?php echo $row['BLOCK']; ?></td></tr>

        </tbody>
        <?php }  ?>
</table>   
<?php }
#if no records/rows found 
else{
    echo "No record Found!!";
} 
#close connection
mysqli_close($conn);
?>
</body>
</html>
