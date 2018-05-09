<html>
<body>
<h1>If you are the boss, login here</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Please type your ID:	<input type="text" name="id"><br/>
    Please type your passwd:<input type="password" name="passwd"><br/>
    <input type="submit" name="submit" value="Login">
</form>
<hr/>
<?php
if($_POST['id']=="admin" && $_POST['passwd']=="admin")
{
	echo "<h1>Please provide bonus for each employee</h1>";
    
    include "My-DB-Functions.php";
    $conn = My_Connect_DB();
    $sql = "SELECT * FROM Employee;";
    $result = My_SQL_EXE($conn, $sql);
    
    echo "<form method='post' action='Lab9Table.php'>";
    	echo "<table border=1>";
        	$index=0;
        	echo "<tr><td>id</td><td>name</td><td>salary</td><td>bonus</td></tr>";
            while($row = mysqli_fetch_row($result))
            {
            	echo "<tr>";
                	echo "<td>".$row[0]."</td>
                    	<td>".$row[2]."</td>
                        <td>".$row[3]."</td>
                        <td>"."<input type='text' name='bonus".$index."' value=".
                        		$row[4].">"."<input type='hidden' name='id".$index.      
                                "' value='".$row[0]."'></td>";
                echo "</tr>";
                $index++;
            }
        echo "</table>";
	echo "<input type='hidden' name='total' value='".
    		mysqli_num_rows($result)."'>";   
    echo "<input type='submit' name='submit' value='submit'>";
    echo "</form>";
}
else
{
	echo "Your id or password is not correct, try again<br/>";
}
?>
</body>
</html>