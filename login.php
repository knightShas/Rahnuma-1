<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partial/_dbconnect.php';
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);
        //It is fetching from form and then checking in table If all ok then it will start session;
        // $_SESSION is global variable;
        $sql = "Select * from admin_user where email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        // $num = mysqli_num_rows($result);
        $num = $result->num_rows;
        if ($num != 0){
            session_start();
            $_SESSION['loggedin'] = "ok";
            $_SESSION['username'] = $email;
            header("location:dashboard.php");// this will redirect you to defined location.

        }
        else{
            $showError = "Invalid Credential";
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/slow.css">
</head>
<body class="anim text-center" style="padding-top: 180px;padding-left: 300px";
>

        <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Login</h6>
            <form class="form-signin" method="POST" action="login.php">
                
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                <br>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                
                <br>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>
                
            </form>

            
        </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>