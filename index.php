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

        <!--<link rel="stylesheet" href=""> -->
        <style>
           body {background-image: url("4469842.jpg");
                background-color: #cccccc;
                height: 100vh;
                background-position: center;
                background-repeat: no-repeat;
                background-size:cover;
                position: relative;}
        </style>
    </head>
    <body>
        <div class="container">
           <div class="row">
               <div class="col-lg-4 text-center">
                    <h1 style="padding-top: 50px;">[ CHAOS ]</h1><br><h5>B O A R D</h5>
                    <img src="psychology-2422442_1280.png" alt="Girl in a jacket" width="300" height="350" style="padding: 20px;">
               </div>
               <div class="col-lg-4" style="padding-top: 50px;">
                    <h3>Enter chat:</h3>
                   <form action="validation.php" method="POST">
                       <div class="form-group">
                           <label>Username:</label>
                           <input type="text" name="user" class="form-control" required>
                       </div>
                       <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-dark text-center" name= "login" style="margin-left:auto;
                        margin-right:auto; display:block;">Join Chat</button>
                   </form>
                   
               </div>
               <div class="col-lg-4" style="padding-top: 50px;">
                   <h3>New User?</h3><br>
                   <h4>Join by entering just an username and password! Click on Signup.</h4><br>

                   <button id ="signupbutton" type="button" class="btn btn-dark text-center" onclick="showform();" style="margin-left:auto;
                   margin-right:auto; display:block;">Sign Up</button>

                <div id="hiddensignup">  
                    <form action="register.php" method="POST">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="user" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="register" class="btn btn-dark text-center" style="margin-left:auto;
                        margin-right:auto;
                        display:block;">Sign Up</button>
                    </form>
                </div> 
                   
               </div>
           </div> 
        </div>
        
        <script>
            document.getElementById('hiddensignup').style.display='none';
            function showform(){
            document.getElementById('hiddensignup').style.display='block';
            console.log("whats goinh=g on");
            document.getElementById('signupbutton').style.display='none';
        }
            
        </script>
    </body>
</html>