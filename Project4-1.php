<?php

 function My_Connect_DB()
  {
    $servername = "localhost"; 
    $username = "admcwhorter92";  
    $password = ""; 
    $dbname = "my_admcwhorter92"; 

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn)
        die("Connection to DB failed:".mysqli_connect_error()."<br/>"); 
        return $conn; 
  }
  
  function MY_SQL_EXE($conn, $sql)
  {
      if(mysqli_query($conn, $sql))
      echo "SQL is done successfully<br/>";
  else
      echo "Error in running sql: ".$sql."with error: ".mysqli_error($conn)."<br/>";
  }

$conn = My_Connect_DB();



$sql = "CREATE TABLE Project4(
name VARCHAR(30) NOT NULL,
type VARCHAR(10),
amount INT(7),
paymentID INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY
);";

MY_SQL_EXE($conn, $sql); 
mysqli_close($conn);


?>