<?php
function check_quotes($conn, $string)
{
    $string= mysqli_real_escape_string($conn, $string);   
    return $string;
}

    $id=$_GET['id'];
    $id = urldecode($id);  
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


    
    $id = check_quotes($conn, $id);   
    // echo "".$sql."<br>";
    mysqli_query($conn, "SET NAMES gbk");

    echo "Search: ".$id."<br>";
    $sql="SELECT * FROM users WHERE id='$id' LIMIT 0,1";
    // insert in database 
    $rs = mysqli_query($conn, $sql); 
    if($rs)
    {   
            echo "Query feedback: ";
            $count = 0;
            while($row = mysqli_fetch_assoc($rs) and $count < 10) {
                echo "ID: " . $row["id"]. " - Name: " . $row["username"]. " - Pass: " . $row["password"]. "<br>";
                $count += 1;
            }
            if(mysqli_num_rows($rs) == 0){
                echo "<br>";
            }
            echo 'Exception feedback: NO<br>';
        
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
