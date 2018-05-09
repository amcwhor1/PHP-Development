<?php
session_start();

?>

<html>
<head>
<title>
Activity 21
</title>
</head>
<body>

<h1>Employee Infomation System</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Please type your ID:
    <input type="text" name="id"><br/>
    Please type your password:
    <input type="password" name="passwd"><br/><br/>
    <input type="submit" name="submit" value="Login">
</form>
<hr/>


If you have not registered yet, please click <a href=Lab9Reg.php> here</a> to sign up.<br/>
If you are the boss, please click <a href=Lab9Boss.php> here</a> to assign bobus for each employee.<br/>
If you forget your id or password, 
click <a href=Lab9Reset.php> here</a> to reset.<br/>
<hr/>

<?php

include "My-DB-Functions.php";


if(isset($_POST['submit']))
{
	if(!empty($_POST['id']))
    {
    	$conn = My_Connect_DB();
        //$sql = "SELECT * FROM Employee WHERE id=".$_POST['id']." AND
        //				passwd='".md5($_POST['passwd'])."';";
        $sql =   "SELECT * FROM Employee where id='".$_POST['id'].
    			"' AND 	passwd='".md5($_POST['passwd'])."';";
		$result = My_SQL_EXE($conn, $sql);
        
        //echo md5($_POST['passwd']);
        if(mysqli_num_rows($result) <= 0) //empty
        {
        	echo "New password does not match<br/>";            
        }
        else
        {
        	
            $_SESSION['id'] = $_POST['id'];
            echo "Welcome ".$_POST['id'].", you logged in succcessfully";
        	//Show_Employee($conn, $_POST['id']);
            //echo "Password has been changed successfully and you need to login again!";
            echo "<hr/>";
         
           echo " Click <a href='Lab9Action.php'> here</a> to see your information<br/>";
           echo " Click <a href='Lab9Action-2.php'> here</a> to change your password in<br/>";
           echo " Click <a href='Lab9Action-3.php'> here</a> to log off<br/>";
        }
    }
}



?>

<?php

function Show_Employee($conn, $id)
{
	$sql = "SElECT * FROM Employee WHERE id=".$id.";";
    $result = My_SQL_EXE($conn, $sql);
    if($row = mysqli_fetch_row($result) ) 
    {
   	    echo "Welcome ".$row[2].", your information is as follows<br/>";
    	echo "<img src='".$row[5]."' height=200px width=200px ><br/>";
    	//echo "Your information for ". $id ." is as follows.<br/>";
        echo "ID: ".$row[0]."<br/>";
        echo "Name: ". $row[2]."<br/>";
        echo "Email: ".$row[6]."<br/>";
        echo "Salary: ".$row[3]."<br/>";
        echo "Bonus: ".$row[4]."<br/>";
        
    }
    else
    {
    	echo "No such ID: " .$id."<br/>";
    }    
}
?>

 			




</body>
</html>