<?php
	$uname=$_POST['uname'];
	$passwd=$_POST['passwd'];
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

    $sql = "SELECT username, password FROM users WHERE username='$uname' and password='$passwd' LIMIT 0,1";
    echo "Search: ".$uname."<br>";
    // echo "".$sql."<br>";

    // insert in database 
    $rs = mysqli_query($conn, $sql);
    if($rs)
    {
            if(mysqli_num_rows($rs) == 0){
                echo "Query feedback: NO<br>";
            }
            else{
            echo "Query feedback: YES<br>";}
            echo 'Exception feedback: NO<br>';
    }else{
            echo "Query feedback: NO<br>";
            echo 'Exception feedback: NO<br>';
    }

?>
