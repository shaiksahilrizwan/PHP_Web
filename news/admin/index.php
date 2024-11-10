<?php 
    include "config.php";
    #Checking Already Login
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: ".$site."Admin/users.php");
    }
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER["PHP_SELF"]; ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                         <?php 
                            if(isset($_POST["login"])){
                                #include "config.php";
                                #if the sign in is pressed then only we try to make the DB connection
                                $username=mysqli_real_escape_string($conn,$_POST['username']);
                                $password=mysqli_real_escape_string($conn,sha1($_POST['password']));
                                $sql="SELECT * FROM USER WHERE username='{$username}' AND PASSWORD='{$password}'";
                                $result=mysqli_query($conn,$sql) or die("Unable to Process the Authentication"); #Running the Query
                                if(mysqli_num_rows($result)>0){
                                    session_start(); #Starting the Session
                                    while($row=mysqli_fetch_assoc($result)){
                                        $_SESSION['userid']=$row['USERID'];
                                        $_SESSION['name']=$row['FIRSTNAME']." ".$row['LASTNAME'];
                                        $_SESSION['role']=$row['role'];         
                                        $_SESSION['username']=$row['username'];
                                        header("Location: $site"."Admin/users.php");
                                    }
                                }else{
                                    echo "<script>alert('The Username or Password Do not match, Try again !')</script>"; #If not a valid Login
                                    echo "<div class='alert alert-danger'>Username or Password Do not Match!</div>";
                                }
                            }
                         ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
