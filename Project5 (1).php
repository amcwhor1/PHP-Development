<?php
session_start();
?>

<html>
<head>
<title>
Project 5
</title>
</head>
<body style="margin:auto;width:50%;text-align:center;position:relative;top:100px;">

<h1>ITEC 4450 Grade Search System</h1>
<div style="border:blue 5px solid;width:50%;text-align:center;position:relative;left:25%;">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Please type your username: <input type="text" name="id"><br/>
Please type your password: <input type="password" name="passwd"> <br/>   
    <input type="submit" value="log in" name="submit">
</form>
</div>
<hr/>

<h3>If you have not signed up, click <a href=Project5-Signup.php>here</a> to register.</h3>


<?php

include "My-DB-Functions.php";

if(isset($_POST['submit']))
{
	if(!empty($_POST['id']))
    {
    //echo "here i am";
    	$conn = My_Connect_DB();
        $sql =   "SELECT * FROM Project5 where id='".$_POST['id'].
    			"' AND 	passwd='".md5($_POST['passwd'])."';";
              
		$result = My_SQL_EXE($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) //empty
        {
            $_SESSION['id'] = $_POST['id'];
         	header("location: Project5-Action-Welcome.php");
        }else
          {
              header("location: Project5-Action-MemberOnly.php");
          }
    }
      else
      {
          header("location: Project5-Action-MemberOnly.php");
      }
}



?>







</body>
</html>