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

    $uagent = $_SERVER['HTTP_REFERER'];
	$IP = $_SERVER['REMOTE_ADDR'];
	$uname1 = $_POST['uname'];
	$passwd1 = $_POST['passwd'];
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

    echo "Search: ".$uname1."<br>";
    $uname=check_input($conn, $uname1);
    $passwd=check_input($conn, $passwd1);

	$sql="SELECT  users.username, users.password FROM users WHERE users.username=$uname and users.password=$passwd ORDER BY users.id DESC LIMIT 0,1";
    // echo "".$sql."<br>";

    // insert in database 
    $rs = mysqli_query($conn, $sql);
    if($rs)
    {   
        if(mysqli_num_rows($rs) == 0){
                echo "Query feedback: NO<br>";
            	echo "Exception feedback: YES<br>";
        }
        else{
        $insert="INSERT INTO `security`.`referers` (`referer`, `ip_address`) VALUES ('$uagent', '$IP')";
		mysqli_query($conn, $insert);	
        echo "Query feedback: ";
        echo "YES<br>";
        if (mysqli_error($conn) != Null){
            echo 'Exception feedback: ';
            echo mysqli_error($conn);
        }
        else{
        echo 'Exception feedback: NO<br>';
        }}
        
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
