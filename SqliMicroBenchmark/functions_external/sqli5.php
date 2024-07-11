<?php
    $id = $_GET['id'];
    // database insert SQL code
    $servername = "db";
    $username = "root";
    $password = "MYSQL_ROOT_PASSWORD";
    $db = "security";



    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
                
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE id='$id' LIMIT 0,1";
    // echo "".$sql."<br>";
    echo "Search: ".$id."<br>";
    $rs = mysqli_query($conn, $sql);

    // insert in database 
    if($rs)
    {   if(1==1)
        {
            echo "Query feedback: NO<br>";
            echo 'Exception feedback: NO<br>';
        }
        
    }else{
            echo "Query feedback: NO<br>";
            echo 'Exception feedback: NO<br>';

    }

?>