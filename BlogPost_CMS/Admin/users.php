<?php
    include "auth.php";
    include "logout.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table><th><a href="add-user.php">Add Users</a>
    </th>
    <h1>Users Present</h1>
    <?php
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        $limit=4;
        $offset=($page-1)*$limit;
        $conn=mysqli_connect('localhost','root','','BLOGSITE') or die("Busy at moment can't connect to the server!!");
        $sql="SELECT USERID,FIRSTNAME,LASTNAME,username,role FROM USER LIMIT {$offset},{$limit}";
        $result=mysqli_query($conn,$sql)or die("Failed Query!!");
        if($result){
            ?>
            <table style="border: solid black 4px;border-collapse:collapse">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Role</th>
                </tr>
            </thead>
            <?php
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['FIRSTNAME']; ?></td>
                            <td><?php echo $row['LASTNAME']; ?></td>
                            <td> <?php echo $row['username']; ?></td>
                            <?php if($row['role']==0){?>
                            <td>Admin</td>
                            <?php }else{?>
                                <td>Normal User</td>
                       <?php }
                       ?> 
                       <td><a href="update-user.php?id=<?php echo $row['USERID']?>">Update</a></td>
                       <td><a href="delete-user.php?id=<?php echo $row['USERID']?>">Delete</a></td>
                       </tr>
                        <?php
                    }
                } 
                }
                $sql1="SELECT * FROM USER";
                $result=mysqli_query($conn,$sql1)or die("Failed Fetch!");
                $records=mysqli_num_rows($result);
                if($records>0){
                    $totalpages=ceil($records/4);
                    for($i=1;$i<=$totalpages;$i++):
                ?>
                    <a href="users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php         
                    endfor;
                }
                mysqli_close($conn);
                ?>
                 </table>

            <form action="logout.php" method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
           
</body>
</html>