<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
        <!--<script src='https://kit.fontawesome.com/a076d05399.js'></script>-->
        <script src="https://use.fontawesome.com/914bab8b11.js"></script>

        <style>
           body {
                    background-color: #f5f5f5;
                }
        </style>
    
    </head>
    <body>
        <?php
            
            session_start();
            include("connection.php");            
            //if(isset($_SESSION['user_name'])){
                //echo '<h2>Welcome: </h2>'.$_SESSION['user_name'];
           // }
           $sid =session_id();
           //echo $sid; 
           //echo '<br>';
           if (!isset($_SESSION['start_time']))
            {
                $str_time = time();
                $_SESSION['start_time'] = $str_time;
            }

            //echo $_SESSION['start_time'];  
            echo '<br>';
        
        ?>

        

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <span style="font-size:18px; font-weight:500">Welcome: </span><?php  if(isset($_SESSION['user_name'])){
                                            echo '<span style="font-size:24px; font-weight:500">'.$_SESSION['user_name'].'</span>';
                                        }
                                    ?>
                                    <br><a href = "logout.php">Logout</a><br>
                    <!--<img src="psychology-2422442_1280.png" alt="Girl in a jacket" width="180" height="200" style="padding: 1px;">-->                
                </div>

                

                <div class="col-lg-6">
                
                </div>

                    <!--php for total users and online users-->
                    <?php    
                        include("connection.php"); 
                        mysqli_select_db($con,'onlinechat');

                        //for inserting data into onlineusers table.
                        if(isset($_SESSION['user_name'])){
                            $user1=  $_SESSION['user_name'];

                            $q4= "select * from onlineusers where onlineusernames='$user1'";
                            $result2 = mysqli_query($con,$q4);
                            $num = mysqli_num_rows($result2);
                
                            if($num<1){
                                $q3 = "insert into onlineusers(onlineusernames) values ('$user1')";
                                $r1 = mysqli_query($con,$q3);
                            }
                           //upto here data inerted successfully in onlineusers table.

                        //total users
                        $q2 = "select * from users";
                        $total=mysqli_query($con,$q2);
                        if($total->num_rows > 0){
                            //$total2 = mysqli_fetch_array($total);
                            $total2 = mysqli_num_rows($total);
                        }

                        $q5 = "select * from onlineusers";
                        $total=mysqli_query($con,$q5);
                        if($total->num_rows > 0){
                            //$total2 = mysqli_fetch_array($total);
                            $total3 = mysqli_num_rows($total);
                        }
                        
                        
                    
                    ?>

                <div class="col-lg-3">
                    <span id="displayonline1"><?php echo '<i class="fa fa-user-check" style="font-size:16px; color:#5cb85c"></i>&nbsp;Users Online: '.$total3;?></span><br>
                    <span><i class="fas fa-user-clock" style="font-size:16px; color:#0275db"></i>&nbsp;Total Users: <?php echo '<span>'.$total2.'</span>';?> </span>
                </div>

            </div><!-- row ends-->
            <div class="row">
                <div class ="col-lg-2"></div>
                <div class ="col-lg-8">
                <button id="displaydata" class="btn btn-success text-center">Refresh &nbsp; <i class='fas fa-sync-alt' style='font-size:16px; color: #fff'></i></button>
                    <div id ="messagearea" style=" height:430px; overflow:scroll; overflow-x:hidden; margin-top:10px">
                        
                        <?php
                            include("connection.php"); 
                            mysqli_select_db($con,'onlinechat');
                            
                            //$date = date('Y-m-d H:i:s');
                            date_default_timezone_set('Asia/Kolkata');
                            $date =  date('d-m-Y H:i');
  
                            }

                           /* $q1 = "select * from messages ORDER BY id DESC";
                            $mysqli_result = mysqli_query($con,$q1);
                            
                            if($mysqli_result->num_rows > 0){
                            
                            while($row = mysqli_fetch_array($mysqli_result)){
                                //$message = $row['message'];
                                //$username = $row['username'];
                                
                                    echo '<p style="background-color:white; width:96%; height:auto; margin-top:5px; margin-left:10px; padding:5px; border-radius:5px; box-shadow: 2px 3px 5px #959595; overflow:auto;">';
                                    echo '<p1 style="color:#0c0c0c;font-weight:bold">'.$row["username"].'</p1>';
                                    //echo $row["username"];
                                    echo '<br>';
                                    echo $row["message"];
                                    echo '<br>';
                                    echo '<p1 style="color:#787878;font-weight:normal;font-size:11px">'.$row["date"].'</p1>';
                                    //echo $row["date"];
                                    echo '</p>';
                                
                                

                            }
                            }else{
                                echo "error!";
                            }*/


                            
                            if(isset($_POST['send'])){
                                $message = $_POST['message'];
                                if(isset($_SESSION['user_name'])){
                                    $user1=  $_SESSION['user_name'];
                                }
                                
                                if ($user1!="" && $message!=""){
                                
                            
                                //$q="insert into messages(message,username,date) values ('$message','$user1','$date')";
                                
                            
                                
                                    //echo '<script>alert("Message delivered successfully");</script>';
                                    
                                    /*echo '<p style="background-color:white; width:96%; height:auto; margin-top:5px; margin-left:10px; padding:5px; border-radius:5px; box-shadow: 2px 3px 5px #959595; overflow:auto;">';
                                    echo '<p1 style="color:#0c0c0c;font-weight:bold">'.$_SESSION['user_name'].'</p1>';
                                    //echo $row["username"];
                                    echo '<br>';
                                    echo $message;
                                    echo '<br>';
                                    echo '<p1 style="color:#787878;font-weight:normal;font-size:11px">'.$date.'</p1>';
                                    echo '</p>'; */

                                    $q="insert into messages(message,username,date) values ('$message','$user1','$date')";
                                    $r = mysqli_query($con,$q);

                                    
                                    
                                } 
                              //checking message and usr not empty.
                              else {
                                  //echo '<a href="javascript:alert("Can not submit empty message!!");">';
                                  //code not working -- solved in javascript!
                              }

                            
                            
                              

                            
                            
                            /* $q1 = "select * from messages ORDER BY id DESC";
                            $mysqli_result = mysqli_query($con,$q1);
                            
                            if($mysqli_result->num_rows > 0){
                            
                            while($row = mysqli_fetch_array($mysqli_result)){
                                //$message = $row['message'];
                                //$username = $row['username'];
                                
                                    echo '<p style="background-color:white; width:96%; height:auto; margin-top:5px; margin-left:10px; padding:5px; border-radius:5px; box-shadow: 2px 3px 5px #959595; overflow:auto;">';
                                    echo '<p1 style="color:#0c0c0c;font-weight:bold">'.$row["username"].'</p1>';
                                    //echo $row["username"];
                                    echo '<br>';
                                    echo $row["message"];
                                    echo '<br>';
                                    echo '<p1 style="color:#787878;font-weight:normal;font-size:11px">'.$row["date"].'</p1>';
                                    //echo $row["date"];
                                    echo '</p>';
                                
                                

                            }
                            }else{
                                echo "error!";
                            }*/
                            /*$q="insert into messages(message,username,date) values ('$message','$user1','$date')";
                            $r = mysqli_query($con,$q);*/
                        }

                            $q1 = "select * from messages ORDER BY id DESC";
                            $mysqli_result = mysqli_query($con,$q1);
                            
                            if($mysqli_result->num_rows > 0){
                            
                            while($row = mysqli_fetch_array($mysqli_result)){
                                //$message = $row['message'];
                                //$username = $row['username'];
                                
                                    echo '<p style="background-color:white; width:96%; height:auto; margin-top:5px; margin-left:10px; padding:5px; border-radius:5px; box-shadow: 2px 3px 5px #959595; overflow:auto;">';
                                    echo '<p1 style="color:#0c0c0c;font-weight:bold">'.$row["username"].'</p1>';
                                    //echo $row["username"];
                                    echo '<br>';
                                    echo $row["message"];
                                    echo '<br>';
                                    echo '<p1 style="color:#787878;font-weight:normal;font-size:11px">'.$row["date"].'</p1>';
                                    //echo $row["date"];
                                    echo '</p>';
                                
                                

                            }
                            }else{
                                echo "error!";
                            }
                            

                            
                                      
                                
        
                            
                            
                            
                        ?> 
                        
                                            
                    </div><!--message diplay area ends-->
                    
                <div class="parent">
                        <div id ="typearea" style="background-color:white; width: 82.5%; height:auto; margin-top:10px; padding:5px; border:1px solid black; float:left; clear:none">
                            <form id = "usrmessage" method="POST">
                                <!--<input type="textarea" name="message" id="shortmessage" maxlength="200" style="width:99%; margin-left:auto; margin-right:auto; display:block; overflow:scroll;"/>-->
                                <textarea rows="3" name="message" form="usrmessage" id="shortmessage" maxlength="200" style="width:99%; margin-left:auto; margin-right:auto; display:block; "></textarea>
                        </div>
                        <!--<button class="btn btn-light" type="submit" onclick="requiredmessage()" name="send" style="float:right; clear:none; margin-top:25px; margin-right:10px; margin-left:3px; padding-top:10px"><i class='fa fa-paper-plane' style='font-size:30px; color: #4169e1'></i></button>-->
                        <button class="btn btn-light" type="submit" onclick="requiredmessage()" name="send" style="float:right; clear:none; margin-top:25px; margin-right:10px; margin-left:3px; padding-top:10px"><i class="fa fa-paper-plane" style='font-size:30px; color: #4169e1' aria-hidden="true"></i></button>
                        </form>
                </div><!--parent ends-->

               



            </d iv><!--col-lg-8 ends-->
            <div class ="col-lg-2"></div>
            </div><!-- row2 ends-->
        </div><!-- container ends-->
            
        
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }

            $('#displaydata').click(function(){
                $.ajax({
                    url:'displayajax.php',
                    type: 'post',
                    success: function(getdata){
                        $('#messagearea').html(getdata);
                    }

                });

                $.ajax({
                    url:'updateonline.php',
                    type: 'post',
                    success: function(getdata){
                        $('#displayonline1').html(getdata);
                    }

                });

               
                


            });

            function requiredmessage() {
                var x = document.getElementById("shortmessage").value;
                if (x == "" || x == null) {
                    alert("Can not send empty message!");
                    return false;
                }
                
            }

            

            
        </script>
    </body>
</html>