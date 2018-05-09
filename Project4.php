<html>
<body>
<head> 
<title>
Project
</title>
</head>
<body >

<?php 
include 'My-DB-Functions.php'; 
$conn = My_Connect_DB();

?>

<h1>Employee payment system</h1>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">

Employee name: <input type="text" name="name"><font color=red>*</font><br><br>

Payment type: 
<select name="type">
  <option value="salary">Salary</option>
  <option value="bonus">Bonus</option>
  <option value="other">Other</option>
</select><br><br>

Payment amount <input type="text" name="amount" maxlength=6> <font color=red>(max 999999)</font>
<br><br>

<input type="submit" name="submit" value="submit"><br>
</form>

<?php
if(isset($_GET['submit']) && !empty($_GET['name']))
{
	 $conn = My_Connect_DB();
              $sql = "INSERT INTO Project4 (name, type, amount)
    			VALUES('".$_GET['name']."',
                       '".$_GET['type']."', 
                       '".$_GET['amount']."')";
              Run_SQL_Show_Table_Top($conn, $sql, "Project4");
              mysqli_close();


}

if(isset($_GET['submit']) && empty($_GET['name']))
{
	echo "Name is required, try again.";
}


$sort = $_GET["sortby"];

?>




<hr/>


<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table style="background-color:pink;margin:auto;" border=0>
<thead align="center"><tr><td colspan="2">Display information in different ways</td></tr></thead>
<tr><td colspan=2><hr/></td><td>

<tr><td align=right><input type=radio name="sortby" value="byoriginal" <?php if($sort == "byoriginal") echo "checked";?> ></td><td>Display information in its orignal way</td></tr>
<tr><td align=right><input type=radio name="sortby" value="byname" <?php if($sort == "byname") echo "checked";?> ></td><td>Sort by name in ascending order </td></tr>
<tr><td align=right><input type=radio name="sortby" value="byone" <?php if($sort == "byone") echo "checked";?> ></td><td>Find someone makes how much money (name: <input type="text" name="name">) </td></tr>
<tr><td align=right><input type=radio name="sortby" value="bytotal" <?php if($sort == "bytotal") echo "checked";?> ></td><td>Find each one makes how much money in total and sort results in descending order</td></tr>
<tr><td align=right><input type=radio name="sortby" value="bytype" <?php if($sort == "bytype") echo "checked";?> ></td><td>Find payments for different types (type: <select name="type">
            <option value="salary">Salary</option>
            <option value="bonus">Bonus</option>
            <option value="other">Other</option>
          </select>) </td></tr>
<tr><td align=right><input type=radio name="sortby" value="bymax"  ></td><td>Find the employee with highest bonus </td></tr>          
<tr><td align=right><input type=radio name="sortby" value="bycat"  ></td><td>Find the total payments for the 3 catagories</td></tr>

<tr><td colspan=2 align="center"><input name="display" alt="Login" type="submit" value="display"> </td></tr>
</table>
</form>
<hr/>



<?php

$sort = $_GET["sortby"];

//if you do NOT press the display button, it will show all rows... once the an option is selected, this table goes away so there are NOT two tables!
if(!isset($_GET["display"]))
{
  $conn = My_Connect_DB();
  $sql = "SELECT * FROM Project4;";
  $result = My_SQL_EXE($conn, $sql);
  My_Show_Table($result);
}

	if(isset($_GET["display"]) && $_GET["sortby"] == "byoriginal")
{
    	$conn = My_Connect_DB();
        $sql = "SELECT * FROM Project4;";
        $result = My_SQL_EXE($conn, $sql);
        My_Show_Table($result);
    }
    
    	if(isset($_GET["display"]) && $_GET["sortby"] == "byname")
{
    	$conn = My_Connect_DB();
        $sql = "SELECT * FROM Project4 ORDER BY 1;";
        $result = My_SQL_EXE($conn, $sql);
        My_Show_Table($result);
    }
    
        	if(isset($_GET["display"]) && $_GET["sortby"] == "byone")
{
    	$conn = My_Connect_DB();
        $sql = "SELECT * FROM Project4 WHERE name = '". $_GET['name']."';";
        $result = My_SQL_EXE($conn, $sql);
        My_Show_Table($result);
    }
    
        	if(isset($_GET["display"]) && $_GET["sortby"] == "bytotal")
{
    	$conn = My_Connect_DB();
        $sql = "SELECT name, amount as 'Total' FROM Project4 ORDER BY 2 DESC;";
        $result = My_SQL_EXE($conn, $sql);
        My_Show_Table($result);
    }
    
        	if(isset($_GET["display"]) && $_GET["sortby"] == "bytype")
{
    	$conn = My_Connect_DB();
        $sql = "SELECT * FROM Project4 WHERE type = '".$_GET['type']."';";
        $result = My_SQL_EXE($conn, $sql);
        My_Show_Table($result);
    }
    
        	if(isset($_GET["display"]) && $_GET["sortby"] == "bymax")
{
    	$conn = My_Connect_DB();
        $sql = "SELECT name, MAX(amount) AS 'Highest Bonus' FROM Project4 WHERE type = 'bonus';";
        $result = My_SQL_EXE($conn, $sql);
        My_Show_Table($result);
    }
    
            	if(isset($_GET["display"]) && $_GET["sortby"] == "bycat")
{
    	$conn = My_Connect_DB();
        $sql = "SELECT DISTINCT type, SUM(amount) AS 'Total Payment' FROM Project4 GROUP BY 1 ORDER BY 1";
        $result = My_SQL_EXE($conn, $sql);
        My_Show_Table($result);
    }
    
  
    






?>

































