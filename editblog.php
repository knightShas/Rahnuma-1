<?php
  session_start();

  if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = "ok")) {
    header("Location: login.php");
    exit;
    }
    else{
        include 'partial/_dbconnect.php';
        $bid = $_GET['id']; 
        // echo $bid;exit;
        $sql = "select * from blog where id='$bid'";
        $result = mysqli_query($conn, $sql);
    }

    
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Dashboard</title>
  </head>
  <body>
        <!-- As a link -->
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
                <a class="nav-link" href="addblog.php">Add Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="signup.php">Add Profile</a>
            </li>
            
        </ul>
        <div class="container">
            <form action="editfunc.php?id=<?php echo $bid;?>" method="POST" enctype="multipart/form-data">
            <?php while($row = mysqli_fetch_array($result)) { ?>
                <div class="form-group">
                <input type="file" name="xyz" value="<?php echo $row['img_file'];?>" />
                </div>
                <div class="form-group">
                    <label for="blog_title">Blog Title</label>
                    <input type="text" class="form-control" id="blog_title" name="blog_title" value="<?php echo $row['blog_title'];?>">
                </div>
                <div class="form-group">
                    <label for="srt_des">Short Description</label>
                    <input type="text" class="form-control" id="srt_des" name="srt_des" value="<?php echo $row['srt_dec'];?>">
                </div>
                <div class="form-group">
                    <label for="blog">Article</label>
                    <textarea class="form-control" id="blog" rows="12" name="blog"><?php echo $row['blog'];?></textarea>
                </div>
                <button class="btn btn-lg btn-danger btn-block" type="submit" name="submit">Submit</button>
            <?php }; ?>
            </form>
        </div>
        
     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>