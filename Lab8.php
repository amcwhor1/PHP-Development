<html>
<head>
<title>
Activity-18
</title>
</head>
<body>
<?php
include "My-DB-Functions.php";

$conn = My_Connect_DB();



?>

<h1>Please provide the information about your product:</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
Product's name:
<input type="text" name="name"> <font color=red>*</font><br/><br/>
Product's maker:
<input type="text" name="maker"><br/><br/>
Product's amount:
<input type="text" name="amount"><br/><br/>
Product's price:
<input type="text" name="price"><br/><br/>

<input type="submit" value="Add Record" name="add">
<input type="submit" value="Find the Item with the Highest Price" name="highest">
<input type="submit" value="Display All" name="displayAll"><br/><br/>
<input type="submit" value="Group by Maker" name="groupByMaker">
<input type="submit" value="Sort Items by Amount Descendly" name="sort">
<input type="submit" value="Find the Average Price of all items" name="average"><br/><br/>
<input type="submit" value="Delete Record by ID" name="delete"> ID to remove: <input type="text" name="id"><br/><br/>
<input type="submit" value="Show by Maker" name="showByMaker"> Maker: <input type="text" name="maker2show"><br/><br/>

</form>

<?php
 
    
          	
        if(isset($_GET["add"]))
          {
          if(empty($_GET['name']))
          {
          		echo "Product's name cannot be empty, try again.";
          }
           else {
          
    		 
              $conn = My_Connect_DB();
              $sql = "INSERT INTO Products (name, maker, amount, price)
    			VALUES('".$_GET['name']."',
                       '".$_GET['maker']."', 
                       '".$_GET['amount']."',
                       '".$_GET['price']."')";
             //My_SQL_EXE($conn, $sql);
              Run_SQL_Show_Table($conn, $sql, "Products");
              mysqli_close();
              }
          }
      if(isset($_GET["highest"])) //if select, use my show table, if not seelct use run table
          {   		 
              $conn = My_Connect_DB();
              $sql = "SELECT name, maker, MAX(price) AS 'Highest Price' FROM Products;";
              $result = My_SQL_EXE($conn, $sql);
             My_Show_Table($result);
          }
      
       if(isset($_GET["displayAll"])) //if select, use my show table, if not seelct use run table
          {   		 
              $conn = My_Connect_DB();
              $sql = "SELECT * FROM Products;";
              $result = My_SQL_EXE($conn, $sql);
             My_Show_Table($result);
          }
          
        if(isset($_GET["groupByMaker"])) //if select, use my show table, if not seelct use run table
          {   		 
              $conn = My_Connect_DB();
              $sql = "SELECT maker, SUM(amount) AS 'Total Item' FROM Products GROUP BY maker;";
              $result = My_SQL_EXE($conn, $sql);
             My_Show_Table($result);
          }
          
          if(isset($_GET["sort"])) //if select, use my show table, if not seelct use run table
          {   		 
              $conn = My_Connect_DB();
              $sql = "SELECT * FROM Products ORDER BY 4 DESC;";
              $result = My_SQL_EXE($conn, $sql);
             My_Show_Table($result);
          }
          
           if(isset($_GET["average"])) //if select, use my show table, if not seelct use run table
          {   		 
              $conn = My_Connect_DB();
              $sql = "SELECT AVG(price) AS 'Average Price' FROM Products;";
              $result = My_SQL_EXE($conn, $sql);
             My_Show_Table($result);
          }
          
           if(isset($_GET["delete"])) //if select, use my show table, if not seelct use run table
          {   		 
              $conn = My_Connect_DB();
              $sql = "DELETE FROM Products WHERE id = '".$_GET['id']."';";
              Run_SQL_Show_Table($conn, $sql, "Products");
          }
          
          
          
           if(isset($_GET["showByMaker"])) //if select, use my show table, if not seelct use run table
          {   		 
              $conn = My_Connect_DB();
              $sql = "SELECT name, maker, amount price FROM Products WHERE maker = '".$_GET['maker2show']."';";
              $result = My_SQL_EXE($conn, $sql);
             My_Show_Table($result);
          }
        
        
        
    
?>










<hr/>
</body>
</html>