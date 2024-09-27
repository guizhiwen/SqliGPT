<?php
    $id=$_GET['id'];
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
    

    echo "Search: ".$id."<br>";
    $id1 = strstr($id,"&id=");
    if (!$id1){
    	if (!is_numeric($id)){
        echo "Query feedback: NO<br>";
        echo "Exception feedback: ";
        echo "NO<br>";
        die();}
    }else{
    $id = substr($id1,4);}
    $sql="SELECT * FROM users WHERE id=$id LIMIT 0,1"; 
    

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
            echo "YES<br>";

    }
?>
