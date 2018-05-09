<?php

if($_POST['total'] > 0)
{
	include "My-DB-Functions.php";
    $conn = My_Connect_DB();
    
    
    for($i=0; $i < $_POST['total']; $i++)
    {
    	$sql = "UPDATE Employee SET bonus='".$_POST['bonus'. $i].
        		"' WHERE id='".$_POST['id'.$i]."';";
        $result = My_SQL_EXE($conn, $sql);
    }

	$sql = "SELECT * FROM Employee;";
    $result = My_SQL_EXE($conn, $sql);
    
    echo "<table border=1>";
    echo "<tr><td>id</td><td>name</td><td>salary</td><td>bonus</td><td>photo</td><td>email</td></tr>";
    
    while($row=mysqli_fetch_row($result))
    {
    	echo "<tr>";
        	echo "<td> ".$row[0]."</td>";
            echo "<td> ".$row[2]."</td>";
            echo "<td> ".$row[3]."</td>";
            echo "<td> ".$row[4]."</td>";
            echo "<td> <img src='".$row[5]."' width=100px height=100px></td>";
            echo "<td> ".$row[6]."</td>";
        
        echo "</tr>";
    }

    echo "</table>";
	mysqli_free_result($result);
}





?>