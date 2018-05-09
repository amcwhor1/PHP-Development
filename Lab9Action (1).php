<?php
session_start();

?>

<!DOCTYPE html>
<html>
<body>

<?php
include "My-DB-Functions.php";


if(isset($_SESSION['id']))
{
    	$conn = My_Connect_DB();
        //$sql = "SELECT * FROM Employee WHERE id=".$_POST['id']." AND
        //				passwd='".md5($_POST['passwd'])."';";
        $sql =   "SELECT * FROM Employee where id='".$_SESSION['id']."';";
		$result = My_SQL_EXE($conn, $sql);
        if(mysqli_num_rows($result) <= 0) //empty
        {
        	echo "Your id is wrong, try again<br/>";            
        }
        else
        {
            
        	Show_Employee($conn, $_SESSION['id']);
            
            echo "<hr/>";
          // echo "Click <a href='Lab9Reset.php'> here</a> to see all your information<br/>";
           echo "Click <a href='Lab9Action-2.php'> here</a> to change your password<br/>";
           echo " Click <a href='Lab9Reset.php'> here</a> to log off<br/>";
        }

}
else
  {	
      echo "log in first Click <a href='Lab9.php'> here</a>";
  }

function Show_Employee($conn, $id)
{
	$sql = "SElECT * FROM Employee WHERE id=".$id.";";
    $result = My_SQL_EXE($conn, $sql);
    if($row = mysqli_fetch_row($result) ) 
    {
   	    echo "Your information for ".$row[0]." is as follows<br/>";
    	//echo "Your information for ". $id ." is as follows.<br/>";
        echo "ID: ".$row[0]."<br/>";
        echo "Name: ". $row[2]."<br/>";
        echo "Email: ".$row[6]."<br/>";
        echo "Salary: ".$row[3]."<br/>";
        echo "Bonus: ".$row[4]."<br/>";
        echo "<img src='".$row[5]."' height=200px width=200px ><br/>";
        
    }
    else
    {
    	echo "No such ID: " .$id."<br/>";
    }    
}


?>



</body>
</html>
