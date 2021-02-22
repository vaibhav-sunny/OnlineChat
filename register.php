<?php
    include("connection.php");

    if($con){
    //echo '<script>alert("Connection established successfully.")</script>';
    }
    else{
        echo "could not find database";
    }

    if (isset($_POST['register'])){
        $name = $_POST['user'];
        $pass = $_POST['password'];

        if($name!="" && $pass!=""){

            mysqli_select_db($con,'onlinechat');
            $q= "select * from users where username='$name'";
            $result = mysqli_query($con,$q);
            $num = mysqli_num_rows($result);

            if($num>=1){
                //echo "This username is alraedy taken. Try another one.";
                echo '<script>alert("This username is alraedy taken. Try another one."); window.location="index.php"</script>';
            }
            else{
                $q1 = "insert into users(username,password) values ('$name','$pass')";
                if(mysqli_query($con,$q1)){
                    
                    //header('location:login.php');
                    echo '<script>alert("User account created successfully. Press OK to continue and login via enter chat.");
                    window.location="index.php"</script>';
                }
                else{
                    //echo "registration failed";
                    echo '<script>alert("Registration failed.")</script>';
                }
            }
        }
        else{
            //echo "please fill all the fields";
            echo '<script>alert("Please fill all the fields.")</script>';
        }
    } //isset closed
?>