<?php
    $id = $_GET['sort'];
    // database insert SQL code
    $servername = "db";
    $username = "root";
    $password = "MYSQL_ROOT_PASSWORD";
    $db = "security";

    // Create connection
    // $conn = new mysqli($servername, $username, $password);

    $conn = new mysqli($servername, $username, $password, $db);
                
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users ORDER BY $id";
    echo "Search: ".$id."<br>";

    // insert in database 
    $rs = mysqli_query($conn, $sql);
    if($rs)
    {   if(1==1)
        {
            echo "Query feedback: ";
            ?>
            <center>
            <font color= "#00FF00" size="4">
            
            <table   border=1'>
            <tr>
                <th>&nbsp;ID&nbsp;</th>
                <th>&nbsp;USERNAME&nbsp;  </th>
                <th>&nbsp;PASSWORD&nbsp;  </th>
            </tr>
            </font>
            </font>
            <?php
            
            while($row = mysqli_fetch_assoc($rs)) {
                echo '<font color= "#00FF11" size="3">';		
			    echo "<tr>";
    			echo "<td>".$row['id']."</td>";
    			echo "<td>".$row['username']."</td>";
    			echo "<td>".$row['password']."</td>";
			    echo "</tr>";
			    echo "</font>";
            }
            echo "</table>";
            echo 'Exception feedback: NO<br>';

        }
    }else{
        if(1==1)
        {
            echo "Query feedback: NO<br>";
            echo "Exception feedback: ";
            if(mysqli_error($conn) !== Null){
                    echo mysqli_error($conn);
            }else{
                echo "YES";
            }
        }
    }

?>