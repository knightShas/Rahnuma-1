<?php
  session_start();
  include 'partial/_dbconnect.php'; //Databse connection has been define in this file.
    //here Session is set or not is checking.
  if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = "ok")) {
    header("Location: login.php");
    exit;
}
// this funtion i am having douth right now whether this is working or not but what it is doing is I am seting the limit
// for the table row if table row exceeds the limit it will create an another page for table.
$limit = 10;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
$result = mysqli_query($conn,"SELECT * FROM blog ORDER BY id ASC LIMIT $start_from, $limit");// database query.
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
                <a class="nav-link active" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="addblog.php">Add Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">Add Profile</a>
            </li>
        </ul>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Blog Title</th>
                    <th scope="col">Short Description</th>
                    <th scope="col">Article</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                while($row = mysqli_fetch_array($result)) //for extacting data from the row {$row will give the array}
                    {?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['blog_title']; ?></td>
                    <td><?php echo $row['srt_dec']; ?></td>
                    <td><?php echo $row['blog']; ?></td>
                    <td><a class="btn btn-warning" href="editblog.php?id=<?php echo $row['id'];?>" role="button">Edit</a></td>
                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>" role="button">Delete</a></td>
                    </tr>

                    <?php
                    }; 
                     ?>
                </tbody>
            </table>
            <?php
            $result_db = mysqli_query($conn,"SELECT COUNT(id) FROM blog");
            $row_db = mysqli_fetch_row($result_db);  
            $total_records = $row_db[0];  
            $total_pages = ceil($total_records / $limit); 
            /* echo  $total_pages; */
            $pagLink = "<ul class='pagination justify-content-end'>";  
            for ($i=1; $i<=$total_pages; $i++) {
                        $pagLink .= "<li class='page-item'><a class='page-link' href='pagination.php?page=".$i."'>".$i."</a></li>";	
            }
            echo $pagLink . "</ul>";  
            ?>
        </div>
     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>