<?php
    session_start();
    include("connection.php");
    
    if($con){
        //echo '<script>alert("Connection established successfully.")</script>';
        }
        else{
            echo "could not find database";
        }

    if(isset($_POST['login'])){

        $user_name = $_POST['user'];
        $password = $_POST['password'];

        mysqli_select_db($con,'onlinechat');
        
        $q= "select * from users where username='$user_name' && password = '$password'";
        $result = mysqli_query($con,$q);
        $num = mysqli_num_rows($result);

        if($num == 1){
            $_SESSION['user_name'] = $user_name;
            //$_SESSION['password'] = $password;
            
            header("location:chat.php");
            
        }
        else{
            //echo "invalid username and password.";
            echo '<script>alert("Invalid username and password.");
                    window.location="index.php"</script>';
        }


    }//issett closed

?>