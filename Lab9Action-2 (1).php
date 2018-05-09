<?php
session_start();

?>


<!DOCTYPE html>
<html>
<body>



<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Your id is: <?php echo $_SESSION['id'] ?><br/>
Your current password: <input type='password' name='passwd'><br/>
Your new password: <input type='password' name='newpasswd'><br/>
Your new password again: <input type='password' name='newpasswd2'><br/>
<input type='submit' name='submit' value="change my password"><br/>
</form>
<hr/>

<?php


if(isset($_POST['submit']))
{
	include "My-DB-Functions.php";
	    $conn = My_Connect_DB();
        
        $sql =   "SELECT * FROM Employee where id='".$_SESSION['id'].
    			"' AND 	passwd='".md5($_POST['passwd'])."';";
		
        $result = My_SQL_EXE($conn, $sql);
        
        if(mysqli_num_rows($result) <= 0) //empty
        {
        	die("Id or password does not match<br/>");  
         
        }
        
        if($_POST['newpasswd'] != $_POST['newpasswd2'])
      {
          echo "New password does not match<br/>";
          exit();
      }

//echo md5($_POST['newpasswd']);
      $sql = "UPDATE Employee SET passwd='".md5($_POST['newpasswd'])
                  ."' WHERE id='".$_SESSION['id']."';";
      My_SQL_EXE($conn, $sql);

      echo "Password changed, please click <a href=Lab9.php>
              here</a> to login<br/>";





}




?>



</body>
</html>