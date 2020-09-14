<?php
    session_start();
    if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = "ok")) {
        header("Location: login.php");
        exit;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partial/_dbconnect.php';
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $password = md5($password);// converting to md5 hash code.
        $cpassword = md5($cpassword);
        $exists = false;
        if(($password == $cpassword) && $exists == false){
            $sql = "INSERT INTO `admin_user` (`email`, `password`) VALUES ('$email', '$password')";//insert query 
            $result = mysqli_query($conn, $sql);
            if ($result == 1){
                header("location:login.php");
            }
            else{
                $showError = "Password do not match";
            }
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

</head>
<body>
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand btn" href="#">Home</a>
            <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active"> <?php echo $_SESSION['username'];?></a> 
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>           
            </ul>
        </nav>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="addblog.php">Add Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Add Profile</a>
            </li>
        </ul>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Sign Up</h6>
            <form class="form-signin" method="POST" action="signup.php">
                <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <textarea class="form-control" id="cpassword" name="cpassword"></textarea>
                </div>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>
                </form>

            </div>
        </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>