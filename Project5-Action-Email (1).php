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
     
	Send_Email($conn, $_SESSION['id']);
?>
     
     <table align="center">
        <tr>
          <td2><a href="Project5-Action-GradeOnly.php">Display my grade only   </a></td2>
          <td2><a href="Project5-Action-AllInfo.php">Display all my information    </a></td2>
          <td2><a href="Project3-Action-Email.php">Email me all my information     </a></td2>
          <td2><a href="Project5-Action-Logoff.php">Sign Off</a></td2>
        </tr>
      </table>


<?php
}
  else
  {	
    echo "Members only! Click <a href='Project5.php'> here</a> to log in";
   }
   
   
   
   
   
   function Send_Email($conn, $id)
{
	$sql = "SElECT * FROM Project5 WHERE id=".$id.";";
    $result = My_SQL_EXE($conn, $sql);
    if($row = mysqli_fetch_row($result) ) 
    {
        echo "<h1>The email has been sent successfully to ".$row[3]."</h1>";
        echo "<hr/>";
        echo "<img src='".$row[7]."' height=200px width=200px ><br/>";
        echo "<hr/>";
       
        $to = $row[3];
        $subject = "Information Requestion";
        $txt =  "User id: ".$row[0]."\r\n".
                "Your password id is: " .$row[1] . "\r\n\r\n".
                "Your name is: " .$row[2] . "\r\n\r\n".
                "Your email is: " .$row[3] . "\r\n\r\n".
                "Your grade is: " .$row[4] . "\r\n\r\n".
                "Your sign up date is: " .$row[5] . "\r\n\r\n".
                "Your sign up time is: " .$row[6] . "\r\n\r\n";
                
        $headers = "From: ewbmaster@itec4450.com\r\n" . "CC: someone@itec4450.com";
        
        mail($to, $subject, $txt, $headers);
        //echo "Please check your email to reset password<br/>";
       
    }
    else
    {
    	echo "No such ID: " .$id."<br/>";
    }    
}
   ?>
  




</body>
</html>