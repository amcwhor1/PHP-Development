<?php
session_start();
?>

<html>
<head>

<style>
body {text-align: center;}
td2 {background-color:pink; color:blue; text-align:center; border-spacing:20px;}
table{text-align:center}
h1 {padding-bottom: -100px;}
</style>

</head>
<body>

<?php

include "My-DB-Functions.php";

if(isset($_SESSION['id']))
{
	$conn = My_Connect_DB();
    
	?>
    <br/>
    <h1>Your grade is listed as follows:</h1>
    <br/>
	<?php Show_Employee($conn, $_SESSION['id']); ?>
     
     <table align="center">
        <tr>
          <td2><a href="Project5-Action-GradeOnly.php">Display my grade only   </a></td2>
          <td2><a href="Project5-Action-AllInfo.php">Display all my information    </a></td2>
          <td2><a href="Project5-Action-Email.php">Email me all my information     </a></td2>
          <td2><a href="Project5-Action-Logoff.php">Sign Off</a></td2>
        </tr>
      </table>


<?php
}
  else
  {	
    echo "Members only! Click <a href='Project5.php'> here</a> to log in";
   }
   
   
   
   
   
   function Show_Employee($conn, $id)
{
	$sql = "SElECT * FROM Project5 WHERE id=".$id.";";
    $result = My_SQL_EXE($conn, $sql);
    if($row = mysqli_fetch_row($result) ) 
    {
          echo "<tr>";
            echo "<td>Name:</td>". "<td> ".$row[2]."</td><br/>";
          echo "<tr/>";
         
          echo "<tr>";
            echo "<td>Grade:</td>". "<td> ".$row[4]."</td><br/>";
          echo "<tr/>";

        echo "<hr/>";
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