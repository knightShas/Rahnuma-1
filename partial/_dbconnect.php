<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "rehnuma";

    $conn = mysqli_connect($server, $username, $password, $database);

    if(!$conn){
    //     echo "success";
    
    // }
    // else{
        die ("Error :". mysqli_connect_error());
    }

?>