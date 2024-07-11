<?php
function check_input($conn,$value)
{
if(!empty($value))
    {
    // truncation (see comments)
    $value = substr($value,0,15);
    }

    // Stripslashes if magic quotes enabled
    if (PHP_VERSION < 6 && get_magic_quotes_gpc())
        {
        $value = stripslashes($value);
        }

    // Quote if not a number
    if (!ctype_digit($value))
        {
        $value = "'" . mysqli_real_escape_string($conn, $value) . "'";
        }
    
else
    {
    $value = intval($value);
    }
return $value;
}


    $uname1=$_POST['uname'];
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
    $uname=check_input($conn, $uname1);
    echo "Search: ".$uname."<br>";
    $sql = "SELECT username, password FROM users WHERE username= $uname LIMIT 0,1";
    
    $rs = mysqli_query($conn, $sql);
    
    
    //$sql = "SELECT * FROM users WHERE name='" . $name1 ."' OR name='" . $name2 ."' OR name='" . $name3 ."' LIMIT 0, 1";
    

    // echo "".$sql."<br>";

    // insert in database 
    //$rs = mysqli_query($conn, $sql);
    if($rs)
    {   
    	if(mysqli_num_rows($rs) == 0){
                echo "Query feedback: NO<br>";
            	echo "Exception feedback: YES";
        }
        else{
    	$row = mysqli_fetch_assoc($rs);
        $row1 = $row['username'];
        $update="UPDATE users SET password = '$passwd' WHERE username='$row1'";
        $up =mysqli_query($conn, $update);
        echo "Query feedback: ";
        if (mysqli_error($conn) != Null)
        {
            echo "NO";
            echo "<br>";
            echo 'Exception feedback: ';
            echo mysqli_error($conn);
            echo "<br>";
        }
        else{
            echo "YES<br>";
            echo 'Exception feedback: NO<br>';
        }}
        
    }else{
            echo "Query feedback: NO<br>";
            echo "Exception feedback: YES";
    }

?>
