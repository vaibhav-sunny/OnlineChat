<?php
    session_start();

    include("connection.php"); 
    mysqli_select_db($con,'onlinechat');

    if(isset($_SESSION['user_name'])){
        
        $u1 = $_SESSION['user_name'];
        
        $q3 = "delete from onlineusers where onlineusernames = '$u1'";
        $r1 = mysqli_query($con,$q3);
        
        unset($_SESSION['user_name']);

        //unset($_SESSION['password']);
        
        //session_destroy();

        echo '<script>alert("User logged out successfully. Press OK to continue.");
                    window.location="index.php"</script>';
    }else{
        session_destroy();
        header("location:login.php");
    }
?>