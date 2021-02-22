<?php
    include("connection.php"); 
    mysqli_select_db($con,'onlinechat');

    //$date = date('Y-m-d H:i:s');
    date_default_timezone_set('Asia/Kolkata');
    $date =  date('d-m-Y H:i');
    
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
            //echo $row["date"];
            echo '<p1 style="color:#787878;font-weight:normal;font-size:11px">'.$row["date"].'</p1>';
            echo '</p>';
        
        

    }
    }else{
        echo "error!";
    }




?>