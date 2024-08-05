<?php
    session_start();
    if(!isset($_SESSION['username'])){
        
        header("Location: http://localhost/Blog/Admin/");
       
    }
   
    if(!$_SESSION['role']=='0'){
        header("Location: http://localhost/Blog/Admin/logout.php");
    }
    echo $_SESSION['username']."Currently Logged In!!";

?>