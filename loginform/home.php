<?php
    session_start();
    if(isset($_SESSION['user'])){
        echo $_SESSION['user'];
    
?>
<!-- Inject your HTML Code here -->
 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <button type="sub" name="logout">Logout</button>
 </form>

<?php }else{
        echo "<br>You need to <a href='login.php'>Login</a>First to Access the Page!!";   
}
if(isset($_POST['logout'])):
    session_unset();
    session_destroy();
    header("Location: login.php");
endif;
?>


