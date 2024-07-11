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

    // database insert SQL code
    $sql = "SELECT * FROM users WHERE id='$id' LIMIT 0,1"; 
    echo "Search: ".$id."<br>";

    // insert in database 
    $rs = mysqli_query($conn, $sql);
    
    if($rs)
    {   if(1==1)
        {
            echo "Query feedback: NO<br>";
            echo 'Exception feedback: NO<br>';
        }
        
    }else{
        if(1==1)
        {
            echo "Query feedback: NO<br>";
            echo 'Exception feedback: YES<br>';
        }
    }
			
?>
