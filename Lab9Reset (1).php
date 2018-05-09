<html>
<body>
<h1>Reset your password:</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="radio" name=resetby value="id" checked> ID <br/>
<input type="radio" name=resetby value="email" checked> Email <br/>
Type your ID or email here: <input type="text" name="idORemail"><br/>
<input type="submit" name="submit" value="reset password">

</form>

<?php

if(isset($_POST['submit']))
{
	include "My-DB-Functions.php";
    $conn = My_Connect_DB();
    
    if($_POST['resetby'] == "id")
    {
    	$sql = "SELECT * FROM Employee WHERE id='".$_POST['idORemail']."';";
    }
    else if($_POST['resetby'] == "email")
    	$sql = "SELECT * FROM Employee WHERE email='".$_POST['idORemail']."';";
    
    $result = My_SQL_EXE($conn, $sql);
    
    if($row = mysqli_fetch_row($result)) //if true, found id or email
    {
    	$to = $row[6];
        $subject = "Reset password";
        $txt = "you requested to reset your password\r\n".
        		"Your login id is: " .$row[0] . "\r\n\r\n".
                "Click the following link to restet your password. \r\n\r\n".
                "http://admcwhorter92.altervista.org/Activity4-4-6.php&id=".$row[0]."&sand=".md5($row[1]);
                
        $headers = "From: ewbmaster@itec4450.com\r\n" . "CC: someone@itec4450.com";
        
        mail($to, $subject, $txt, $headers);
        echo "Please check your email to reset password<br/>";
    }
    else
    {
    	echo "Id or email is not correct, try again<br/>";
    }

}



?>


</body>


</html>