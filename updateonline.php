<?php
    include("connection.php"); 
    mysqli_select_db($con,'onlinechat');

    $q5 = "select * from onlineusers";
    $total=mysqli_query($con,$q5);
    if($total->num_rows > 0){
        //$total2 = mysqli_fetch_array($total);
        $total3 = mysqli_num_rows($total);
        //return $total3;

        echo '<i class="fa fa-user-check" style="font-size:16px; color:#5cb85c"></i>&nbsp;Users Online: '.$total3;
    }


?>