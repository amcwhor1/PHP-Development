<?php
session_start();
?>

<html>
<head>
<style>
body {text-align: center;}
td {background-color:pink; color:blue; text-align:center;}

</style>
</head>
<body>

<?php
include "My-DB-Functions.php";

$conn = My_Connect_DB();


if(isset($_SESSION['id']))
{
	?>
    <h1>Welcome class member: <?php echo $_SESSION['id']; ?>.</h1>
	<br/><br/>
	<h2>You are logged in.</h2>
     
     <?php
     	Show_Picture($conn, $_SESSION['id']);
     
     ?>
     
     
     <table align="center">
        <tr>
          <td><a href="Project5-Action-GradeOnly.php">Display my grade only</a></td>
          <td><a href="Project5-Action-AllInfo.php">Display all my information</a></td>
          <td><a href="Project5-Action-Email.php">Email me all my information</a></td>
          <td><a href="Project5-Action-Logoff.php">Sign Off</a></td>
        </tr>
      </table>


<?php
}
  else
  {	
    echo "Members only! Click <a href='Project5.php'> here</a> to log in";
   }
   
   
      function Show_Picture($conn, $id)
{
	$sql = "SElECT * FROM Project5 WHERE id=".$id.";";
    $result = My_SQL_EXE($conn, $sql);
    if($row = mysqli_fetch_row($result) ) 
    {
    	
        echo "<img src='".$row[7]."' height=200px width=200px ><br/>";
       
    }
    else
    {
    	echo "No such ID: " .$id."<br/>";
    }  
    
    
    
}
   
   
   
   ?>
  




</body>
</html>