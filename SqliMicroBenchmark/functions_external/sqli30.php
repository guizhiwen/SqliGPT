<?php
    $uname1=$_POST['uname'];
	$passwd1=$_POST['passwd'];
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


    $uname = mysqli_real_escape_string($conn, $uname1);   
    $passwd= mysqli_real_escape_string($conn, $passwd1); 
    mysqli_query($conn, "SET NAMES gbk");
    echo "Search: uname:".$uname."   passwd:".$passwd."<br>";
    $sql="SELECT username, password FROM users WHERE username='$uname' and password='$passwd' LIMIT 0,1";
    
    // insert in database 
    $rs = mysqli_query($conn, $sql);
    if($rs)
    {   
            echo "Query feedback: ";
            $count = 0;
            while($row = mysqli_fetch_assoc($rs) and $count < 10) {
                echo "Name: " . $row["username"]. " - Pass: " . $row["password"]. "<br>";
                $count += 1;
            }
            if(mysqli_num_rows($rs) == 0){
                echo "<br>";
                echo 'Exception feedback: YES<br>';
            }
            else{
            echo 'Exception feedback: NO<br>';
            }
        
    }else{

            echo "Query feedback: NO<br>";
            echo "Exception feedback: ";
            if(mysqli_error($conn) !== Null){
                    echo mysqli_error($conn);
            }else{
                echo "YES";
            }

    }

?>
