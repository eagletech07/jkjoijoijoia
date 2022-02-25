<!doctype html> 
<html lang="en"> 
    <head> 
        <!--Require meta tags-->         
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scable=no"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="style2.css"> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>         
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>         
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>         
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
        <script src="script.js"></script> 
        <script src="form.js"></script>                 
        <title>Eagle Technology DMIT</title>         
    </head>     
    <body>

    <?php
    
    @include 'config.php';
    
    if(issest($_POST['submit'])){
    
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type']
    
        $select = " SELECT * FROM user_form WHERE email ='$email' && password ='$pass' ";
    
        $reslut = mysqli_query($conn, $select);
    
        if(mysqli_num_rows($reslut)>0){
            
            $error[] = 'user already exist!'
    
        }else{
            if($pass != $cpass){
                $error[] = 'password not matched!';
            }else{
                $insert = "INSERT INTO user_form(name, email, password,	user_type) VALUES('$name','$email','$pass','$user_type')";
                mysqli_query($conn, $insert);
                header('location:login_form.php');
            }
        }
    };

        <section class="parent">
            <h1>parent</h1>
            <div class="prlogo">
                <img src="parent.png" width="100px">
                <div class="form-container">
                    <form action="" method="post">
                       <h3>login now</h3>
                       <input type="email" name="email" required placeholder="enter your email">
                       <input type="password" name="password" required placeholder="enter your password">
                       <input type="submit" name="submit" value="login now" class="form-btn">
                       <p>don't have an account? <a href="register.html">register now</a></p>
                    </form>
                 
                 </div>
            </div>
        </section>
        
    </body>
</html>